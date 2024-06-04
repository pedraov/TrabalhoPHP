<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuario</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h2>Cadastro de Usuario</h2>
<form action="index.php?page=cadastro" method="post">
    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome" required><br><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>
    <label for="senha">Senha:</label><br>
    <input type="password" id="senha" name="senha" required minlength="6"><br><br>
    <input type="submit" value="Cadastrar">
</form>
</body>
</html>
