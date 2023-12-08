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

function addError($field, $message) {
    if (!isset($_SESSION['error'])) {
        $_SESSION['error'] = [];
    }
    $_SESSION['error'][$field] = $message;
}

if(isset($_SESSION['user']) && isset($_SESSION['role']) && $_SESSION['role'] == 1 ){

    $listCT = loadAll_category();
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
                                if(isset($_POST['add_category'])) {
                                    $name_category = $_POST['name_category'];
                                    if(empty($name_category)){
                                        addError('name_category','Please fill this field');
                                    }

                                    if (empty($_FILES['img_category']['name'])) {
                                        $img_category = "";
                                        addError('img_category','Please fill this field');
                                    }else {
                                        $img_category = $_FILES['img_category']['name'];
                                        $targetFile = $img_path_category . $img_category;
                                        move_uploaded_file($_FILES['img_category']['tmp_name'], $targetFile);
                                    }
                                    if(!isset($_SESSION['error'])){
                                        insert_category($name_category, $img_category);
                                        echo("<script>
                                                alert('Add category successfully')
                                                window.location.href = 'index.php?act=category';
                                              </script>");
                                    }else{
                                        echo("<script>
                                                alert('Please fill out all fields')
                                                window.location.href = 'index.php?act=category&action=add_category';
                                              </script>");
                                    }
                                }
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
                                            alert('Delete category successfully')
                                            window.location.href = 'index.php?act=category';
                                       </script>
                                    ");
                                break;
                            }
                            break;
                        case 'update_category':
                            if($_SERVER['REQUEST_METHOD'] == 'POST' ) {
                                if (isset($_POST['update_category'])) {
                                    $id_category = $_POST['id_category'];
                                    $name_category = $_POST['name_category'];
                                    if(empty($name_category)){
                                        addError('name_category','Please enter a category name');
                                    }
                                    if (empty($_FILES['img_category']['name'])) {
                                        $img_category = "";
                                    } else {
                                        $img_category = $_FILES['img_category']['name'];
                                        $targetFile = $img_path_category . $img_category;
                                        move_uploaded_file($_FILES['img_category']['tmp_name'], $targetFile);
                                    }
                                    if(isset($_SESSION['error'])){
                                        update_category($id_category, $name_category, $img_category);
                                        echo("
                                        <script>
                                            alert('Update category successfully');
                                            window.location.href = 'index.php?act=category'
                                        </script>
                                        ");
                                    }else{
                                        update_category($id_category, $name_category, $img_category);
                                        echo("
                                        <script>
                                            alert('Category updated failed');
                                            window.location.href = 'index.php?act=category'
                                        </script>
                                        ");
                                    }
                                }
                            }else{
                                if (isset($_GET['id_category'])) {
                                    $id_category = $_GET['id_category'];
                                    $category = load_one_category($id_category);
                                    include("view/admin/product/category/update.php");
                                }
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
                                $id_category = $_POST['category'];
                                $name_pro = $_POST['name_pro'];
                                $price_pro = $_POST['price_pro'];
                                $description = $_POST['description'];
                                $images = $_FILES["img"];
                                $uploaded_image_paths = array();
                                foreach ($images["name"] as $key => $image_name) {
                                    $tmp_name = $images["tmp_name"][$key];
                                    $img_product = $img_path_product. basename($image_name);

                                    // Di chuyển tệp tin từ thư mục tạm thời đến thư mục lưu trữ
                                    move_uploaded_file($tmp_name, $img_product);
                                    $uploaded_image_paths[] = basename($image_name);
                                }
                                $image_paths_string = implode(",", $uploaded_image_paths);
                                insert_product($name_pro, $description, $image_paths_string, $price_pro, $id_category);
                                echo("<script>
                                        alert('Add product successfully')
                                        window.location.href = 'index.php?act=product';
                                    </script>");
                                exit;
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
                                delete_product($_GET['id_product']);
                                echo ("<script>
                                            alert('Delete product successfully')
                                            window.location.href = 'index.php?act=product';
                                       </script>
                                    ");
                                break;
                            }
                            break;
                        case 'update_product':
                            function get_current_image_paths($id_product){
                                $current_image_paths = load_img_product($id_product);
                                return $current_image_paths['img'];
                            }
                            if (isset($_GET['id_product'])) {
                                $id_product = $_GET['id_product'];
                                $product = load_one_product($id_product);
                                include("view/admin/product/update.php");
                            }else if($_SERVER['REQUEST_METHOD'] == "POST"){
                                $id_product = $_POST['id_product'];
                                $id_category = $_POST['id_category'];
                                $name_pro = $_POST['name_product'];
                                $price = $_POST['price'];
                                $description = $_POST['description'];
                                $images = $_FILES["img_product"];
                                $uploaded_image_paths = array();
                                if (!empty($images["name"])) {
                                    // Người dùng đã tải lên ảnh mới
                                    foreach ($images["name"] as $key => $image_name) {
                                        $tmp_name = $images["tmp_name"][$key];
                                        $img_product = $img_path_product . basename($image_name);

                                        // Di chuyển tệp tin từ thư mục tạm thời đến thư mục lưu trữ
                                        move_uploaded_file($tmp_name, $img_product);

                                        $uploaded_image_paths[] = basename($image_name);
                                    }

                                    // Chuyển mảng đường dẫn thành chuỗi, ngăn cách bởi dấu phẩy
                                    $image_paths_string = implode(",", $uploaded_image_paths);
                                } else {
                                    // Người dùng không tải lên ảnh mới, giữ nguyên giá trị hiện tại
                                    $image_paths_string = implode(",",get_current_image_paths($id_product));
                                }
                                update_product($id_product,$name_pro,$description,$image_paths_string,$price,$id_category);
                                echo("
                                    <script>
                                        alert('Update product successfully');
                                        window.location.href = 'index.php?act=product'
                                    </script>
                                ");
                            }

                            break;


                    }
                }else{
                    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                        if(isset($_POST['search']) && $_POST['search'] == 'search'){
                            $keyword = $_POST['keyword'];
                            $id_category = $_POST['id_category'];
                            $product = load_product_list($id_category,$keyword);
                            include ("view/admin/product/list.php");
                        }
                    }else {
                        $product = load_product_list(0, '');
                        include("view/admin/product/list.php");
                    }
                }
                break;

            case 'account':

                break;
            case 'order':
                if(isset($_GET['action'])){
                    $action = $_GET['action'];
                    switch ($action){
                        case 'update_order':

                            break;

                    }
                }else{
                    include ("view/admin/order/list.php");
                }
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
            case 'logout':
                logout();
                echo "<script> window.location.href = 'index.php'</script>";
                break;
            default:
        }
    } else {
        include("view/admin/home.php");
    }
    include("view/admin/footer.php");

}
else{

    $listCT = loadAll_category();
    include "view/user/display/head.php";
    include "view/user/display/header.php";

    if (isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act){
            case "contact":
                include "view/user/contact/contact.php";
                break;
            case "about":
                include "view/user/about/about.php";
                break;
            case "product":
                if(isset($_GET['id_pro'])){
                    $id_pro = $_GET['id_pro'];
                    $product = load_one_product($id_pro);
                    $comment = load_all_reviews($id_pro);
                    include "view/user/product/product.php";
                }
                break;
            case "list-product":
                if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    if(isset($_POST['search']) && $_POST['search'] == 'search'){
                        $keyword = $_POST['keyword'];
                        $id_category = $_POST['id_category'];
                        $product = load_product_list($id_category,$keyword);
                        include ("view/user/product/list.php");
                    }
                }else {
                    $list_pro = load_product_list(0, '');
                    include("view/user/product/list-product.php");
                }
            case 'review':
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $id_user = $_POST['id_user'];
                    $id_pro = $_POST['id_pro'];
                    $general_review = $_POST['general_review'];
                    $detail_review = $_POST['detail_review'];
                    insert_review($id_pro,$id_user,$general_review,$detail_review);
                }
                break;
            case "detail":
                include "view/user/account/account-detail.php";
                break;
            case "order":
                if (isset($_SESSION['cart'])) {
                    $cart = $_SESSION['cart'];
                    // print_r($cart);
                    if (isset($_POST['order_confirm'])) {
                        $txthoten = $_POST['txthoten'];
                        $txttel = $_POST['txttel'];
                        $txtemail = $_POST['txtemail'];
                        $txtaddress = $_POST['txtaddress'];
                        $pttt = $_POST['pttt'];
                        // date_default_timezone_set('Asia/Ho_Chi_Minh');
                        // $currentDateTime = date('Y-m-d H:i:s');
                        if (isset($_SESSION['user'])) {
                            $id_user = $_SESSION['user']['id'];
                        } else {
                            $id_user = 0;
                        }
                        $idBill = addOrder($id_user, $txthoten, $txttel, $txtemail, $txtaddress, $_SESSION['resultTotal'], $pttt);
                        foreach ($cart as $item) {
                            addOrderDetail($idBill, $item['id'], $item['price'], $item['quantity'], $item['price'] * $item['quantity']);
                        }
                        unset($_SESSION['cart']);
                        $_SESSION['success'] = $idBill;
                        header("Location: index.php?act=success");
                    }
                    include "view/order.php";
                } else {
                    header("Location: index.php?act=listCart");
                }
                break;
            case 'add_to_cart' :
                add_to_cart();
                break;
            case 'list-cart':
                if(!empty($_SESSION['cart'])){
                    $cart = $_SESSION['cart'];
                    $idProduct = array_column($cart,'id');
                    $idList = implode(',', $idProduct);
                    $listCart = load_product_cart($idList);
                    include "view/user/order/cart.php";
                }
                break;
            case 'pay' :
                include "view/user/order/pay.php";
                break;
            case "login":
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $email = $_POST['singin-email'];
                    $password = $_POST['singin-password'];
                    $user = login($email,$password);
                    if($user){
                        $_SESSION['user'] = $user['name'];
                        $_SESSION['role'] = $user['role'];
                        echo "<script> 
                                 alert('Login successfully')
                                 window.location.href = 'index.php' 
                              </script>";
                    }
                }else{
                    include "view/user/login.php";
                }
                break;
            case "signup":
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $email = $_POST['register-email'];
                    $password = $_POST['register-password'];
                    $name_user = $_POST['register-user-name'];
                    $tel = $_POST['register-tel'];
                    $address = $_POST['register-address'];
                    $user = signup($email,$name_user,$password,$address,$tel);
                    if($user){
                        echo "<script> window.location.href = 'index.php' </script>";
                    }else{
                        echo "<script> 
                                alert('Tên đăng nhập hoặc mật khẩu không tồn tại')
                                window.location.href = 'index.php' 
                              </script>";
                    }
                }else{
                    include "view/user/login.php";
                }
                break;
            case 'logout':
                logout();
                echo "<script> window.location.href = 'index.php'</script>";
                break;
        }
    }else{
        include "view/user/home/slide.php";
        include "view/user/home/home-product.php";
        include "view/user/home/brand.php";
        include "view/user/home/categoties.php";
        include "view/user/home/recent.php";
        include "view/user/home/services.php";
        include "view/user/home/cta.php";
    }
    include "view/user/display/footer.php";
}