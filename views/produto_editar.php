<?php
//Inclusão da página com o servidor MySQL
    include_once '../config/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h2>Editar Produto</h2>
<form action="index.php?page=produto_editar&id=<?php echo $produto['id']; ?>" method="post">
    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome" value="<?php echo $produto['nome']; ?>"><br><br>
    <label for="preco">Preço:</label><br>
    <input type="number" id="preco" name="preco" value="<?php echo $produto['preco']; ?>"><br><br>
    <label for="descricao">Descrição:</label><br>
    <textarea id="descricao" name="descricao"><?php echo $produto['descricao']; ?></textarea><br><br>
    <input type="submit" value="Atualizar">
</form>
</body>
</html>
