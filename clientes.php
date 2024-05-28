<?php
include('verificarLogin.php');
include_once 'server.php';

$error_message = '';

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
    
    // Verifica se os campos estão preenchidos
    if (empty($nome) || empty($preco) || empty($descricao)) {
        $error_message = "Todos os campos são obrigatórios.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO produtos (nome, preco, descricao) VALUES (:nome, :preco, :descricao)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->execute();
        header('Location: clientes.php');
    }
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
    
    // Verifica se os campos estão preenchidos
    if (empty($nome) || empty($preco) || empty($descricao)) {
        $error_message = "Todos os campos são obrigatórios.";
    } else {
        $stmt = $pdo->prepare("UPDATE produtos SET nome = :nome, preco = :preco, descricao = :descricao WHERE id = :id");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        header('Location: clientes.php');
    }
}

$produtos = listarProdutos($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Produtos</title>
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
    <h1>Gerenciamento de Produtos</h1>
    
    <div class="content">
        <div class="form-container">
    <!-- Formulário para adicionar produto -->
    <h2>Adicionar Produto</h2>
    <form action="clientes.php" method="post">
        <input type="hidden" name="adicionar" value="1">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome"><br><br>

        <label for="preco">Preço:</label><br>
        <input type="number" step="0.01" id="preco" name="preco"><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao"></textarea><br><br>

        <?php if (!empty($error_message)): ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <input type="submit" value="Adicionar" class="button">
    </form>
</div>

    <!-- Tabela de produtos -->
    <div class="table-container">
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
                    <a href="clientes.php?editar=<?php echo $produto['id']; ?>" class="button">Editar</a>
                    <a href="clientes.php?excluir=<?php echo $produto['id']; ?>" class="button">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    </div>

    <!-- Formulário para editar produto -->
    <?php
    if (isset($_GET['editar'])) {
        $id = $_GET['editar'];
        $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="edit-form">
    <h2>Editar Produto</h2>
    <form action="clientes.php" method="post">
        <input type="hidden" name="editar" value="1">
        <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" value="<?php echo $produto['nome']; ?>"><br><br>

        <label for="preco">Preço:</label><br>
        <input type="number" step="0.01" id="preco" name="preco" value="<?php echo $produto['preco']; ?>"><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao"><?php echo $produto['descricao']; ?></textarea><br><br>

        <?php if (!empty($error_message)): ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <input type="submit" value="Atualizar" class="button">
    </form>
    </div>
    <?php
    }
    ?>
    <br>
    <a href="logout.php" class="button">Sair</a>
    <main>
    <footer>
        <p>&copy; 2024 Loja de Celulares. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
