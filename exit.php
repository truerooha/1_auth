<?php
    setcookie('user', $user['name'], time() - 3600, "/1_auth");
    header('Location: /1_auth/index.html'); 
?>