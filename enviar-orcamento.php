<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta dos dados
    $nome = strip_tags(trim($_POST["nome"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $telefone = strip_tags(trim($_POST["telefone"]));
    $servico = strip_tags(trim($_POST["servico"]));
    $assunto_msg = strip_tags(trim($_POST["assunto"]));
    $mensagem = strip_tags(trim($_POST["mensagem"]));

    // Configuração do E-mail
    $para = "contato@conectatisolutions.com.br";
    $assunto_email = "Novo Orçamento: $servico - $nome";
    
    $corpo = "Nome: $nome\n";
    $corpo .= "Email: $email\n";
    $corpo .= "Telefone: $telefone\n";
    $corpo .= "Serviço: $servico\n";
    $corpo .= "Assunto: $assunto_msg\n\n";
    $corpo .= "Mensagem:\n$mensagem";

    $headers = "From: $email";

    // Envio
    if (mail($para, $assunto_email, $corpo, $headers)) {
        // Redireciona para uma página de sucesso ou volta com aviso
        echo "<script>alert('Solicitação enviada com sucesso! Entraremos em contato em breve.'); window.location.href='index.php';</script>";
    } else {
        echo "Ocorreu um erro ao enviar. Tente novamente ou use o WhatsApp (22) 98121-7821.";
    }
}
?>