<?php
    session_start();
    session_destroy();

    //Limpar cookie
    setcookie("user_email", "", time() - 3600, "/");

    header('Location:login.php');
?>