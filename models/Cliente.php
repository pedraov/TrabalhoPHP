<?php
class Cliente {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function adicionarCliente($nome, $email, $senha) {
        $senhaHash = password_hash($senha, PASSWORD_BCRYPT);
        $stmt = $this->pdo->prepare('INSERT INTO clientes (nome, email, senha) VALUES (?, ?, ?)');
        return $stmt->execute([$nome, $email, $senhaHash]);
    }

    public function verificarEmail($email) {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM clientes WHERE email = ?');
        $stmt->execute([$email]);
        return $stmt->fetchColumn();
    }

    public function buscarPorEmail($email) {
        $stmt = $this->pdo->prepare('SELECT * FROM clientes WHERE email = ?');
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
