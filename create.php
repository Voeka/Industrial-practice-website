<?php 

require('db.php');

$name = $_POST['name'];
$price = $_POST['price'];
$des = $_POST['des'];
$quanity = $_POST['quanity'];
$img = $_POST['img'];

$query = $db->query("INSERT into items (id, price, quanity, name, des, img) 
            values(null, '$price', '$quanity', '$name', '$des', '$img')");

if($query){
    echo("<script>alert('Товар создан!'); location.href='admin.php'</script>");
}else{
    print_r($db->error_get_last);
}