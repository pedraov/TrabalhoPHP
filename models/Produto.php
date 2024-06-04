<?php
class Produto {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function adicionarProduto($nome, $preco, $descricao) {
        $stmt = $this->pdo->prepare('INSERT INTO produtos (nome, preco, descricao) VALUES (?, ?, ?)');
        return $stmt->execute([$nome, $preco, $descricao]);
    }

    public function listarProdutos() {
        $stmt = $this->pdo->query('SELECT * FROM produtos');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizarProduto($id, $nome, $preco, $descricao) {
        $stmt = $this->pdo->prepare('UPDATE produtos SET nome = ?, preco = ?, descricao = ? WHERE id = ?');
        return $stmt->execute([$nome, $preco, $descricao, $id]);
    }

    public function deletarProduto($id) {
        $stmt = $this->pdo->prepare('DELETE FROM produtos WHERE id = ?');
        return $stmt->execute([$id]);
    }

    public function buscarProdutoPorId($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM produtos WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Em seu modelo de Produto (Produto.php)
    public function buscarTodosProdutos() {
        $stmt = $this->pdo->prepare('SELECT * FROM produtos');
        $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>
