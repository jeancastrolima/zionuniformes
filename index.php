<!DOCTYPE html>
<html lang="pt_br">
<?php include ('_header.php')?>

<body>
    <?php include ('_navbar.php')?>

    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pesquisar Uniformes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center bg-primary">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="Ex: Macacão RF, Conjunto Brim..." aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="btn bg-light border p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-carousel owl-carousel">
        <div class="header-carousel-item bg-dark">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-7 animated fadeInLeft">
                            <div class="text-sm-center text-md-start">
                                <h4 class="text-primary text-uppercase fw-bold mb-4">Zion Uniformes</h4>
                                <h1 class="display-1 text-white mb-4">Uniformes Offshore com Padrão Industrial</h1>
                                <p class="mb-5 fs-5">Produção própria, qualidade certificada e soluções sob medida para grandes operações — com compra imediata no varejo online.</p>
                                <div class="d-flex justify-content-center justify-content-md-start flex-shrink-0 mb-4">
                                    <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 me-2" href="https://wa.me/SEU_NUMERO"><i class="fas fa-comments me-2"></i> Falar com Especialista</a>
                                    <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 ms-2" href="#varejo">Comprar no Varejo</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 animated fadeInRight">
                            <div class="carousel-img">
                                <img src="img/banner-offshore-1.png" class="img-fluid w-100" alt="Uniforme Offshore Zion">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-carousel-item bg-secondary">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row gy-4 align-items-center">
                        <div class="col-lg-5 animated fadeInLeft">
                            <div class="carousel-img">
                                <img src="img/banner-mercado-livre.png" class="img-fluid w-100" alt="Loja Mercado Livre">
                            </div>
                        </div>
                        <div class="col-lg-7 animated fadeInRight">
                            <div class="text-sm-center text-md-end">
                                <h4 class="text-white text-uppercase fw-bold mb-4">Pronta Entrega</h4>
                                <h1 class="display-1 text-white mb-4">Compre no Mercado Livre</h1>
                                <p class="mb-5 fs-5">Unidades individuais ou pequenos volumes com a logística mais rápida do Brasil. Segurança e praticidade para profissionais.</p>
                                <div class="d-flex justify-content-center justify-content-md-end flex-shrink-0 mb-4">
                                    <a class="btn btn-warning rounded-pill py-3 px-4 px-md-5" href="LINK_MERCADO_LIVRE"><i class="fas fa-shopping-cart me-2"></i> Ver Loja Oficial</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid feature bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Diferenciais Zion</h4>
                <h1 class="display-4 mb-4">Por que empresas e profissionais escolhem a Zion</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-item p-4">
                        <div class="feature-icon mb-4"><i class="fa fa-industry fa-3x"></i></div>
                        <h4>Produção Própria</h4>
                        <p>Controle total de qualidade e prazos em cada etapa da fabricação.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="feature-item p-4">
                        <div class="feature-icon mb-4"><i class="fa fa-ship fa-3x"></i></div>
                        <h4>Setor Offshore</h4>
                        <p>Expertise técnica em operações de alto risco, petróleo e gás.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="feature-item p-4">
                        <div class="feature-icon mb-4"><i class="fa fa-shield-alt fa-3x"></i></div>
                        <h4>Qualidade e Durabilidade</h4>
                        <p>Materiais de alta performance resistentes a ambientes severos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-white about py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="about-item-content">
                        <h4 class="text-primary">Quem Somos</h4>
                        <h1 class="display-4 mb-4">Zion Uniformes</h1>
                        <p>A <strong>Zion Uniformes</strong> é especialista na fabricação e comercialização de uniformes offshore e industriais, atendendo grandes empresas, prestadores de serviço e clientes individuais em todo o Brasil.</p>
                        <p>Atuamos com produção própria, foco em segurança, conforto e durabilidade, oferecendo tanto fornecimento corporativo quanto vendas diretas no varejo digital.</p>
                        <div class="row g-4 mb-4">
                            <div class="col-6"><i class="fa fa-check text-primary me-2"></i>Atendimento Nacional</div>
                            <div class="col-6"><i class="fa fa-check text-primary me-2"></i>Confiança Industrial</div>
                        </div>
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="https://wa.me/SEU_NUMERO">Falar com Especialista (B2B)</a>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                    <img src="img/quem-somos-zion.png" class="img-fluid rounded shadow" alt="Fábrica Zion Uniformes">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid service py-5 bg-light">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s">
                <h4 class="text-primary">Para Empresas</h4>
                <h1 class="display-4 mb-4">Soluções Corporativas (B2B)</h1>
                <p>Atendimento especializado para grandes operações do setor offshore e industrial.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="service-item text-center p-4">
                        <div class="service-icon mb-3"><i class="fa fa-layer-group fa-2x"></i></div>
                        <h5>Fornecimento em Escala</h5>
                        <p>Produção de alto volume com prazos otimizados.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-item text-center p-4">
                        <div class="service-icon mb-3"><i class="fa fa-tags fa-2x"></i></div>
                        <h5>Padronização</h5>
                        <p>Identidade visual alinhada à sua marca.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-item text-center p-4">
                        <div class="service-icon mb-3"><i class="fa fa-cut fa-2x"></i></div>
                        <h5>Personalização</h5>
                        <p>Bordados, logos e especificações técnicas sob demanda.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-item text-center p-4">
                        <div class="service-icon mb-3"><i class="fa fa-truck fa-2x"></i></div>
                        <h5>Logística Nacional</h5>
                        <p>Entregas eficientes em todo o território brasileiro.</p>
                    </div>
                </div>
                <div class="col-12 text-center mt-5">
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="#contato">Solicitar Atendimento Corporativo</a>
                </div>
            </div>
        </div>
    </div>

    <div id="varejo" class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s">
                <h4 class="text-primary">Varejo Online</h4>
                <h1 class="display-4 mb-4">Compre Agora no Mercado Livre</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card product-card border-0 shadow-sm">
                        <img src="img/macacao-azul.jpg" class="card-img-top" alt="Macacão Offshore Azul">
                        <div class="card-body text-center">
                            <h5 class="card-title">Macacão Offshore Azul</h5>
                            <a href="LINK_ML_1" class="btn btn-warning btn-sm rounded-pill">Ver no Mercado Livre</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card product-card border-0 shadow-sm">
                        <img src="img/macacao-laranja.jpg" class="card-img-top" alt="Macacão FR Laranja">
                        <div class="card-body text-center">
                            <h5 class="card-title">Macacão Retardante FR Laranja</h5>
                            <a href="LINK_ML_2" class="btn btn-warning btn-sm rounded-pill">Ver no Mercado Livre</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card product-card border-0 shadow-sm">
                        <img src="img/macacao-bicolor.jpg" class="card-img-top" alt="Macacão Bicolor">
                        <div class="card-body text-center">
                            <h5 class="card-title">Macacão Bicolor FR</h5>
                            <a href="LINK_ML_3" class="btn btn-warning btn-sm rounded-pill">Ver no Mercado Livre</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card product-card border-0 shadow-sm">
                        <img src="img/conjunto-vermelho.jpg" class="card-img-top" alt="Conjunto Industrial">
                        <div class="card-body text-center">
                            <h5 class="card-title">Conjunto Industrial Vermelho</h5>
                            <a href="LINK_ML_4" class="btn btn-warning btn-sm rounded-pill">Ver no Mercado Livre</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center mt-4">
                    <a class="btn btn-dark rounded-pill py-3 px-5" href="LINK_LOJA_ML">Ver Todos os Produtos</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-primary py-5">
        <div class="container text-center">
            <h2 class="text-white mb-4">Uma marca preparada para grandes contratos e pronta para atender você hoje.</h2>
            <div class="d-flex justify-content-center gap-3">
                <a class="btn btn-warning rounded-pill py-3 px-4" href="LINK_ML">Comprar no Mercado Livre</a>
                <a class="btn btn-light rounded-pill py-3 px-4" href="https://wa.me/SEU_NUMERO">Falar com Especialista</a>
            </div>
        </div>
    </div>

    <?php include ('_footer.php')?>
</body>
</html>