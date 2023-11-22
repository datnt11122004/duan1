<?php
function load_one_product($id_pro){
    $sql = "SELECT * FROM product p
            join  categories ct on ct.id_category = p.id_category
         where p.id_pro = '$id_pro' ";

    return pdo_query_one($sql);
}
// TRUY VẤN DỮ LIỆU LIST SẢN PHẨM
function load_product_list ($id_category,$keyword) {
    $sql = "SELECT * FROM product p 
            join categories ct on p.id_category = ct.id_category 
                where status = 0
            ";
    if($id_category != 0 ){
        $sql .= "and p.id_category =" . $id_category ;
    }
    if($keyword != "" ) {
        $sql .= "and p.name_pro like '%".$keyword."%'";
    }
    return pdo_query($sql);
}
function insert_product($name_pro, $description, $img, $price, $id_category){
    $sql = "INSERT INTO product(name_pro, description, img, price, id_category) 
            VALUES ('$name_pro', '$description', '$img', '$price', '$id_category')";
    return pdo_execute($sql);
}
function update_product($id_product,){

}