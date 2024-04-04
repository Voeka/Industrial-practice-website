<?php

require('db.php');

print_r($_GET);

$email = $_GET['email'];
$password = hash('sha256',$_GET['password']);

$query = $db->query("SELECT * from user where email='$email' and password='$password'");

if($query){
    $res = $query->fetchAll();
    if(!empty($res)){
        $_SESSION['user']=$res[0];
        header("Location: index.php");
    }else{
        echo("<script>alert('Неверный логин или пароль!');location.href = `login.php`</script>");
    }
}else{
    print_r($db->errorInfo());
}



// header("Location: index.php");