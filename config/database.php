<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '@Oliveira32');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    echo "ERRO: " . $erro->getMessage();
}
?>
