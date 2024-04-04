<?php
require('db.php');
// print_r($_SESSION);
// $_SESSION['user']=0;
$items = $db->query("SELECT * from items limit 7")->fetchAll();

if(isset($_GET['logout'])){
  unset($_SESSION['user']);
  echo('<script>alert("Вы успешно вышли!"); location.href = "index.php"</script>');
}

if(empty($_SESSION['list'])){
  $_SESSION['list']=array();
}

// unset($_SESSION['list']);

if(isset($_POST['gotocard'])){
  $key = $_POST['key'];
  array_push($_SESSION['list'], $items[$key]);
  echo('<script>alert("Вы добавили в корзину!");</script>');
}

// print_r($items);
?>
<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Манхвы из Кореи</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg bg-body-tertiary navi">
        <div class="container-fluid">
          <a class="navbar-brand h1" href="index.php">Манхва.ру</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Главная</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="catalog.php">Каталог</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="aboutUs.php">О нас</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Информация
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="bloge.php">Блог/новости</a></li>
                  <li><a class="dropdown-item" href="contact.php">Контакты</a></li>
                  <li><a class="dropdown-item" href="rules.php">Политика конфиденциальности и условия использования</a></li>
                </ul>
              </li>
            </ul>
            
              
              <form method="get" action='search.php' class="d-flex" role="search">
                <input class="form-control me-2" name='search' type="search" placeholder="Поиск" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Поиск</button>
              </form>
            
            <a href="cart.php" class="btn btn-outline-success">Корзина</a>
            <!-- Кнопка авторизации -->
            <!-- php елси логинет, то личный кабинет или выйти -->
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Авторизация
              </button>
              <ul class="dropdown-menu">

              <?php if(empty($_SESSION['user'])){ ?>

              
                <li><a class="dropdown-item" href="login.php">Войти</a></li>
                <li><a class="dropdown-item" href="reg.php">Зарегистрироватся</a></li>
               <?php }else{ ?>
                <li><a class="dropdown-item" href="user.php">Личный кабинет</a></li>
                <li><a class="dropdown-item" href="?logout">Выйти</a></li>
               
                <?php }?>
                </ul>
            </div>


          </div>
        </div>
      </nav>
    </header>
    
    <section class="last_items">
      <!-- Тут у нас последний завоз товаров. 5 объектов из бд. -->
      <h2>Последний завоз манхвы</h2>
      <div class="book-x">
        <?php foreach($items as $key=>$item){?>
          
        <a href="item.php?id=<?php print_r($item['id']); ?>">
          <div class="card" style="width: 18rem;">
            <img src="<?php print_r($item['img']); ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php print_r($item['name']); ?></h5>
              <p class="card-text"><?php print_r($item['des']); ?></p>
              <form method="post">  
                <!-- В action добавить ссылку на код выполнения -->
                <input type="hidden" name="gotocard" value='1'>
                <input type="hidden" name="key" value="<?php print_r($key); ?>">
                <input type="submit" value="В корзину">
              </form>
              <!-- Кнопка добавить в корзину -->
            </div>
          </div>
        </a>
      <?php 
    
    }?>

        


      </div>
    </section>

    <!-- <section class="recommendation">
      <h2>Мы рекомендуем(Не реализовано)</h2>
      <div class="book-x">

        <a href="">
          <div class="card" style="width: 18rem;">
            <img src="https://ir.ozone.ru/s3/multimedia-6/c1000/6769855950.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Поднятие уровня в одиночку</h5>
              <p class="card-text">Сон Джину мечтает поднять свой уровень, чтобы бороться с сильными противниками, но, к сожалению, его способности слишком слабые, чтобы добиться желанной цели.</p>
              <form action="" method="post">   -->

                <!-- В action добавить ссылку на код выполнения -->
                <!-- <input type="hidden" name="id-item" value="1">-->
                <!-- <input type="submit" value="В корзину">-->
              <!-- </form> -->
              <!-- Кнопка добавить в корзину -->
            
            
              <!-- </div>
          </div>
        </a>


        


      </div>
    </section> -->

    <footer>
      ©Манхва.ру
    </footer>
<!-- Дальше по секциям: +рекомендуемое, по жанрам, последние отзывы о товаре -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>