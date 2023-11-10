<?php
function load_one_product($id_pro){
    $sql = "SELECT *,
            p.id_pro AS ProductID,
            p.name_pro AS ProductName,
            GROUP_CONCAT(DISTINCT ps.name_size) AS sizeList,
            GROUP_CONCAT(DISTINCT pc.name_color) AS colorList,
            GROUP_CONCAT(DISTINCT pi.img_url) AS productImageList
            FROM product p
            JOIN product_variant pv ON p.id_pro = pv.id_pro
            JOIN product_size ps ON pv.id_size = ps.id_size
            JOIN product_color pc ON pv.id_color = pc.id_color
            LEFT JOIN product_image pi ON p.id_pro = pi.id_pro
            WHERE p.id_pro =" .$id_pro;
    return pdo_query_one($sql);
}
$listsp = load_one_product();
foreach ()
    extract($listsp);
    $sizeList
        foreach($sizeList as $value)
            extract($value);

// TRUY VẤN DỮ LIỆU LIST SẢN PHẨM
function load_product_list ($id_category,$keyw,$id_size,$id_color) {
    // query sản phẩm
    $sql = "SELECT *,
            p.id_pro AS ProductID,
            p.name_pro AS ProductName,
            GROUP_CONCAT(DISTINCT ps.name_size) AS sizeList,
            GROUP_CONCAT(DISTINCT pc.name_color) AS colorList,
            GROUP_CONCAT(DISTINCT pi.img_url) AS productImageList
            FROM product p
            JOIN product_variant pv ON p.id_pro = pv.id_pro
            JOIN product_size ps ON pv.id_size = ps.id_size
            JOIN product_color pc ON pv.id_color = pc.id_color
            LEFT JOIN product_image pi ON p.id_pro = pi.id_pro
            where pv.id_status_cart <> 0
    ";

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