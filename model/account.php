<?php

function login($email,$password){
    $sql = "SELECT * FROM account where email = '$email' and pass = '$password' ";
    return pdo_query_one($sql);
}
function signup($email,$name_user,$pass,$address,$tel){
    $sql = "INSERT INTO account(name,pass,tel,email,address,role) 
            VALUES ('$name_user','$pass','$tel','$email','$address',1) ";
    pdo_execute($sql);
}

function logout(){
    if(isset($_SESSION['user'])){
        session_destroy();
        session_unset();
    }else{
        echo "<script> 
                    window.location.href = 'index.php';
              </script>";
    }
}

function check_account($email, $tel){
    $sql = "SELECT * FROM account where email = '$email' or tel = '$tel' ";
    $result = pdo_query($sql);
    $row_count = count($result);
    return $row_count > 0;
}
function list_account(){
    $sql = "SELECT * FROM account join role on role = role_id where 1";
    return pdo_query($sql);
}

function account($id_user){
    $sql = "SELECT * FROM account where id_user = '$id_user'";
    return pdo_query_one($sql);
}
function list_role(){
    $sql = "SELECT * FROM role where 1";
    return pdo_query($sql);
}

function update_account($name,$pass,$role,$phone,$email,$address, $idAccount){
    $sql = "UPDATE account SET name = '$name', pass = '$pass', tel = '$phone', email = '$email', address = '$address', role = '$role' where id_user = '$idAccount' ";
    pdo_execute($sql);
}
?>