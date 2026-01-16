<!DOCTYPE html>
<html lang="en">
<?php include ('_header.php')?>
    <body>
    <?php include ('_navbar.php')?>    
        
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
      
        </div>
        <div class="container-fluid bg-light py-5">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="bg-white rounded p-5 shadow-sm">
                            <div class="text-center mb-4">
                                <i class="fas fa-user-lock display-1 text-primary mb-3"></i>
                                <h2 class="mb-0">Login</h2>
                                <p class="text-muted">Entre com seus dados de acesso</p>
                            </div>

                            <?php if(isset($_GET['erro'])): ?>
                                <div class="alert alert-danger text-center small py-2">
                                    E-mail ou senha inválidos.
                                </div>
                            <?php endif; ?>

                            <form action="auth.php" method="POST">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                            <label for="email">E-mail Corporativo</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                            <label for="password">Senha</label>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-between align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember">
                                            <label class="form-check-label small" for="remember">Lembrar-me</label>
                                        </div>
                                        <a href="#" class="small text-primary">Esqueceu a senha?</a>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 rounded-pill py-3" type="submit">Entrar na Área do Cliente</button>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <p class="mb-0 small">Ainda não é cliente? <a href="orcamento" class="text-primary fw-bold">Solicite uma cotação</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include ('_footer.php')?>
    </body>
</html>