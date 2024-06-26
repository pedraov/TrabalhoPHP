<?php
//Inclusão da página com o servidor MySQL
    include_once '../config/database.php';
?>
0
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class ="header">
    <a href="#" class = "logo">iHomeCwb</a>

    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="sobre.php">Sobre</a>
        <a href="contato.php">Contato</a>
        <a href="login.php">Login</a>
    </nav>
</header>
<h2 style="margin-top: 150px">Login Admin</h2>
    <form action="login.php" method="post" class="form">

      <div class="inputForm">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" class="input" placeholder="Digite seu email"><br><br>
      </div>

      <div class="inputForm">      
        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" class="input" placeholder="Digite sua senha"><br><br>
      </div>

        <input type="submit" value="Login" class="button-submit">
    </form>
    <br>
    <a href="recuperar_senha.php">Esqueci minha senha</a>
    <footer>
        <p>&copy; 2024 Loja de Celulares. Todos os direitos reservados.</p>
    </footer>

    <?php

if(isset($_POST['email'], $_POST['senha'])){
    session_start();
    try {
        // Dados do formulário
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
                // Inicio da sessão e armazenar informações do usuário
                $_SESSION['email'] = $row['email'];
                // Definir cookie para o email do usuário
                setcookie("user_email", $row['email'], time() + (86400), "/"); // 86400 = 1 dia
                sleep(5);
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

    if(isset($_GET['erro'])){
        $erro = '<br><div style="background-color: red; color: white; padding: 20px; margin: 10px; width: 200px;"=>É necessário ter uma conta para acessar o sistema.</div>';
    }
    echo $erro ?? '';
    
    // Fechar a conexão
    $pdo = null;

?>
<?php