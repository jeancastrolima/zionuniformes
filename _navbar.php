<?php
  $directoryURI = $_SERVER['REQUEST_URI'];
  $path = parse_url($directoryURI, PHP_URL_PATH);
  $components = explode('/', $path);
  $current_page = end($components);
?>
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Carregando...</span>
    </div>
</div>
<div class="container-fluid topbar px-0 px-lg-4 bg-light py-2 d-none d-lg-block">
    <div class="container">
        <div class="row gx-0 align-items-center">
            <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                <div class="d-flex flex-wrap">
                    <div class="border-end border-primary pe-3">
                        <a href="#" class="text-muted small"><i class="fas fa-map-marker-alt text-primary me-2"></i>Macaé - RJ | Atendimento Nacional</a>
                    </div>
                    <div class="ps-3">
                        <a href="mailto:comercial@zionuniformes.com.br" class="text-muted small"><i class="fas fa-envelope text-primary me-2"></i>comercial@zionuniformes.com.br</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-flex justify-content-end">
                    <div class="d-flex border-end border-primary pe-3">
                        <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn p-0 text-primary me-0" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="dropdown ms-3">
                        <a href="LINK_MERCADO_LIVRE" class="text-dark"><small><i class="fas fa-shopping-cart text-primary me-2"></i> Loja Online</small></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid nav-bar px-0 px-lg-4 py-lg-0">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light"> 
            <a href="index.php" class="navbar-brand p-0">
                <img src="img/logo-zion.png" alt="Zion Uniformes" class="mb-0" style="height: 60px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-0 mx-lg-auto">
                    <a href="index.php" class="nav-item nav-link <?php if($current_page=='' || $current_page=='index.php') echo 'active'; ?>">Home</a>
                    <a href="sobre-nos.php" class="nav-item nav-link">Quem Somos</a>
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link" data-bs-toggle="dropdown">
                            <span class="dropdown-toggle">Uniformes</span>
                        </a>
                        <div class="dropdown-menu">
                            <a href="linha-offshore.php" class="dropdown-item">Linha Offshore</a>
                            <a href="linha-industrial.php" class="dropdown-item">Linha Industrial</a>
                            <a href="nr10-nr12.php" class="dropdown-item">Proteção NR10 / NR12</a>
                            <a href="administrativo.php" class="dropdown-item">Social & Admin</a>
                        </div>
                    </div>

                    <a href="varejo-online.php" class="nav-item nav-link">Varejo (ML)</a>
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link" data-bs-toggle="dropdown">
                            <span class="dropdown-toggle">Suporte</span>
                        </a>
                        <div class="dropdown-menu">
                            <a href="tabela-medidas.php" class="dropdown-item">Tabela de Medidas</a>
                            <a href="personalizacao.php" class="dropdown-item">Personalização/Logos</a>
                            <a href="portal-b2b.php" class="dropdown-item">Portal do Cliente</a>
                            <a href="catalogo-pdf.php" class="dropdown-item">Baixar Catálogo</a>
                            <a href="faq.php" class="dropdown-item">Dúvidas Frequentes</a>
                        </div>
                    </div>
                    
                    <a href="contato.php" class="nav-item nav-link">Contato</a>

                    <div class="nav-btn px-3">
                        <button class="btn-search btn btn-primary btn-md-square rounded-circle flex-shrink-0" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button>
                        <a href="orcamento.php" class="btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0">Cotação B2B</a>
                    </div>
                </div>
            </div>
            
            <div class="d-none d-xl-flex flex-shrink-0 ps-4">
                <a href="https://wa.me/5522981217821" class="btn btn-light btn-lg-square rounded-circle position-relative wow tada" data-wow-delay=".9s">
                    <i class="fab fa-whatsapp fa-2x"></i>
                    <div class="position-absolute" style="top: 7px; right: 12px;">
                        <span><i class="fa fa-comment-dots text-secondary"></i></span>
                    </div>
                </a>
                <div class="d-flex flex-column ms-3">
                    <span>Atendimento Comercial</span>
                    <a href="tel:+5522981217821"><span class="text-dark fw-bold">(22) 98121-7821</span></a>
                </div>
            </div>
        </nav>
    </div>
</div>