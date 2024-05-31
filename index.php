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
        <h1 style="margin-top: 15px">Bem-vindo à nossa Loja de Celulares</h1>
        <p style="margin-bottom: 10px>Confira nossas ofertas incríveis de smartphones.</p>
        <div class="produtos">
            <div class="produto">
                <h2>Iphone 15</h2>
                <p><img src="imagens/iphone15AZUL.jpeg" alt="Iphone 15 azul claro"></p>
                <p> 128GB | Azul Claro</p>
                <button onclick="comprar()">Comprar</button>
            </div>
            <div class="produto">
                <h2>Iphone 14 PRO</h2>
                <p><img src="imagens/iphone14proROXO.jpeg" alt="Iphone 14 Pro roxo"></p>
                <p> 128GB | Roxo Midnight</p>
                <button onclick="comprar()">Comprar</button>
            </div>
            <div class="produto">
                <h2>Iphone 13</h2>
                <p><img src="imagens/iphone13RED.jpeg" alt="Iphone 13 vermelho"></p>
                <p> 256GB | Vermelho</p>
                <button onclick="comprar()">Comprar</button>
            </div>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Loja de Celulares. Todos os direitos reservados.</p>
    </footer>
