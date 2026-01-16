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
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">404 Pages</h4>
                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="../../">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">404 Page</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->


     <!-- 404 Start -->
<div class="container-fluid bg-light py-5">
    <div class="container py-5 text-center">
        <div class="row justify-content-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <i class="far fa-frown-open display-1 text-primary mb-4" style="width: 80px; height: 80px;"></i>
                <h1 class="display-1">404</h1>
                <h1 class="mb-4">Página não encontrada</h1>
                <p class="mb-4">
                    Desculpe, a página que você está procurando não existe em nosso site.
                    Que tal voltar para a página inicial?
                </p>
                <a class="btn btn-primary rounded-pill py-3 px-5" href="index">
                    Voltar para a página inicial
                </a>
            </div>
        </div>
    </div>
</div>
<!-- 404 End -->



      <?php include ('_footer.php')?>
    </body>

</html>