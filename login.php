<?php
require('db.php');
// print_r($_SESSION);
// $_SESSION['user']=0;
if(isset($_GET['logout'])){
  unset($_SESSION['user']);
  echo('<script>alert("Вы успешно вышли!"); location.href = "index.php"</script>');
}


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
       
    
    <section class="reg">
        <form action="action_login.php" method="get">
            <label>Почта</label> <br>
            <input type="email" name="email" placeholder="email" required id=""> <br>
            <label>Пароль</label> <br>
            <input type="password" name="password" placeholder="Пароль" minlength="4" required id=""> <br>
          <br>
            <input type="submit" value="Войти">
        </form>
    </section>

    <footer>
      ©Манхва.ру
    </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>