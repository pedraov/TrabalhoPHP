<?php

session_start();
    if(!isset($_SESSION['email']) && !isset($_COOKIE['user_email'])){
        header('Location: login.php?erro=true');
        exit;
    }
    // Se o cookie estiver presente, definir a sessão
    if (isset($_COOKIE['user_email'])) {
        $_SESSION['email'] = $_COOKIE['user_email'];
    }
?>