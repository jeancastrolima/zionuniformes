<?php
session_start();

// Configurações do seu Banco de Dados
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

// Proteção da página: Se não estiver logado como cliente nem admin
if (!isset($_SESSION['cliente_id']) && !isset($_SESSION['admin_id'])) {
    header("Location: login");
    exit();
}

// Define quem está logado
$isAdmin = isset($_SESSION['admin_id']);
$cid = $isAdmin ? (isset($_GET['cliente_id']) ? $_GET['cliente_id'] : null) : $_SESSION['cliente_id'];

// --- LÓGICA: ALTERAR STATUS DO CHAMADO (ADMIN OU USUÁRIO) ---
if (isset($_GET['acao']) && $_GET['acao'] == 'status' && isset($_GET['id']) && isset($_GET['novo'])) {
    $id_chamado = $_GET['id'];
    $novo_status = $_GET['novo'];

    // Se for admin, altera qualquer um. Se for cliente, altera apenas se o chamado for dele.
    if ($isAdmin) {
        $upd = $pdo->prepare("UPDATE chamados SET status = ? WHERE id = ?");
        $upd->execute([$novo_status, $id_chamado]);
    } else {
        $upd = $pdo->prepare("UPDATE chamados SET status = ? WHERE id = ? AND cliente_id = ?");
        $upd->execute([$novo_status, $id_chamado, $_SESSION['cliente_id']]);
    }
    header("Location: area-cliente#nav-chamados");
    exit();
}

// --- LÓGICA: SALVAR NOVO CHAMADO ---
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['acao']) && $_POST['acao'] == 'abrir_chamado') {
    $assunto = htmlspecialchars($_POST['assunto']);
    $mensagem = htmlspecialchars($_POST['mensagem']);
    $sql = "INSERT INTO chamados (cliente_id, assunto, mensagem, status, data_abertura) VALUES (?, ?, ?, 'Aberto', NOW())";
    $ins = $pdo->prepare($sql);
    $ins->execute([$_SESSION['cliente_id'], $assunto, $mensagem]);
    header("Location: area-cliente?status=sucesso#nav-chamados");
    exit();
}

// --- BUSCA DE DADOS ---
// Boletos
$stmtB = $pdo->prepare("SELECT * FROM boletos WHERE cliente_id = ? ORDER BY vencimento DESC");
$stmtB->execute([$_SESSION['cliente_id']]);
$listBoletos = $stmtB->fetchAll();

// Chamados
$stmtC = $pdo->prepare("SELECT * FROM chamados WHERE cliente_id = ? ORDER BY data_abertura DESC");
$stmtC->execute([$_SESSION['cliente_id']]);
$listChamados = $stmtC->fetchAll();

// Contratos
$stmtCon = $pdo->prepare("SELECT * FROM contratos WHERE cliente_id = ? ORDER BY data_upload DESC");
$stmtCon->execute([$_SESSION['cliente_id']]);
$listContratos = $stmtCon->fetchAll();

// Contadores
$countBoletos = 0; foreach($listBoletos as $b) if($b['status'] == 'Pendente') $countBoletos++;
$countChamados = 0; foreach($listChamados as $c) if($c['status'] != 'Concluído') $countChamados++;
$countContratos = count($listContratos);


// Pega o ID do cliente logado na sessão
$cliente_id = $_SESSION['cliente_id'];

// --- LÓGICA: ALTERAR STATUS DO CHAMADO ---
if (isset($_GET['acao']) && $_GET['acao'] == 'status' && isset($_GET['id']) && isset($_GET['novo'])) {
    $id_chamado = $_GET['id'];
    $novo_status = $_GET['novo'];
    $upd = $pdo->prepare("UPDATE chamados SET status = ? WHERE id = ? AND cliente_id = ?");
    $upd->execute([$novo_status, $id_chamado, $cliente_id]);
    header("Location: area-cliente.php#nav-chamados");
    exit();
}

// --- LÓGICA: SALVAR NOVO CHAMADO ---
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['acao']) && $_POST['acao'] == 'abrir_chamado') {
    $assunto = htmlspecialchars($_POST['assunto']);
    $mensagem = htmlspecialchars($_POST['mensagem']);
    $sql = "INSERT INTO chamados (cliente_id, assunto, mensagem, status, data_abertura) VALUES (?, ?, ?, 'Aberto', NOW())";
    $ins = $pdo->prepare($sql);
    $ins->execute([$cliente_id, $assunto, $mensagem]);
    header("Location: area-cliente.php?status=sucesso#nav-chamados");
    exit();
}

// --- BUSCA DE DADOS ---
$stmtB = $pdo->prepare("SELECT * FROM boletos WHERE cliente_id = ? ORDER BY vencimento DESC");
$stmtB->execute([$cliente_id]);
$listBoletos = $stmtB->fetchAll();

$stmtC = $pdo->prepare("SELECT * FROM chamados WHERE cliente_id = ? ORDER BY data_abertura DESC");
$stmtC->execute([$cliente_id]);
$listChamados = $stmtC->fetchAll();

$stmtCon = $pdo->prepare("SELECT * FROM contratos WHERE cliente_id = ? ORDER BY data_upload DESC");
$stmtCon->execute([$cliente_id]);
$listContratos = $stmtCon->fetchAll();

// --- CONTADORES ---
$countBoletos = 0; foreach($listBoletos as $b) { if($b['status'] != 'Pago') $countBoletos++; }
$countChamados = 0; foreach($listChamados as $c) { if($c['status'] != 'Concluído') $countChamados++; }
$countContratos = count($listContratos);

?>