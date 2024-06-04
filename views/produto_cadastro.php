<?php
//Inclusão da página com o servidor MySQL
    include_once '../config/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h2>Cadastro de Produto</h2>
<form action="index.php?page=produto_cadastro" method="post">
    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome"><br><br>
    <label for="preco">Preço:</label><br>
    <input type="number" id="preco" name="preco"><br><br>
    <label for="descricao">Descrição:</label><br>
    <textarea id="descricao" name="descricao"></textarea><br><br>
    <input type="submit" value="Cadastrar">
</form>
</body>
</html>
