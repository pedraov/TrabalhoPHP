<?php
include('verificarLogin.php');
include_once 'server.php';

// Função para listar produtos
function listarProdutos($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM produtos");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Função para adicionar produto
if (isset($_POST['adicionar'])) {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $stmt = $pdo->prepare("INSERT INTO produtos (nome, preco, descricao) VALUES (:nome, :preco, :descricao)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->execute();
    header('Location: clientes.php');
}

// Função para excluir produto
if (isset($_GET['excluir'])) {
    $id = $_GET['excluir'];
    $stmt = $pdo->prepare("DELETE FROM produtos WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header('Location: clientes.php');
}

// Função para editar produto
if (isset($_POST['editar'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $stmt = $pdo->prepare("UPDATE produtos SET nome = :nome, preco = :preco, descricao = :descricao WHERE id = :id");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header('Location: clientes.php');
}

$produtos = listarProdutos($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Produtos</title>
</head>
<body>
    <h1>Gerenciamento de Produtos</h1>
    
    <!-- Formulário para adicionar produto -->
    <h2>Adicionar Produto</h2>
    <form action="clientes.php" method="post">
        <input type="hidden" name="adicionar" value="1">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="preco">Preço:</label><br>
        <input type="number" step="0.01" id="preco" name="preco" required><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao" required></textarea><br><br>

        <input type="submit" value="Adicionar">
    </form>
    <br>

    <!-- Tabela de produtos -->
    <h2>Lista de Produtos</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><?php echo $produto['id']; ?></td>
                <td><?php echo $produto['nome']; ?></td>
                <td><?php echo $produto['preco']; ?></td>
                <td><?php echo $produto['descricao']; ?></td>
                <td>
                    <a href="clientes.php?editar=<?php echo $produto['id']; ?>">Editar</a>
                    <a href="clientes.php?excluir=<?php echo $produto['id']; ?>">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Formulário para editar produto -->
    <?php
    if (isset($_GET['editar'])) {
        $id = $_GET['editar'];
        $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <h2>Editar Produto</h2>
    <form action="clientes.php" method="post">
        <input type="hidden" name="editar" value="1">
        <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" value="<?php echo $produto['nome']; ?>" required><br><br>

        <label for="preco">Preço:</label><br>
        <input type="number" step="0.01" id="preco" name="preco" value="<?php echo $produto['preco']; ?>" required><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao" required><?php echo $produto['descricao']; ?></textarea><br><br>

        <input type="submit" value="Atualizar">
    </form>
    <?php
    }
    ?>
    <br>
    <a href="logout.php">Sair</a>
</body>
</html>
