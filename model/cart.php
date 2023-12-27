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

function insert_order($id_user,$id_pro,$quantity,$address,$tel,$note,$date){
    $sql = "INSERT INTO cart 
    ( `id_user`, `id_pro`, `quantity`, `shipping_address`, `shipping_tel`, `note`, `date_order`) 
    VALUES ('$id_user','$id_pro','$quantity','$address','$tel','$note','$date')";
    pdo_execute($sql);
}

function listOrder ($id_user) {
    $sql = "SELECT p.id_pro as idProduct, p.name_pro,c.shipping_address,
            c.shipping_tel, c.quantity as quantityProductOrder,c.id_cart, 
            p.price, c.id_status as statusOrder, name_status, p.img, c.date_completed_order as dateCompleted
            FROM cart c
            JOIN product p on p.id_pro = c.id_pro
            JOIN status_cart st on c.id_status = st.id_status 
            where c.id_user = '$id_user'; ";
    return pdo_query($sql);
}

function listOderAdmin(){
    $sql = "SELECT p.id_pro as idProduct, p.name_pro,c.shipping_address,
            c.shipping_tel, c.quantity as quantityProductOrder,c.id_cart, 
            p.price, c.id_status as statusOrder, name_status, p.img,
            ac.name as nameUser, c.id_cart, c.date_completed_order as dateCompleted,
            c.date_order, c.payment_status,c.method_payments
            FROM cart c
            JOIN product p on p.id_pro = c.id_pro
            JOIN account ac on ac.id_user = c.id_user
            JOIN status_cart st on c.id_status = st.id_status ";
    return pdo_query($sql);
}

function list_status_order(){
    $sql = "SELECT id_status as idStatusOrder, name_status as nameStatusOrder FROM status_cart where 1; ";
    return pdo_query($sql);
}

function orderDetails($id_order){
    $sql = "SELECT p.id_pro as idProduct, p.name_pro,c.shipping_address,
            c.shipping_tel, c.quantity as quantityProductOrder,c.id_cart, 
            p.price, c.id_status as statusOrder, name_status, p.img,c.note,
            ac.name as nameUser, c.id_cart, c.date_completed_order as dateCompleted,
            c.date_order, c.payment_status,c.method_payments
            FROM cart c
            JOIN product p on p.id_pro = c.id_pro
            JOIN account ac on ac.id_user = c.id_user
            JOIN status_cart st on c.id_status = st.id_status
            WHERE c.id_cart = '$id_order' ";
    return pdo_query_one($sql);
}

function update_status_order($payment_status,$id_status,$id_order){
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = time();
    $sql = "UPDATE cart SET payment_status = '$payment_status' , id_status = '$id_status'";
    if($payment_status == 0 && $id_status == 8 ){
        $sql.= ", date_completed_order = '$date'";
    }
    $sql.= "where id_cart = '$id_order' ";
    pdo_execute($sql);
}
?>