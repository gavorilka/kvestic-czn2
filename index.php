<?php
    session_start();
    require "core/auth.php";
    $uri = $_SERVER["REQUEST_URI"];
    // var_dump($uri);
    preg_match_all("/((?<=\?)|(?<=\/)|(?<=\&))\w+/",$uri,$uriParam);
    $uriParam = $uriParam[0];
    $uri = $uriParam[0];
    // var_dump($uriParam);
    //var_dump($_SESSION);
    
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Домашняя</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header class="page-header">
        <img src="img/logo.svg" alt="Kvestik" height="30">
        <nav class="page-nav">
            <ul>
                <li><a href="/">Домашняя</a></li>
                <?php if(isset($_SESSION['user'])) { ?>
                <li><a href="user">Профиль</a></li>
                <li><a href="add">Профиль</a></li>
                <?php } ?>
            </ul>
        </nav>
        <form name="authorization" class="header__form" method="POST">
            <?php if(!isset($_SESSION['user'])) { ?>
            <input class="form-input" placeholder="логин" name="login" type="email">
            <input class="form-input" placeholder="пароль" name="password" type="password">
            <button class="form-button primary" name="comeIn">Войти</button>
            <button class="form-button" name="register">Присоединиться</button>
            <?php } else { ?>
            <button class="form-button" name="logout">Выйти</button>
            <?php } ?>
        </form>
    </header>
    <main class="main">
        <?php 
            if($uri=='' || $uri =="index") {
                include "pages/index.php";
            } else if ($uri == "single") {
                include "pages/single.php";
            } else if (isset($_SESSION['user'])){
                switch($uri) {
                    // case '':
                    //     include "pages/index.php";
                    //     break;
                    // case 'index':
                    //     include "pages/index.php";
                    //     break;
                    case 'user':
                        include "pages/user.php";
                        break;
                    // case 'single':
                    //     include "pages/single.php";
                    //     break;
                    case 'add':
                        include "pages/add.php";
                        break;
                    case 'update':
                        include "pages/add.php";
                        break;
                    default:
                        echo "нет страницы";
        
                }
            } else {
                echo "страницы не доступны";
            }
            
        ?>
    </main>
    <aside class="attention" <?php if(isset( $_SESSION["error"])) echo 'style="visibility: visible;"';?>>
        <p><?php if(isset( $_SESSION["error"])) echo $_SESSION["error"];?></p>
    </aside>
</body>
</html>