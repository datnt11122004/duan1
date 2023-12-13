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
function update_product($id_product,$name_pro,$description,$img_product,$price,$id_category){
    $sql = "UPDATE PRODUCT SET name_pro = '$name_pro', description = '$description', img = '$img_product', price ='$price', id_category ='$id_category' WHERE id_pro ='$id_product'";
    pdo_execute($sql);
}
function load_img_product($id_pro){
    $sql = "SELECT img FROM product WHERE id_pro = '$id_pro'";
    return pdo_query($sql);
}

function load_product_cart($idList){
    $sql = "SELECT * FROM product where id_pro in"."($idList)";
    return pdo_query($sql);
}

function delete_product($id_pro){
    $sql = "DELETE * FROM product p join 
            review rv on rv.id_pro = p.id_pro
            where p.id_pro = '$id_pro' ";
    pdo_execute($sql);
}