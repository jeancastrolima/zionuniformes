<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';

header('Content-Type: application/json; charset=utf-8');

// ✔️ Garante POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'status' => 'error',
        'message' => 'Método inválido'
    ]);
    exit;
}

// 🔎 Coleta e validação (ANTES de sanitizar)
$nome      = trim($_POST['name'] ?? '');
$emailRaw = trim($_POST['email'] ?? '');
$telefone  = trim($_POST['phone'] ?? '');
$servico   = trim($_POST['project'] ?? '');
$assunto   = trim($_POST['subject'] ?? '');
$mensagem  = trim($_POST['message'] ?? '');

$email = filter_var($emailRaw, FILTER_VALIDATE_EMAIL);

if ($nome === '' || !$email || $mensagem === '') {
    echo json_encode([
        'status' => 'error',
        'message' => 'Preencha corretamente nome, e-mail e mensagem.'
    ]);
    exit;
}

// 🔐 Sanitização (apenas para saída HTML)
$nome     = htmlspecialchars($nome, ENT_QUOTES, 'UTF-8');
$email    = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
$telefone = htmlspecialchars($telefone, ENT_QUOTES, 'UTF-8');
$servico  = htmlspecialchars($servico, ENT_QUOTES, 'UTF-8');
$assunto  = htmlspecialchars($assunto ?: 'Contato pelo site', ENT_QUOTES, 'UTF-8');
$mensagem = nl2br(htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8'));

$mail = new PHPMailer(true);

try {
    // 🔧 SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'jeanmouralima2015@gmail.com';
    $mail->Password   = 'nxtn wfnw nwmc xtih'; // ⬅️ coloque a senha real
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
    $mail->CharSet    = 'UTF-8';

    // 🔐 Remetente
    $mail->setFrom('jeanmouralima2015@gmail.com', 'ConectaTI Solutions');
    $mail->addReplyTo($email, $nome);

    // 📩 Destino
    $mail->addAddress('ti@unax.com.br');

    // 📄 Conteúdo
    $mail->isHTML(true);
    $mail->Subject = '📩 Novo contato pelo site - ConectaTI Solutions';

    $mail->Body = "
        <h2>Novo contato recebido</h2>
        <p><strong>Nome:</strong> {$nome}</p>
        <p><strong>E-mail:</strong> {$email}</p>
        <p><strong>Telefone:</strong> {$telefone}</p>
        <p><strong>Serviço de interesse:</strong> {$servico}</p>
        <p><strong>Assunto:</strong> {$assunto}</p>
        <hr>
        <p>{$mensagem}</p>
    ";

    $mail->send();

    echo json_encode([
        'status' => 'success',
        'message' => 'Mensagem enviada com sucesso! Em breve entraremos em contato.'
    ]);

} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Erro ao enviar mensagem. Tente novamente mais tarde.',
        'debug' => $mail->ErrorInfo
    ]);
}
