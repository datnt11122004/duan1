<?php

function login($email,$password){
    $sql = "SELECT * FROM account where email = '$email' and pass = '$password' ";
    return pdo_query_one($sql);
}
function signup($email,$name_user,$pass,$address,$tel){
    $sql = "INSERT INTO account(name,pass,tel,email,address) 
            VALUES ('$name_user','$pass','$tel','$email','$address') ";
    return pdo_execute($sql);
}

function logout(){
    if(isset($_SESSION)){
        session_destroy();
        session_unset();
    }else{
        echo "<script> 
                    alert('Đã đăng nhập đâu ní')
                    window.location.href = 'index.php';
              </script>";
    }

}