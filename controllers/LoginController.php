<?php
require_once 'models/Cliente.php';

class LoginController {
    private $model;

    public function __construct() {
        require_once 'config/database.php';
        $this->model = new Cliente($pdo);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            session_start();
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $cliente = $this->model->buscarPorEmail($email);
            if ($cliente && password_verify($senha, $cliente['senha'])) {
                $_SESSION['user_email'] = $email;
                setcookie("user_email", $email, time() + 86400, "/");
                header('Location: index.php?page=clientes');
            } else {
                echo "Email ou senha incorretos.";
            }
        } else {
            require 'views/login.php';
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        setcookie("user_email", "", time() - 3600, "/");
        header('Location: index.php?page=login');
    }
}
?>
