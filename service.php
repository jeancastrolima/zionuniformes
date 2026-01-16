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
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Nosso Serviço</h4>
                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">Serviço</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->


      <!-- Service Start -->
<div class="container-fluid service py-5">
    <div class="container py-5">

        <!-- TÍTULO -->
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Nossos Serviços</h4>
            <h1 class="display-4 mb-4">Soluções em Tecnologia para sua Empresa</h1>
            <p class="mb-0">
                A ConectaTI Solutions oferece serviços completos de tecnologia da informação,
                garantindo segurança, desempenho e suporte contínuo para o seu negócio.
            </p>
        </div>

        <!-- SERVIÇOS -->
        <div class="row g-4 justify-content-center">

            <!-- Serviço 1 -->
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="img/blog-1.png" class="img-fluid rounded-top w-100" alt="Suporte Técnico e Helpdesk">
                        <div class="service-icon p-3">
                            <i class="fa fa-headphones fa-2x"></i>
                        </div>
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Suporte Técnico & Helpdesk</a>
                            <p class="mb-4">
                                Atendimento ágil e especializado para resolver problemas técnicos,
                                garantir continuidade e aumentar a produtividade da sua empresa.
                            </p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="suporte-tecnico-e-helpdesk">Saiba Mais</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Serviço 2 -->
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="img/blog-2.png" class="img-fluid rounded-top w-100" alt="Infraestrutura de TI">
                        <div class="service-icon p-3">
                            <i class="fa fa-network-wired fa-2x"></i>
                        </div>
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Infraestrutura de TI</a>
                            <p class="mb-4">
                                Planejamento, implantação e gerenciamento de redes, servidores,
                                backups e ambientes seguros para sua empresa.
                            </p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="infraestrutura-ti">Saiba Mais</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Serviço 3 -->
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="img/blog-3.png" class="img-fluid rounded-top w-100" alt="Desenvolvimento de Sistemas">
                        <div class="service-icon p-3">
                            <i class="fa fa-code fa-2x"></i>
                        </div>
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Desenvolvimento de Sistemas</a>
                            <p class="mb-4">
                                Criação de sistemas personalizados, plataformas web e soluções
                                digitais adaptadas às necessidades do seu negócio.
                            </p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="desenvolvimento-de-sistemas">Saiba Mais</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Serviço 4 -->
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="img/blog-4.png" class="img-fluid rounded-top w-100" alt="Consultoria em Tecnologia">
                        <div class="service-icon p-3">
                            <i class="fa fa-shield-alt fa-2x"></i>
                        </div>
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Consultoria & Segurança da Informação</a>
                            <p class="mb-4">
                                Análise, planejamento e implementação de boas práticas de segurança,
                                compliance e proteção de dados.
                            </p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="consultoria-e-seguranca-da-informacao">Saiba Mais</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BOTÃO FINAL -->
            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                <a class="btn btn-primary rounded-pill py-3 px-5" href="orcamento">
                    Solicitar Orçamento
                </a>
            </div>

        </div>
    </div>
</div>
<!-- Service End -->


       


        <!-- Footer Start -->
    <?php include ('_footer.php')?>   
    </body>

</html>