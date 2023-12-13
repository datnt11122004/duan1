<?php
// Kiểm tra xem có tồn tại mảng giỏ hàng hay không.
function add_to_cart(){
    if (!isset($_SESSION['cart'])) {
        // Nếu không có thì đi khởi tạo
        $_SESSION['cart'] = [];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Lấy dữ liệu từ ajax đẩy lên
        $productId = $_POST['id'];
        $productName = $_POST['name'];
        $productPrice = $_POST['price_pro'];

        // check product in cart
        $index = false;
        if (!empty($_SESSION['cart'])) {
            $index = array_search($productId, array_column($_SESSION['cart'], 'id'));
        }


        if ($index !== false) {
            $_SESSION['cart'][$index]['quantity'] += 1;
        } else {
            // if product in cart, product's quantity +1
            $product = [
                'id' => $productId,
                'name' => $productName,
                'price' => $productPrice,
                'quantity' => 1
            ];
            $_SESSION['cart'][] = $product;
            // var_dump($_SESSION['cart']);die;
        }
        // return quantity cart
        return count($_SESSION['cart']);
    } else {
        return 'Your request is invalid';
    }
}
function load_list_cart(){
    $cart = $_SESSION['cart'];
    $idProduct = array_column($cart,'id');
    $idList = implode(',', $idProduct);
    $listCart = load_product_cart($idList);
    return $listCart ;
}
function update_quantity_cart(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $productID = $_POST['id'];
        $newQuantity = $_POST['quantity'];

        if(!empty($_SESSION['cart'])){
            $index = array_search($productID,array_column($_SESSION['cart'],'id'));
        }

        if($index !== false){
            $_SESSION['cart'][$index]['quantity'] = $newQuantity;
            return load_list_cart();
        }else{
            return 'This product is not exist ';
        }
    }else{
        return 'Your request is invalid';
    }
}

function removeFromCart(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $productID = $_POST['id'];

        if(!empty($_SESSION['cart'])){
            $index = array_search($productID,array_column($_SESSION['cart'],'id'));
        }

        if($index !== false){
            unset($_SESSION['cart'][$index]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            return load_list_cart();
        }else{
            return 'This product is not exist ';
        }
    }else{
        return 'Your request is invalid';
    }
}
?>