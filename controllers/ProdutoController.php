<?php
require_once 'models/Produto.php';

class ProdutoController {
    private $model;

    public function __construct() {
        require_once 'config/database.php';
        $this->model = new Produto($pdo);
    }

    public function index() {
        $produtos = $this->model->listarProdutos();
        require 'views/clientes.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome'];
            $preco = $_POST['preco'];
            $descricao = $_POST['descricao'];

            if ($this->model->adicionarProduto($nome, $preco, $descricao)) {
                header('Location: index.php?page=clientes');
            } else {
                echo "Erro ao adicionar produto.";
            }
        } else {
            require 'views/produto_cadastro.php';
        }
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome'];
            $preco = $_POST['preco'];
            $descricao = $_POST['descricao'];

            if ($this->model->atualizarProduto($id, $nome, $preco, $descricao)) {
                header('Location: index.php?page=clientes');
            } else {
                echo "Erro ao atualizar produto.";
            }
        } else {
            $produto = $this->model->buscarProdutoPorId($id);
            require 'views/produto_editar.php';
        }
    }

    public function delete($id) {
        if ($this->model->deletarProduto($id)) {
            header('Location: index.php?page=clientes');
        } else {
            echo "Erro ao deletar produto.";
        }
    }

    // Em ProdutoController.php ou no controlador relevante
    public function listarProdutos() {
        $produtos = $this->model->buscarTodosProdutos();  // Chama a função do modelo
        require 'views/clientes.php';  // Carrega a view e passa os produtos
}

}
?>
