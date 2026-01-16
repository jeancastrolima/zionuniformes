<?php
header("Content-Type: application/xml; charset=utf-8");
require_once 'db.php'; // Certifique-se de que este ficheiro tem a sua conexão PDO

echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

// 1. URLs FIXAS DA NAVBAR
$paginas_fixas = [
    '' => '1.0',         // Home
    'Sobre' => '0.8',
    'Servicos' => '0.8',
    'blog' => '0.9',
    'Contato' => '0.8',
    'FAQ' => '0.7'
];

foreach ($paginas_fixas as $url => $prioridade) {
    echo '<url>';
    echo '<loc>https://conectatisolutions.com.br/' . $url . '</loc>';
    echo '<priority>' . $prioridade . '</priority>';
    echo '</url>';
}

// 2. POSTS DO BLOG DINÂMICOS
try {
    $sql = "SELECT slug, data_publicacao FROM blog_posts ORDER BY data_publicacao DESC";
    $stmt = $pdo->query($sql);
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($posts as $post) {
        echo '<url>';
        // Aqui usamos o slug amigável que configuramos no web.config
        echo '<loc>https://conectatisolutions.com.br/' . htmlspecialchars($post['slug']) . '</loc>';
        echo '<lastmod>' . date('Y-m-d', strtotime($post['data_publicacao'])) . '</lastmod>';
        echo '<priority>0.7</priority>';
        echo '</url>';
    }
} catch (Exception $e) {
    // Se falhar a base de dados, o sitemap ainda mostra as páginas fixas
}

echo '</urlset>';
?>