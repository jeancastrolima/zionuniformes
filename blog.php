<?php
require_once 'db.php'; // ou o caminho correto
$sql = "SELECT * FROM blog_posts ORDER BY data_publicacao ";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

   <?php include ('_header.php')?>

    <body>
<?php include ('_navbar.php')?>

        <!-- Navbar & Hero End -->

        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center bg-primary">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="btn bg-light border nput-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->


        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Nosso Blog</h4>
                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">Blog</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->


        <!-- Blog Start -->
        <div class="container-fluid blog py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                   <h4 class="text-primary">Blog ConectaTI</h4>
<h1 class="display-4 mb-4">Novidades e Atualizações</h1>
<p class="mb-0">
Fique por dentro das novidades da <strong>ConectaTI Solutions</strong>. Aqui compartilhamos conteúdos sobre tecnologia, inovação, soluções corporativas, segurança da informação e treinamentos profissionais, ajudando empresas a evoluírem e se destacarem em um mercado cada vez mais digital.
</p>

                </div>
               <div class="row g-4 justify-content-center">

<?php foreach ($posts as $post): ?>
    <div class="col-lg-6 col-xl-4 wow fadeInUp">
        <div class="blog-item">
            <div class="blog-img">
                <img src="img/<?= htmlspecialchars($post['imagem']) ?>"
                     class="img-fluid rounded-top w-100" alt="<?= htmlspecialchars($post['titulo']) ?>">
                
                <div class="blog-categiry py-2 px-4">
                    <span><?= htmlspecialchars($post['categoria']) ?></span>
                </div>
            </div>

            <div class="blog-content p-4">
                <div class="blog-comment d-flex justify-content-between mb-3">
                    <div class="small">
                        <span class="fa fa-user text-primary"></span>
                        <?= htmlspecialchars($post['autor']) ?>
                    </div>

                    <div class="small">
                        <span class="fa fa-calendar text-primary"></span>
                        <?= date('d M Y', strtotime($post['data_publicacao'])) ?>
                    </div>

                    <div class="small">
                        <span class="fa fa-comment-alt text-primary"></span>
                        <?= (int)$post['comentarios'] ?> Comentários
                    </div>
                </div>

                <a href="<?= htmlspecialchars($post['slug']) ?>" class="h4 d-inline-block mb-3">
                    <?= htmlspecialchars($post['titulo']) ?>
                </a>

                <p class="mb-3">
                    <?= htmlspecialchars($post['resumo']) ?>
                </p>

                <a href="<?= htmlspecialchars($post['slug']) ?>" class="btn p-0">
                    Ler mais <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
<?php endforeach; ?>

</div>

            </div>
        </div>
        <!-- Blog End -->


        <!-- Footer Start -->
    <?php include ('_footer.php')?>  
    </body>

</html>