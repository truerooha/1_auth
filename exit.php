<?php
    setcookie('user', $user['name'], time() - 3600, "/");
    header('Location: /1_auth/index.html'); 
?>