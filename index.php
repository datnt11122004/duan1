<?php
session_start();
ob_start();
include("model/pdo.php");
include("model/review.php");
include("model/cart.php");
include("model/product.php");
include("model/account.php");
include("model/wishlist.php");
include("model/category.php");
include("global.php");


if( isset($_SESSION['user']) && $_SESSION['user']['role'] == 2 ){

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
                                        addError('name_category','Please fill out this field');
                                    }

                                    if (empty($_FILES['img_category']['name'])) {
                                        $img_category = "";
                                        addError('img_category','Please fill out this field');
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

                                    if(!isset($_SESSION['error'])){
                                        update_category($id_category, $name_category, $img_category);
                                        echo("    
                                        <script>
                                            alert('Update category successfull');
                                            window.location.href = 'index.php?act=category'
                                        </script>
                                        ");
                                    }else{
                                        echo("
                                        <script>
                                            alert('Category updated failed');
                                            window.location.href = 'index.php?act=category&action=update_category&id_category=$id_category'
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
                    $listCT = loadAll_category();
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
                                if(empty($id_category)) addError('category','Please fill out this field');

                                if(empty($name_pro)) addError('name_pro','Please fill out this field');

                                if(empty($price_pro)) addError('price','Please fill out this field');

                                if($price_pro <= 0 ) addError('price','Price must be greater than 0 ');

                                if(!is_numeric($price_pro)) addError('price','Price must be the number');

                                if(empty($description)) addError('description','Please fill out this field');

                                if(empty($images)){
                                    addError('image','Please insert images product');
                                }else{
                                    $uploaded_image_paths = array();
                                    foreach ($images["name"] as $key => $image_name) {
                                        $tmp_name = $images["tmp_name"][$key];
                                        $img_product = $img_path_product. basename($image_name);

                                        // Di chuyển tệp tin từ thư mục tạm thời đến thư mục lưu trữ
                                        move_uploaded_file($tmp_name, $img_product);
                                        $uploaded_image_paths[] = basename($image_name);
                                    }
                                    $image_paths_string = implode(",", $uploaded_image_paths);
                                    unset($uploaded_image_paths);
                                }

                                if(!isset($_SESSION['error'])){
                                    insert_product($name_pro, $description, $image_paths_string, $price_pro, $id_category);
                                    $image_paths_string = '';
                                    echo("<script>
                                        alert('Add product successfully')
                                        window.location.href = 'index.php?act=product';
                                    </script>");
                                }else{
                                    echo("<script>
                                        alert('Add product failed')
                                        window.location.href = 'index.php?act=product&action=add_product';
                                    </script>");
                                }
                                exit;
                            }else{
                                $listCT = loadAll_category();
                                include "view/admin/product/add.php";
                            }
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
                            if (isset($_GET['id_product'])) {
                                $id_product = $_GET['id_product'];
                                $product = load_one_product($id_product);
                                $listCT = loadAll_category();
                                include("view/admin/product/update.php");
                            }else if($_SERVER['REQUEST_METHOD'] == "POST"){
                                $id_product = $_POST['id_product'];
                                $id_category = $_POST['id_category'];
                                $name_pro = $_POST['name_product'];
                                $price = $_POST['price'];
                                $description = $_POST['description'];
                                $images = $_FILES["img_product"];

                                if(empty($id_category)) addError('category','Please fill out this field');

                                if(empty($name_pro)) addError('name_pro','Please fill out this field');

                                if(empty($price)){
                                    addError('price','Please fill out this field');
                                }

                                if($price <= 0 ){
                                    addError('price','Price must be greater than 0 ');
                                }
                                if(!is_numeric($price)){
                                    addError('price','Price must be the number');
                                }

                                if(empty($description)){
                                    addError('description','Please fill out this field');
                                }

                                if(empty($images)){
                                    addError('image','Please insert images product');
                                }else{
                                    $uploaded_image_paths = array();
                                    foreach ($images["name"] as $key => $image_name) {
                                        $tmp_name = $images["tmp_name"][$key];
                                        $img_product = $img_path_product. basename($image_name);

                                        // Di chuyển tệp tin từ thư mục tạm thời đến thư mục lưu trữ
                                        move_uploaded_file($tmp_name, $img_product);
                                        $uploaded_image_paths[] = basename($image_name);
                                    }
                                    $image_paths_string = implode(",", $uploaded_image_paths);
                                    unset($uploaded_image_paths);
                                }

                                if(!isset($_SESSION['error'])){
                                    update_product($id_product,$name_pro,$description,$image_paths_string,$price,$id_category);
                                    $image_paths_string = '';
                                    echo("
                                    <script>
                                        alert('Update product successfully');
                                        window.location.href = 'index.php?act=product'
                                    </script>
                                    ");
                                }else{
                                    echo("<script>
                                        alert('Add product failed')
                                        window.location.href = 'index.php?act=product&action=add_product';
                                    </script>");
                                }
                            }
                            break;
                    }
                }else{
                    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                        if(isset($_POST['search']) && $_POST['search'] == 'search'){
                            $keyword = $_POST['keyword'];
                            $id_category = $_POST['id_category'];
                            $listCT = loadAll_category();
                            $product = load_product_list($id_category,$keyword);
                            include("view/admin/product/list.php");
                        }
                    }else {
                        $listCT = loadAll_category();
                        $product = load_product_list(0, '');
                        include("view/admin/product/list.php");
                    }
                }
                break;

            case 'account':
                if(isset($_GET['action'])){
                    $action = $_GET['action'];
                    switch ($action){
                        case 'update-account':
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                $idAccount = $_POST['id-account'];
                                $nameUser = $_POST['name-user'];
                                $password = $_POST['password'];
                                $role = $_POST['role'];
                                $phone = $_POST['phone'];
                                $email = $_POST['email'];
                                $address = $_POST['address'];
                                update_account($nameUser, $password, $role, $phone, $email, $address, $idAccount);
                                echo '<script>
                                        alert("Account updated successfully")
                                        window.location.href = "index.php?act=account"
                                    </script>
                                ';
                            }else {
                                $id_account = $_GET['id_account'];
                                $listRole = list_role();
                                $account = account($id_account);
                                include("view/admin/account/update.php");
                            }
                            break;

                    }
                }else{
                    $account = list_account();
                    include("view/admin/account/list.php");
                }
                break;
            case 'order':
                if(isset($_GET['action'])){
                    $action = $_GET['action'];
                    switch ($action){
                        case 'update-order':
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                $paymentStatus = $_POST['payment-status'];
                                $statusOrder = $_POST['status-order'];
                                $id_oder = $_POST['id-order'];
                                update_status_order($paymentStatus,$statusOrder,$id_oder);
                                echo '
                                    <script>
                                        alert("Update status order completed")
                                        window.location.href = "index.php?act=order"
                                    </script>
                                ';
                            }else{
                                if(isset($_GET['id-order'])){
                                    $idOder = $_GET['id-order'];
                                    $orderDetails = orderDetails($idOder);
                                    $listStatusOrder = list_status_order();
                                    include 'view/admin/order/details.php';
                                }
                            }
                            break;
                        case 'cancel-order' :
                            $idOder = $_GET['id-order'];
                            update_status_order(1,6,$idOder);
                            echo '
                                <script>
                                    alert("Cancel order completed")
                                    window.location.href = "index.php?act=order"
                                </script>
                            ';
                            break;

                    }
                }else{
                    $listOrder = listOderAdmin();
                    include("view/admin/order/list.php");
                }
                break;
            case 'logout':
                logout();
                echo "<script> window.location.href = 'index.php'</script>";
                break;
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
                    $productLikeCategory = load_product_list($product['id_category'],'');
                    update_view($id_pro);
                    include "view/user/product/product.php";
                }
                break;
            case "list-product":
                $id_category = $_GET['id_category'] ?? 0;
                $keyword =  $_POST['keyword'] ?? '';
                $list_pro = load_product_list($id_category, $keyword);
                include("view/user/product/list-product.php");
                break;
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
                $listOrder = listOrder($_SESSION['user']['id_user']);
                include "view/user/account/account-detail.php";
                break;
            case 'update-detail':
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $name = $_POST['name'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $password = empty($_POST['new-password']) ? $_POST['current-password'] : $_POST['new-password'];

                    if(empty($name)) addError('name','Please enter your name');
                    if(empty($phone)) addError('phone','Please enter your phone number');
                    if(!isValidPhoneNumber($phone)) addError('phone', 'Please enter your phone number');
                    if(empty($email)) addError('email', 'Please enter your email');
                    if(!isValidEmail($email)) addError('email', 'Please enter your email');
                    if(empty($address)) addError('address', 'Please enter your address');

                    if(!isset($_SESSION['error'])){
                        $check_account = check_account($email,$phone);
                        if(!$check_account){
                            echo "<script> 
                                    alert('This email account or phone number is already registered')
                                    window.location.href = 'index.php?act=detail' 
                                  </script>";
                        }else{
                            echo "<script> 
                                    alert('Your information has been updated, please check')
                                    window.location.href = 'index.php?act=detail' 
                                  </script>";
                        }
                    }else{
                        echo "<script> 
                                    alert('An error occurred, please try again')
                                    window.location.href = 'index.php?act=detail' 
                                  </script>";
                    }

                }
                break;
//                Cart
            case 'add_to_cart' :
                add_to_cart();
                break;
            case 'update_quantity_cart':
                update_quantity_cart();
                break;
            case 'remove_from_cart':
                removeFromCart();
                break;
            case 'list-cart':
                if(!empty($_SESSION['cart'])){
                    $listCart = load_list_cart();
                }
                include "view/user/order/cart.php";
                break;
            case 'pay' :
                if(isset($_SESSION['user'])){
                    if(!empty($_SESSION['cart'])){
                        $listCart = load_list_cart();
                    }
                    include "view/user/order/pay.php";
                }else{
                    $_SESSION['returnUrl'] = "index.php?act=list-cart";
                    echo '
                        <script>
                            alert("Please login after payments");
                            window.location.href = "index.php?act=login";
                        </script>
                    ';
                }
                break;
            case 'checkout':
                if($_SERVER['REQUEST_METHOD']){
                    $name = $_POST['name'];
                    $address = $_POST['address'];
                    $tel = $_POST['tel'];
                    $note = $_POST['note'];

                    if(empty($name)) addError('name','Please enter your name');
                    if(empty($address)) addError('address', 'Please enter your delivery address');
                    if(empty($tel)) addError('tel','Please enter your delivery phone number');
                    if(!isValidPhoneNumber($tel)) addError('tel', 'Please enter a valid phone number ');

                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $date = date('Y-m-d H:i:s');
                    if(!isset($_SESSION['error'])){
                        foreach ($_SESSION['cart'] as $value){
                            update_purchases($value['id']);
                            insert_order($_SESSION['user']['id_user'],$value['id'],$value['quantity'],$address,$tel,$note,$date);
                        }
                        unset($_SESSION['cart']);
                        unset($_SESSION['resultTotal']);
                        include 'view/user/order/checkout.php';
                    }else{
                        echo "<script> 
                                 alert('Order failed, an error occurred');
                                 window.location.href = 'index.php?act=pay' 
                              </script>";
                    }
                }
                break;
            case 'cancel-order':
                if (isset($_GET['id-order'])){
                    $idOrder = $_GET['id-order'];
                    update_status_order(1,6,$idOrder);
                    echo '<script> window.location.href = "index.php?act=detail" </script>';
                }
                break;
            case 'return-order':
                if (isset($_GET['id-order'])){
                    $idOrder = $_GET['id-order'];
                    update_status_order(1,7,$idOrder);
                    echo '<script> window.location.href = "index.php?act=detail" </script>';
                }
                break;
            case 'confirm-order':
                if (isset($_GET['id-order'])){
                    $idOrder = $_GET['id-order'];
                    update_status_order(0,8,$idOrder);
                    echo '<script> window.location.href = "index.php?act=detail" </script>';
                }
                break;
//                Login/logout/Sign up
            case "login":
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $email = $_POST['signin-email'];
                    $password = $_POST['signin-password'];
                    unset($_SESSION['error']);
                    if(empty($email)) addError('signin-email','Please enter this field');
                    if(empty($password)) addError('signin-password','Please enter this field');
                    if(!isValidEmail($email)) addError('signin-email', 'You must enter an email for this field');

                    if(!isset($_SESSION['error'])){
                        $user = login($email,$password);
                        if($user){
                            $location = $_SESSION['returnUrl'] ?? 'index.php';
                            $_SESSION['user'] = $user;
                            echo "<script> 
                                 alert('Login successfully')
                                 window.location.href = '$location' 
                              </script>";
                        }else{
                            echo "<script> 
                                 alert('Account or password is incorrect')
                                 window.location.href = 'index.php?act=login' 
                              </script>";
                        }
                    }else{
                        echo "<script> 
                                 alert('Login failed, an error occurred');
                                 window.location.href = 'index.php?act=login' 
                              </script>";
                    }

                }else{
                    include "view/user/account/login.php";
                }
                break;
            case "signup":
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    $email = $_POST['register-email'];
                    $password = $_POST['register-password'];
                    $name_user = $_POST['register-user-name'];
                    $tel = $_POST['register-tel'];
                    $address = $_POST['register-address'];
                    unset($_SESSION['error']);
                    if (empty($email)) addError('register-email','Please enter this field' );
                    if (isValidEmail($email)) addError('register-email','You must enter an email for this field');
                    if(empty($password)) addError('register-password','Please enter this field');
                    if(empty($name_user)) addError('register-user-name', 'Please enter this field');
                    if(empty($tel)) addError('register-tel','Please enter this field');
                    if(!isValidPhoneNumber($tel)) addError('register-tel', 'You must enter a phone number for this field');
                    if(empty($address)) addError('register-address','Please enter this field');

                    if(!isset($_SESSION['error'])){
                        $check_account = check_account($email, $tel);
                        if(!$check_account){
                            signup($email, $name_user, $password, $address, $tel);
                            echo "<script> 
                                    alert('Successful registration, proceed to log in')
                                    window.location.href = 'index.php?act=login'
                                  </script>";
                        }else {
                            echo "<script> 
                                    alert('This email account or phone number is already registered')
                                    window.location.href = 'index.php?act=login' 
                                  </script>";
                        }
                    }else{
                        echo "<script> 
                            alert('Registration failed, an error occurred')
                            window.location.href = 'index.php?act=login'
                          </script>";
                    }
                }else{
                    include "view/user/account/login.php";
                }
                break;
            case 'logout':
                logout();
                echo "<script> window.location.href = 'index.php'</script>";
                break;
        }
    }else{
        $list_product = load_product_list(0,'');
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
ob_end_flush();