<?php
include "view/head.php";
include "view/header.php";
if (isset($_GET['act'])){
    $act = $_GET['act'];
    switch ($act){
        case"home":
            include "view/slide.php";
            include "view/home-product.php";
            include "view/brand.php";
            include "view/categoties.php";
            include "view/recent.php";
            include "view/services.php";
            include "view/cta.php";
            break;
        case "contact":
            include "view/contact.php";
            break;
        case "about":
            include "view/about.php";
            break;
        case "product":
            include "view/product.php";
            break;
        case "list-product":
            include "view/list-product.php";
            break;
        case "detail":
            include "view/account-detail.php";
            break;
        case "cart":
            include "view/cart.php";
            break;
        case "form":
            include "view/login.php";
            break;
    }
}
include "view/footer.php";