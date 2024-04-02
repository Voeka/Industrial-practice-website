<?php


require('db.php');

$tel = $_POST['tel'];
$way = $_POST['way-user'];
$sum = $_POST['sum'];
if(!empty($_SESSION['user'])){
    $user = $_SESSION['user']['id'];
}else{
    echo("<script>alert('Вы не авторизованны! Войтите в систему!');location.href='login.php'</script>");
}
// print_r($user);

$json = json_encode($_SESSION['list']);

$query = $db->query("INSERT INTO `orders` (`id`, `id_user`, `tel`, `list`, `sum`, `way`, `status`) VALUES 
                                            (NULL, '$user', '$tel', '$json', '$sum', '$way', 'В обработке');");
if($query){
    unset($_SESSION['list']);
    echo('<script>alert("Заказ создан! Переводи на главную страницу!"); location.href="./"</script>');
}else{
    print_r($db->error_get_last());
}