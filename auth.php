<?php
include ('assets/conect/dbauth.php');
$email = trim($_POST['email'] ?? '');
$senha = $_POST['password'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM clientes WHERE email = ? LIMIT 1");
$stmt->execute([$email]);
$cliente = $stmt->fetch();

if ($cliente && password_verify($senha, $cliente['senha'])) {
    session_regenerate_id(true);

    $_SESSION['cliente_id'] = $cliente['id'];
    $_SESSION['cliente_nome'] = $cliente['nome_usuario'];
    $_SESSION['cliente_empresa'] = $cliente['empresa_nome'];

    header("Location: area-cliente");
    exit;
}

header("Location: login?erro=1");
exit;
