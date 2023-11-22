<?php
session_start();
include ("model/pdo.php");
include ("model/review.php");
include ("model/cart.php");
include ("model/product.php");
include ("model/account.php");
include ("model/wishlist.php");
include ("model/category.php");
include ("global.php");
$listCT = loadAll_category();
if(isset($_SESSION['user']) && isset($_SESSION['role']) && $_SESSION['role'] == 1 ){
    include("view/admin/head.php");
    include("view/admin/header.php");
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'category':
                if(isset($_GET['action'])){
                    $action = $_GET['action'];
                    switch ($action){
                        case 'add_category':
                            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                $name_category = $_POST['name_category'];
                                if (empty($_FILES['img_category']['name'])) {
                                    $img_category = "";
                                } else {
                                    $img_category=$_FILES['img_category']['name'];
                                    $targetFile = $img_path_category . $img_category;
                                    move_uploaded_file($_FILES['img_category']['tmp_name'],$targetFile);
                                }
                                insert_category($name_category, $img_category);
                                echo("<script>
                                        alert('Thêm thành công danh mục')
                                        window.location.href = 'index.php?act=category';
                                    </script>");
                            }else{
                                include "view/admin/product/category/add.php";
                            }
                            break;
                        case 'thongkedm':
                            $listtk = thongke();
                            include "danhmuc/thongkedm.php";
                            break;
                        case 'delete_category':
                            if (isset($_GET['id_category'])) {
                                delete_category($_GET['id_category']);
                                echo ("<script>
                                            alert('Xóa danh mục thành công')
                                            window.location.href = 'index.php?act=category';
                                       </script>
                                    ");
                                break;
                            }
                            break;
                        case 'update_category':
                            if($_SERVER['REQUEST_METHOD'] == 'POST' ){
                                if (isset($_GET['id_category'])) {
                                    $id_category = $_GET['id_category'];
                                    $category = load_one_category($id_category);
                                    include("view/admin/product/category/update.php");
                                }else if(isset($_POST['update_category'])){
                                    $id_category = $_POST['id_category'];
                                    $name_category = $_POST['name_category'];
                                    if (empty($_FILES['img_category']['name'])) {
                                        $img_category = "";
                                    } else {
                                        $img_category=$_FILES['img_category']['name'];
                                        $targetFile = $img_path_category . $img_category;
                                        move_uploaded_file($_FILES['img_category']['tmp_name'],$targetFile);
                                    }
                                    update_category($id_category,$name_category,$img_category);
                                    echo("
                                        <script>
                                            alert('Cập nhật danh mục thành công');
                                            window.location.href = 'index.php?act=category&action=list_category'
                                        </script>
                                    ");
                                }
                            }else{
                                include "view/admin/product/category/update.php";
                            }
                            break;
                    }

                }else{
                    include "view/admin/product/category/list.php";
                }
                break;


            case 'product':
                if(isset($_GET['action'])){
                    $action = $_GET['action'];
                    switch ($action){
                        case 'add_pro':
                            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                $id_category = $_POST['id_category'];
                                $name_pro = $_POST['name_pro'];
                                $price_pro = $_POST['price_pro'];
                                $description = $_POST['description'];
                                if (empty($_FILES['img']['name'])) {
                                    $img = "";
                                } else {
                                    $img=$_FILES['img']['name'];
                                    $targetFile = $img_path_product . $img;
                                    move_uploaded_file($_FILES['img']['tmp_name'],$targetFile);
                                }
                                insert_product($name_pro, $description, $img, $price_pro, $id_category);
                                echo("<script>
                                        alert('Add product successful')
                                        window.location.href = 'index.php?act=product&action=list_product';
                                    </script>");
                            }else{
                                include "view/admin/product/add.php";
                            }
                            break;
                        case 'thongkedm':
                            $listtk = thongke();
                            include "danhmuc/thongkedm.php";
                            break;
                        case 'delete_product':
                            if (isset($_GET['id_product'])) {
                                delete_category($_GET['id_product']);
                                echo ("<script>
                                            alert('Xóa danh mục thành công')
                                            window.location.href = 'index.php?act=product';
                                       </script>
                                    ");
                                break;
                            }
                            break;
                        case 'update_product':
                            if (isset($_GET['id_product'])) {
                                $id_product = $_GET['id_product'];
                                $product = load_one_product($id_product);
                                include("view/admin/product/update.php");
                            }else if($_SERVER['REQUEST_METHOD'] == "POST"){
                                $id_product = $_POST['id_product'];
                                $name_product = $_POST['name_product'];
                                if (empty($_FILES['img_product']['name'])) {
                                    $img_product = "";
                                } else {
                                    $img_product=$_FILES['img_product']['name'];
                                    $targetFile = $img_path_category . $img_product;
                                    move_uploaded_file($_FILES['img_product']['tmp_name'],$targetFile);
                                }
                                update_product($id_product,$name_product,$img_product);
                                echo("
                                    <script>
                                        alert('Cập nhật danh mục thành công');
                                        window.location.href = 'index.php?act=category&action=list_category'
                                    </script>
                                ");
                            }
                            break;
                    }
                }else{
                    $product = load_product_list(0,'');
                    include ("view/admin/product/list.php");
                }
                break;

            case 'khachhang':
                $listkhachhang = khachhang();
                include("khachhang/khachhang.php");
                break;
            case 'binhluan':
                $listbinhluan = binhluan();
                include("binhluan.php");
                break;

            case 'donhang':
                $listdh1 = ht_donhang();
                include("donhang/donhang.php");
                break;
            case "thongkedh":
                $thongkedh = thongke_donhang();
                include("donhang/thongke.php");
                break;
            case 'tinhtrang':
                if (isset($_POST['gui'])) {
                    $id = $_POST['id'];
                    $tinhtrang = $_POST['tinhtrang'];
                    capnhat($id, $tinhtrang);
                }
                include("donhang/donhang.php");
                break;
            default:
        }
    } else {
        include("home.php");
    }
    include("footer.php");

}
else if (!isset($_SESSION['user']) && !isset($_SESSION['role']) ){
    include "view/user/head.php";
    include "view/user/header.php";
    if (isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act){
            case "contact":
                include "view/user/contact.php";
                break;
            case "about":
                include "view/user/about.php";
                break;
            case "product":
                include "view/user/product.php";
                break;
            case "list-product":
                if(isset($_POST['keyword']) &&  $_POST['keyword'] != 0 ){
                    $keyword = $_POST['keyword'];
                }else{
                    $keyword = "";
                }
                if(isset($_GET['id_category']) && ($_GET['id_category']>0)){
                    $id_category=$_GET['id_category'];
                }else{
                    $id_category=0;
                }
                $list_pro = load_product_list($id_category,$keyword);
                include "view/user/list-product.php";
                break;
            case "detail":
                include "view/user/account-detail.php";
                break;
            case "cart":
                include "view/cart.php";
                break;
            case "form":
                include "view/user/login.php";
                break;
        }
    }else{
        include "view/user/slide.php";
        include "view/user/home-product.php";
        include "view/user/brand.php";
        include "view/user/categoties.php";
        include "view/user/recent.php";
        include "view/user/services.php";
        include "view/user/cta.php";
    }
    include "view/user/footer.php";
}