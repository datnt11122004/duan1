<?php
$img_path_product = "assets/images/products/";
$img_path_category = "assets/images/category/";

function addError($field, $message) {
    if (!isset($_SESSION['error'])) {
        $_SESSION['error'] = [];
    }
    $_SESSION['error'][$field] = $message;
}
function isValidPhoneNumber($phoneNumber){
    $number = str_replace(array('-', '.', ' '), '', $phoneNumber);
    return preg_match('/^0[0-9]{9,10}$/', $number);
}

function isValidEmail($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}
