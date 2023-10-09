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
    
    $pass = md5($pass."fdsfsf5"); // функция хэширования. через точку указывается соль

    $mysql = new mysqli('localhost', 'root', 'root', 'auth');
    $mysql->query("INSERT INTO `users` (`login`, `pass`, `name`)
    VALUES('$login', '$pass', '$name')");

    $mysql->close();

    header('Location: /1_auth/index.html'); //это пишем для перехода на страницу. Слэш означает переход на главную
?>