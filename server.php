<!-- Página para conexão ao servidor MySQL -->

<?php
try{
    $pdo = new PDO('mysql:host=localhost;dbname=ecommerce','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $erro){
    echo "ERRO =>"  . $erro->getMessage();
}
?>