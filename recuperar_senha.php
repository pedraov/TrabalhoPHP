<?php
// Inclusão da página com o servidor MySQL
include_once 'server.php';

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Verificar se o email existe no banco de dados
    $stmt = $pdo->prepare("SELECT * FROM clientes WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        header('Location: redefinir_senha.php?email=' . urlencode($email));
    } else {
        echo "Email não encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class ="header">
        <a href="#" class = "logo">iHomeCwb</a>

        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="Sobre.php">Sobre</a>
            <a href="Contato.php">Contato</a>
        </nav>
    </header>
    <main>
<h2>Recuperar Senha</h2>
    <form action="recuperar_senha.php" method="post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <input type="submit" value="Enviar">
    </form>
    <main>
    <footer>
        <p>&copy; 2024 Loja de Celulares. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
