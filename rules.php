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
    
    <section>
        <h3>Политика конфиденциальности</h3>
        <p>Мы высоко ценим конфиденциальность наших пользователей и стремимся защитить ваши персональные данные. Настоящая политика конфиденциальности описывает, какие данные мы собираем, как мы их используем и как мы защищаем их.</p>
        <h4>Сбор информации</h4>
        <p>Когда вы посещаете наш сайт, мы автоматически собираем определенную информацию о вашем устройстве, такую как IP-адрес, тип устройства, операционную систему, версию браузера и язык. Мы также можем собирать информацию о ваших действиях на нашем сайте, включая просмотренные страницы, время посещения и другие действия, совершенные на сайте.

        </p>
<h4>Использование информации</h4>
<p>Мы используем собранную информацию для улучшения нашего сайта и предоставления услуг, а также для анализа тенденций среди пользователей и управления сайтом. Мы также можем использовать информацию для связи с вами, если вы предоставили нам свои контактные данные.</p>
<h4>Защита информации</h4>
<p>Мы принимаем меры для защиты вашей информации от потери, неправильного использования и изменения. Однако ни одна передача данных через интернет или мобильную сеть не может быть полностью безопасной, поэтому мы не можем гарантировать абсолютную безопасность ваших данных.

</p>
<h4>Изменение политики конфиденциальности</h4>
<p>Мы оставляем за собой право изменять настоящую политику конфиденциальности в любое время. Изменения в политике конфиденциальности будут опубликованы на этой странице.</p>
<h4>Условия использования</h4>
<p>Используя наш сайт, вы соглашаетесь с условиями использования, изложенными ниже. Если вы не согласны с этими условиями, пожалуйста, не используйте этот сайт.

</p>
<h4>Авторские права</h4>
<p>Содержание этого сайта, включая тексты, изображения, логотипы и дизайн, защищено авторским правом. Все права принадлежат владельцам сайта. Воспроизведение, копирование, распространение или использование любого контента без письменного разрешения владельцев сайта запрещено.

</p>
<h4>Отказ от ответственности</h4>
<p>Мы делаем все возможное, чтобы обеспечить точность и актуальность информации на нашем сайте. Однако мы не даем никаких гарантий относительно полноты, точности и надежности представленной информации. Мы не несем ответственности за любые убытки или ущерб, возникшие в результате использования информации на нашем сайте.</p>
<h4>Изменение условий использования</h4>
<p>Мы оставляем за собой право изменять эти условия использования в любое время. Изменения в условиях использования будут опубликованы на этой странице. Продолжение использования сайта после публикации изменений означает ваше согласие с ними.






</p>



    </section>

    <footer>
      ©Манхва.ру
    </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>