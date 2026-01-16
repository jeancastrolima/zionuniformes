<?php
session_start();

// BLOQUEIO: Só entra se existir a sessão 'admin_id'
if (!isset($_SESSION['admin_id'])) {
    header("Location: login-admin"); 
    exit();
}

// Configurações do Banco de Dados
$host = "199.193.117.162";
$db   = "rxuffavj_conectati";
$user = "rxuffavj";
$pass = "R4S68C0Id1ir29";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}

$mensagem = "";

// --- LÓGICA DE CADASTRO DE BOLETO (MANUAL CORA) ---
if (isset($_POST['cadastrar_boleto'])) {
    $cliente_id = $_POST['cliente_id'];
    $vencimento = $_POST['vencimento'];
    $descricao  = $_POST['descricao'];
    $valor      = $_POST['valor'];
    $status     = 'Pendente';
    $pix        = $_POST['pix_copia_cola']; // Você cola o 000201... aqui
    $url_pdf    = $_POST['url_pdf'];        // Você cola o link do boleto aqui

    $sql = "INSERT INTO boletos (cliente_id, vencimento, descricao, valor, status, pix_copia_cola, url_pdf) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    if($stmt->execute([$cliente_id, $vencimento, $descricao, $valor, $status, $pix, $url_pdf])) {
        $mensagem = "Cobrança financeira lançada com sucesso!";
    }
}

// --- LÓGICA DE CADASTRO DE CONTRATO ---
if (isset($_POST['cadastrar_contrato'])) {
    $stmt = $pdo->prepare("INSERT INTO contratos (cliente_id, titulo, vigencia, arquivo_url) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_POST['cliente_id'], $_POST['titulo'], $_POST['vigencia'], $_POST['arquivo_url']]);
    $mensagem = "Contrato registrado com sucesso!";
}

// --- BUSCA DE DADOS PARA AS LISTAS ---
$clientes = $pdo->query("SELECT id, nome_usuario, empresa_nome FROM clientes ORDER BY empresa_nome ASC")->fetchAll();
$chamados_gerais = $pdo->query("SELECT c.*, cl.empresa_nome FROM chamados c JOIN clientes cl ON c.cliente_id = cl.id ORDER BY c.data_abertura DESC")->fetchAll();
$contratos_gerais = $pdo->query("SELECT co.*, cl.empresa_nome FROM contratos co JOIN clientes cl ON co.cliente_id = cl.id ORDER BY co.data_upload DESC")->fetchAll();

// --- LÓGICA DE ALTERAR STATUS DO CHAMADO ---
if (isset($_POST['alterar_status_chamado'])) {
    $id_chamado = $_POST['chamado_id'];
    $novo_status = $_POST['novo_status'];
    
    $upd = $pdo->prepare("UPDATE chamados SET status = ? WHERE id = ?");
    if($upd->execute([$novo_status, $id_chamado])) {
        $mensagem = "Status do chamado #$id_chamado atualizado para $novo_status!";
    }
}
?>