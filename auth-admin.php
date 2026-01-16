<?php
session_start();
// Dados de conexão (mesmos do seu db.php)
$host = "199.193.117.162";
$db   = "rxuffavj_conectati";
$user = "rxuffavj";
$pass = "R4S68C0Id1ir29";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) { die("Erro: " . $e->getMessage()); }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $senha = trim($_POST['password']);

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ? LIMIT 1");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        // Criamos sessões diferentes do cliente para não haver conflito
        $_SESSION['admin_id'] = $usuario['id'];
        $_SESSION['admin_nome'] = $usuario['nome'];
        $_SESSION['admin_nivel'] = $usuario['nivel'];

        header("Location: helpdesk");
        exit();
    } else {
        header("Location: login-admin?erro=1");
        exit();
    }
}