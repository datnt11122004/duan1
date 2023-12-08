<?php
function insert_category($name_category,$img_category){
    $sql="insert into categories(name_category,img_category) values('$name_category','$img_category')";
    pdo_execute($sql);
}
function load_one_category($id_category){
    $sql = "SELECT * FROM categories where id_category = '$id_category'" ;
    return pdo_query_one($sql);
}
function loadAll_category(){
    $sql = "select * from categories where 1 ";
    return pdo_query($sql);
}
function delete_category($id_category){
    $sql = "DELETE FROM categories WHERE id_category ="."$id_category";
    pdo_execute($sql);
}
function update_category($id_category,$name_category,$img_category){
    if ($img_category != ''){
        $sql = "UPDATE categories SET  name_category = '$name_category', img_category = '$img_category' WHERE id_category = '$id_category'";
    }else{
        $sql = "UPDATE categories SET  name_category = '$name_category' WHERE id_category = '$id_category'";
    }
    pdo_execute($sql);
}
?>