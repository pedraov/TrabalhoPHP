<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Celulares - Home</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
<header class ="header">
    <a href="#" class = "logo">iHomeCwb</a>

    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="Sobre.php">Sobre</a>
        <a href="Contato.php">Contato</a>
        <a href="Login.php">Login</a>
    </nav>
</header>

    <main>
        <h1>Bem-vindo à nossa Loja de Celulares</h1>
        <p>Confira nossas ofertas incríveis de smartphones.</p>
        <div class="produtos">
            <div class="produto">
                <h2>Celular 1</h2>
                <p><img src="imagens/1.jpg" alt="Celular 1"></p>
                <p>Descrição do Celular 1.</p>
                <button onclick="comprar()">Comprar</button>
            </div>
            <div class="produto">
                <h2>Celular 2</h2>
                <p><img src="imagens/2.jpg" alt="Celular 2"></p>
                <p>Descrição do Celular 2.</p>
                <button onclick="comprar()">Comprar</button>
            </div>
            <div class="produto">
                <h2>Celular 3</h2>
                <p><img src="imagens/3.jpg" alt="Celular 3"></p>
                <p>Descrição do Celular 3.</p>
                <button onclick="comprar()">Comprar</button>
            </div>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Loja de Celulares. Todos os direitos reservados.</p>
    </footer>
