<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'status' => 'error',
        'message' => 'Método inválido.'
    ]);
    exit;
}

/* ===============================
   📥 CAPTURA DOS DADOS
================================ */

$dados = [
    'name'       => trim($_POST['name'] ?? ''),
    'email_raw' => trim($_POST['email'] ?? ''),
    'phone'     => trim($_POST['phone'] ?? ''),
    'position'  => trim($_POST['position'] ?? ''),
    'company'   => trim($_POST['company'] ?? ''),
    'cnpj'      => trim($_POST['cnpj'] ?? ''),
    'employees' => trim($_POST['employees'] ?? ''),
    'city'      => trim($_POST['city'] ?? ''),
    'segment'   => trim($_POST['segment'] ?? ''),
    'service'   => trim($_POST['service'] ?? ''),
    'urgency'   => trim($_POST['urgency'] ?? ''),
    'budget'    => trim($_POST['budget'] ?? ''),
    'message'   => trim($_POST['message'] ?? '')
];

$email = filter_var($dados['email_raw'], FILTER_VALIDATE_EMAIL);

/* ===============================
   ✅ VALIDAÇÕES
================================ */

if (
    $dados['name'] === '' ||
    !$email ||
    $dados['service'] === '' ||
    $dados['message'] === ''
) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Preencha todos os campos obrigatórios.'
    ]);
    exit;
}

/* ===============================
   🔐 SANITIZAÇÃO
================================ */

foreach ($dados as $key => $value) {
    $dados[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$dados['message'] = nl2br($dados['message']);

/* ===============================
   ✉️ ENVIO DE E-MAIL
================================ */

$mail = new PHPMailer(true);

try {
    // SMTP (GMAIL)
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'jeanmouralima2015@gmail.com';
    $mail->Password   = 'nxtn wfnw nwmc xtih';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
    $mail->CharSet    = 'UTF-8';

    // Remetente
    $mail->setFrom('jeanmouralima2015@gmail.com', 'ConectaTI Solutions');
    $mail->addReplyTo($email, $dados['name']);

    // Destinatário
    $mail->addAddress('ti@unax.com.br');

    // Conteúdo
    $mail->isHTML(true);
    $mail->Subject = '💼 Nova Solicitação de Cotação - ConectaTI Solutions';

    $mail->Body = "
        <h2>📄 Nova Solicitação de Cotação</h2>

        <h3>👤 Dados do Solicitante</h3>
        <p><strong>Nome:</strong> {$dados['name']}</p>
        <p><strong>E-mail:</strong> {$email}</p>
        <p><strong>Telefone:</strong> {$dados['phone']}</p>
        <p><strong>Cargo:</strong> {$dados['position']}</p>

        <hr>

        <h3>🏢 Dados da Empresa</h3>
        <p><strong>Empresa:</strong> {$dados['company']}</p>
        <p><strong>CNPJ:</strong> {$dados['cnpj']}</p>
        <p><strong>Nº de Colaboradores:</strong> {$dados['employees']}</p>
        <p><strong>Cidade/Estado:</strong> {$dados['city']}</p>
        <p><strong>Segmento:</strong> {$dados['segment']}</p>

        <hr>

        <h3>🛠️ Detalhes da Cotação</h3>
        <p><strong>Serviço:</strong> {$dados['service']}</p>
        <p><strong>Urgência:</strong> {$dados['urgency']}</p>
        <p><strong>Orçamento estimado:</strong> {$dados['budget']}</p>

        <hr>

        <h3>📝 Descrição da Necessidade</h3>
        <p>{$dados['message']}</p>
    ";

    $mail->send();

    echo json_encode([
        'status' => 'success',
        'message' => 'Solicitação enviada com sucesso! Nossa equipe entrará em contato em breve.'
    ]);

} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Erro ao enviar a solicitação.',
        'debug' => $mail->ErrorInfo
    ]);
}
