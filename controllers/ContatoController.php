<?php
class ContatoController {
    public function enviarMensagem() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = htmlspecialchars($_POST['nome']);
            $email = htmlspecialchars($_POST['email']);
            $mensagem = htmlspecialchars($_POST['mensagem']);

            echo "Obrigado pelo seu contato, $nome. Responderemos em breve.";
        } else {
            require 'views/contato.php';
        }
    }
}
?>
