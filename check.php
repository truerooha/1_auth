<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING); //filter_var удаляет плохие символы, как я понял. trim отсекает пробелы
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

    if(mb_strlen($login) < 5 || mb_strlen($login) > 90) {
        echo "Недопустимая длина логина";
        exit();
    }

    if(mb_strlen($name) < 3 || mb_strlen($name) > 50) {
        echo "Недопустимая длина имени";
        exit();
    }

    if(mb_strlen($pass) < 5 || mb_strlen($pass) > 8) {
        echo "Пароль должен содержать от 2 до 8 символов";
        exit();
    }
    
    $mysql = new mysqli('localhost', 'root', 'root', 'auth');
    //TODO сначала бы конечно лучше проверить наличие такого логина
    $mysql->query("INSERT INTO `users` (`login`, `pass`, `name`)
    VALUES('$login', '$pass', '$name')");

    $mysql->close();
?>