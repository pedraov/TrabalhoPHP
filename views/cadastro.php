<?php
//Inclusão da página com o servidor MySQL
    include_once '../config/database.php'; 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
</head>
<body>
<h2>Cadastro de Cliente</h2>
    <form action="cadastro.php" method="post">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome"><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha"><br><br>

        <input type="submit" value="Cadastrar">
    </form>
    <br>

<?php

if(isset($_POST['nome'], $_POST['email'], $_POST['senha'])){
    session_start();
    try {
        // Dados do formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
    
        // Verificar se o email já está cadastrado
        $cadastro = $pdo->prepare("SELECT COUNT(*) FROM clientes WHERE email = :email");
        $cadastro->bindParam(':email', $email);
        $cadastro->execute();

    if ($cadastro->fetchColumn() > 0) {
        echo "Email já cadastrado.";
    } else {
        // Preparar a declaração SQL para inserção
        $cadastro = $pdo->prepare("INSERT INTO clientes (nome, email, senha) VALUES (:nome, :email, :senha)");
        $cadastro->bindParam(':nome', $nome);
        $cadastro->bindParam(':email', $email);
        $cadastro->bindParam(':senha', $senha);

        // Executar a declaração
        $cadastro->execute();
        // Definir cookie para o email do usuário
        setcookie("user_email", $email, time() + (86400), "/"); // 86400 = 1 dia
        sleep(5);
        header ('Location: login.php');
    }
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
} else {
    echo "Por favor, preencha todos os dados.";
}

    $pdo = null;
?>
</body>
</html>