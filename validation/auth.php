<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
   
    $pass = md5($pass."fdsfsf5"); // функция хэширования. через точку указывается соль

    $mysql = new mysqli('localhost', 'root', 'root', 'auth');

    $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");

    $user = $result->fetch_assoc(); //конвертируем результат в массив
    if(count($user) == 0) {
        echo "Такой пользователь не найден";
        $mysql->close();
        exit();
    }

    setcookie('user', $user['name'], time() + 3600, "/"); //Устанавливаем куки, параметры имя, значение, время жизни. TODO проверить, надо ли более полный путь прописывать. Кажетсяч, это на весь сервер

    $mysql->close();

    header('Location: /1_auth/index.html'); 

?>