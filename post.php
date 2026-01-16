<?php
require_once 'db.php';

if (!isset($_GET['slug']) || empty($_GET['slug'])) {
    header("Location: blog");
    exit;
}

$slug = $_GET['slug'];

$sql = "SELECT * FROM blog_posts WHERE slug = :slug LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':slug', $slug, PDO::PARAM_STR);
$stmt->execute();

$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    header("HTTP/1.0 404 Not Found");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<?php include('_header.php'); ?>

<body>

<?php include('_navbar.php'); ?>

<!-- Header Start -->
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">
            <?= $post ? htmlspecialchars($post['titulo']) : 'Conteúdo não encontrado' ?>
        </h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="../../">Home</a></li>
            <li class="breadcrumb-item"><a href="404">404</a></li>
            <li class="breadcrumb-item active text-primary">
                <?= $post ? htmlspecialchars($post['categoria']) : 'Erro 404' ?>
            </li>
        </ol>
    </div>
</div>
<!-- Header End -->

<?php if ($post): ?>

<!-- Post Start -->
<div class="container-fluid py-5 bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.3s">

                <img src="img/<?= htmlspecialchars($post['imagem']) ?>"
                     class="img-fluid rounded mb-4 w-100"
                     alt="<?= htmlspecialchars($post['titulo']) ?>">

                <span class="badge bg-primary mb-3">
                    <?= htmlspecialchars($post['categoria']) ?>
                </span>

                <h1 class="mb-3"><?= htmlspecialchars($post['titulo']) ?></h1>

                <div class="text-muted mb-4">
                    <i class="fa fa-user text-primary"></i>
                    <?= htmlspecialchars($post['autor']) ?>
                    &nbsp;&nbsp;
                    <i class="fa fa-calendar text-primary"></i>
                    <?= date('d/m/Y', strtotime($post['data_publicacao'])) ?>
                    &nbsp;&nbsp;
                    <i class="fa fa-comment text-primary"></i>
                    <?= (int)$post['comentarios'] ?> comentários
                </div>

<p class="lead">
    <?= nl2br(htmlspecialchars($post['resumo'])) ?>
</p>


                <hr>

                <!-- Conteúdo completo -->

<div class="post-content">
    <?= $post['conteudo']; ?>
</div>

                <a href="../../" class="btn btn-primary rounded-pill py-3 px-5 mt-4">
                    ← Voltar para o Site
                </a>

            </div>
        </div>
    </div>
</div>
<!-- Post End -->

<?php else: ?>

<!-- 404 Start -->
<div class="container-fluid bg-light py-5">
    <div class="container py-5 text-center">
        <div class="row justify-content-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <i class="far fa-frown-open display-1 text-primary mb-4"></i>
                <h1 class="display-1">404</h1>
                <h1 class="mb-4">Conteúdo não encontrado</h1>
                <p class="mb-4">
                    O conteúdo que você procura não existe ou foi removido.
                </p>
                <a class="btn btn-primary rounded-pill py-3 px-5" href="../../">
                    Voltar para o Site
                </a>
            </div>
        </div>
    </div>
</div>
<!-- 404 End -->

<?php endif; ?>

<?php include('_footer.php'); ?>

</body>
</html>
