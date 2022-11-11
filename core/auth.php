<?php
    require "conect.php";

    if(isset($_POST['login']) && isset($_POST["password"])) {
        if(empty($_POST["password"])){
            $_SESSION["error"] = "пароль пуст";
        } else if(empty($_POST['login'])){

        } else {
            $login = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars($_POST['password']);
            // регистрация
            if(isset($_POST['register'])){

                $createUser = $con->prepare('INSERT INTO `users`(`login`, `password_hash`) VALUES (:login,:hash)');
                $createUser->execute([':login' => $login, ':hash' => password_hash($password, PASSWORD_BCRYPT)]);
                autoUser($con, $login, $password);

            }
            // Вход
            if(isset($_POST['comeIn'])){
                autoUser($con, $login, $password);
            }
        }
    }
    if(isset($_POST['logout'])) {
        unset($_SESSION['user']);
    }

    function autoUser($con, $login, $password) {
        $user = $con->prepare('SELECT * FROM `users` WHERE `login` = :login');
        $user->execute([':login' => $login]);
        $user = $user->fetch(PDO::FETCH_OBJ);
        if(!$user) {
            $_SESSION["error"] = "gjkmpjdfnt";
        }
        if (password_verify( $password, $user->password_hash)) {
            $_SESSION['user'] = $user;
            unset($_SESSION["error"]);
            unset($_POST['login']);
            unset($_POST["password"]);
        } else {
            $_SESSION["error"] = "пароль не верен";
        }
    }