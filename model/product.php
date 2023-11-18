<?php
function load_one_product($id_pro){
    $sql = "SELECT *,
       p.id_pro AS product_id, 
       GROUP_CONCAT(DISTINCT ps.name_size) AS product_sizes, 
       GROUP_CONCAT(DISTINCT pc.name_color) AS product_colors, 
       GROUP_CONCAT(DISTINCT pi.img_url) AS product_images, 
       COALESCE(total_quantity, 0) AS total_quanitity 
FROM product p 
    LEFT JOIN (
        SELECT id_pro, SUM(quantity) AS total_quantity 
    FROM product_variant 
    GROUP BY id_pro ) pv_total 
        ON p.id_pro = pv_total.id_pro 
    JOIN product_variant pv 
        ON p.id_pro = pv.id_pro 
    JOIN product_size ps 
        ON pv.id_size = ps.id_size
    JOIN product_color pc 
        ON pv.id_color = pc.id_color
    JOIN product_image pi 
        ON p.id_pro = pi.id_pro 
WHERE pv.id_pro = ".$id_pro."
GROUP BY p.id_pro, p.name_pro, p.description, p.price, p.id_category";
    return pdo_query_one($sql);
}
// TRUY VẤN DỮ LIỆU LIST SẢN PHẨM
function load_product_list ($id_category,$keyw,$id_size,$id_color) {
    // query sản phẩm
    $sql = "SELECT *,
       p.id_pro AS product_id, 
       GROUP_CONCAT(DISTINCT ps.name_size) AS product_sizes, 
       GROUP_CONCAT(DISTINCT pc.name_color) AS product_colors, 
       GROUP_CONCAT(DISTINCT pi.img_url) AS product_images, 
       COALESCE(total_quantity, 0) AS total_quanitity 
FROM product p 
    LEFT JOIN (
        SELECT id_pro, SUM(quantity) AS total_quantity 
    FROM product_variant 
    GROUP BY id_pro ) pv_total 
        ON p.id_pro = pv_total.id_pro 
    JOIN product_variant pv 
        ON p.id_pro = pv.id_pro 
    JOIN product_size ps 
        ON pv.id_size = ps.id_size
    JOIN product_color pc 
        ON pv.id_color = pc.id_color
    JOIN product_image pi 
        ON p.id_pro = pi.id_pro 
GROUP BY p.id_pro, p.name_pro, p.description, p.price, p.id_category";

    // điều kiện query sản phẩm
    if($id_category != 0 ){
        $sql .= "and p.id_category =" . $id_category ;
    }
    if($keyw != "" ){
        $sql .= "and p.name_pro like %".$id_category."%" ;
    }
    if($id_size != 0 ){
        $sql .= "and pv.id_size =" . $id_size ;
    }
    if($id_color != 0 ){
        $sql .= "and p.id_color =" . $id_color ;
    }
    pdo_query($sql);
}