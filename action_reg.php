<?php

require('db.php');



$email = $_POST['email'];
$password = hash('sha256',$_POST['password']);

print_r($password);

$query = $db->query("INSERT into `user`
(`id`,`email`,`password`,`tel`) values
(null,'$email','$password','')
");
if($query){
    header("Location: login.php");
    exit;
}
else{
    print_r($db->errorInfo());
}