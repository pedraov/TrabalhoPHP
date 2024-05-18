<?php
//Inclusão da página com o servidor MySQL
    include_once 'server.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<h2>Login de Cliente</h2>
    <form action="login.php" method="post">

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha"><br><br>

        <input type="submit" value="Login">
    </form>
    <br>

    <!-- Código php para login do usuário -->
    <?php
if(isset($_POST['email'], $_POST['senha'])){
    try {
        // Dados do formulário (supondo que os dados foram enviados via POST)
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        // Preparar a declaração SQL
        $login = $pdo->prepare("SELECT * FROM clientes WHERE email = :email");
        // Bind do parâmetro
        $login->bindParam(':email', $email);
        // Executar a declaração
        $login->execute();
        // Verificar se o usuário foi encontrado
        if ($login->rowCount() > 0) {
            // Buscar os dados do usuário
            $row = $login->fetch(PDO::FETCH_ASSOC);
            // Verificar a senha
            if (password_verify($senha, $row['senha'])) {
                echo "Login realizado com sucesso!";
                // Inicio da sessão e armazenar informações do usuário
                session_start();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_email'] = $row['email'];
                header ('Location: clientes.php');
            } else {
                echo "Senha incorreta.";
            }
        } else {
            echo "Email não encontrado.";
        }
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
} else {
    echo "Por favor, preencha todos os dados.";
}
    
    // Fechar a conexão
    $pdo = null;

?>
</body>
</html>