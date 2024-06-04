<?php
// Ativa a exibição de erros
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../controllers/ContatoController.php'; // Ajuste o caminho conforme necessário

$controller = new ContatoController();
$controller->enviarMensagem();
?>
