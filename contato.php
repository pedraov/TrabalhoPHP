<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Celulares - Contato</title>
    <link rel="stylesheet" href="styless.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="sobre.php">Sobre</a></li>
                <li><a href="contato.php">Contato</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Contato</h1>
            <form action="enviar.php" method="post">
                <p>
                <input placeholder="Enter text here" class="input-style" type="text">
                </p>
                        
                <p>
                <input placeholder="Enter text here" class="input-style" type="text">
                </p>
                        
                <p>
                <input placeholder="Enter text here" class="input-style" type="text">
                </p>

                <button> Enviar Mensagem</button>
            </form>
    </main>

    <footer>
        <p>&copy; 2024 Loja de Celulares. Todos os direitos reservados.</p>
    </footer>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $mensagem = htmlspecialchars($_POST['mensagem']);
    
    echo "Obrigado pelo seu contato, $nome. Responderemos em breve.";
}
?>
