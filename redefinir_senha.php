<?php
// Inclusão da página com o servidor MySQL
include_once 'server.php';

if (isset($_GET['email']) && isset($_POST['senha'])) {
    $email = $_GET['email'];
    $nova_senha = $_POST['senha'];

    // Atualizar a senha do usuário
    $nova_senha_hashed = password_hash($nova_senha, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("UPDATE clientes SET senha = :senha WHERE email = :email");
    $stmt->bindParam(':senha', $nova_senha_hashed);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    echo "Sua senha foi redefinida com sucesso. <a href='login.php'>Clique aqui para fazer login</a>";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha</title>
</head>
<body>
<h2>Redefinir Senha</h2>
    <form action="redefinir_senha.php?email=<?php echo urlencode($_GET['email']); ?>" method="post">
        <label for="senha">Nova Senha:</label><br>
        <input type="password" id="senha" name="senha"><br><br>
        <input type="submit" value="Redefinir Senha">
    </form>
</body>
</html>
