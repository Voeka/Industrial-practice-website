<?php 

require('db.php');

$id = $_POST['id'];
$status = $_POST['status'];

$query = $db->query("UPDATE orders set status='$status' where id='$id'");
if($query){
    echo('<script>alert("Вы изменили статус!"); location.href = "admin.php"</script>');
}else{
    print_r($db->error_get_last());
}