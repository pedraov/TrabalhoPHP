<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Celulares - Contato</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="contactBody">
    /*<header class ="header">
        <a href="#" class = "logo">iHomeCwb</a>

        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="Sobre.php">Sobre</a>
            <a href="Contato.php">Contato</a>
            <form action="enviar.php" method="post">

        </nav>
    </header>*/
    <main>
    <section class="contact">
        <h2>Nos contate!</h2>

        <form action="enviar.php" method = "post">
            <div class="input-box">
                <div class="input-field field">
                    <input type="text" placeholder="Seu nome" id="name" class="item" autocomplete= "off">
                </div>
                <div class="input-field field">
                    <input type="text" placeholder="Seu email" id="email" class="item" autocomplete= "off">
                </div>

                <div class="input-box">
                <div class="input-field field">
                    <input type="text" placeholder="Numero telefone" id="phone" class="item" autocomplete= "off">
                </div>
                <div class="input-field field">
                    <input type="text" placeholder="Assunto" id="assunto" class="item" autocomplete= "off">
                </div>
            </div>
            <div class="textarea-field field">
                <textarea name="" id="message" cols="" rows="" placeholder="Digite sua mensagem" class="item" autocomplete="off"> </textarea>
            </div>

            <button type="submit">Enviar</button>

        </form>

    </section>
    <main>
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
