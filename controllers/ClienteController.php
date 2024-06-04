<?php
require_once 'models/Cliente.php';

class ClienteController {
    private $model;

    public function __construct() {
        require_once 'config/database.php';
        $this->model = new Cliente($pdo);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            if ($this->model->verificarEmail($email) > 0) {
                echo "Email já cadastrado.";
            } else {
                if ($this->model->adicionarCliente($nome, $email, $senha)) {
                    setcookie("user_email", $email, time() + 86400, "/");
                    header('Location: index.php?page=login');
                } else {
                    echo "Erro ao cadastrar cliente.";
                }
            }
        } else {
            require 'views/cadastro.php';
        }
    }

    // Adicionar no ClienteController ou criar um ProdutoController separado
    public function listarProdutos() {
        $produtos = $this->model->buscarTodosProdutos();  // Chama o método de buscar produtos
        require 'views/clientes.php';  // Passa os produtos para a view
    }

    
}
?>
