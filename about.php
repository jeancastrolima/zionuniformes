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
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Sobre</h4>
                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">Sobre</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->


        <!-- About Start -->
<div class="container-fluid bg-light about py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="about-item-content bg-white rounded p-5 h-100">
                    <h4 class="text-primary">Sobre a ConectaTI Solutions</h4>
                    <h1 class="display-4 mb-4">Tecnologia que Conecta. Suporte que Resolve.</h1>

                    <p>
                        A ConectaTI Solutions é especializada em soluções completas de tecnologia da informação
                        para empresas que buscam eficiência, segurança e inovação.
                    </p>

                    <p>
                        Atuamos com suporte técnico, helpdesk corporativo, infraestrutura de TI,
                        sistemas personalizados e plataformas digitais B2B.
                    </p>

                    <p class="text-dark">
                        <i class="fa fa-check text-primary me-3"></i>Suporte técnico ágil e especializado
                    </p>
                    <p class="text-dark">
                        <i class="fa fa-check text-primary me-3"></i>Gestão completa de TI para empresas
                    </p>
                    <p class="text-dark mb-4">
                        <i class="fa fa-check text-primary me-3"></i>Soluções digitais sob medida
                    </p>

                    <a class="btn btn-primary rounded-pill py-3 px-5" href="#">Fale com um Especialista</a>
                </div>
            </div>

            <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                <div class="bg-white rounded p-5 h-100">
                    <div class="row g-4 justify-content-center">
                        <div class="col-12">
                            <div class="rounded bg-light">
                                <img src="img/about-ti.png" class="img-fluid rounded w-100" alt="ConectaTI Solutions">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="counter-item bg-light rounded p-3 h-100">
                                <div class="counter-counting">
                                    <span class="text-primary fs-2 fw-bold">+100</span>
                                </div>
                                <h4 class="mb-0 text-dark">Empresas Atendidas</h4>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="counter-item bg-light rounded p-3 h-100">
                                <div class="counter-counting">
                                    <span class="text-primary fs-2 fw-bold">+50</span>
                                </div>
                                <h4 class="mb-0 text-dark">Projetos Entregues</h4>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="counter-item bg-light rounded p-3 h-100">
                                <div class="counter-counting">
                                    <span class="text-primary fs-2 fw-bold">+20</span>
                                </div>
                                <h4 class="mb-0 text-dark">Especialistas em TI</h4>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="counter-item bg-light rounded p-3 h-100">
                                <div class="counter-counting">
                                    <span class="text-primary fs-2 fw-bold">+5.000</span>
                                </div>
                                <h4 class="mb-0 text-dark">Chamados Resolvidos</h4>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->



       <!-- Feature Start -->
<div class="container-fluid feature bg-light pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5" style="max-width: 800px;">
            <h4 class="text-primary">Nossos Diferenciais</h4>
            <h1 class="display-4 mb-4">Soluções de TI Pensadas para sua Empresa</h1>
            <p class="mb-0">
                Tecnologia confiável, suporte rápido e soluções que acompanham o crescimento do seu negócio.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-6 col-xl-3">
                <div class="feature-item p-4 pt-0">
                    <div class="feature-icon p-4 mb-4">
                        <i class="far fa-handshake fa-3x"></i>
                    </div>
                    <h4 class="mb-4">Parceria de Confiança</h4>
                    <p class="mb-4">
                        Atuamos como parceiros estratégicos de tecnologia da sua empresa.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="feature-item p-4 pt-0">
                    <div class="feature-icon p-4 mb-4">
                        <i class="fa fa-chart-line fa-3x"></i>
                    </div>
                    <h4 class="mb-4">Redução de Custos</h4>
                    <p class="mb-4">
                        Otimização de infraestrutura e processos para reduzir custos operacionais.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="feature-item p-4 pt-0">
                    <div class="feature-icon p-4 mb-4">
                        <i class="fa fa-cogs fa-3x"></i>
                    </div>
                    <h4 class="mb-4">Soluções Flexíveis</h4>
                    <p class="mb-4">
                        Serviços e sistemas adaptados à realidade do seu negócio.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="feature-item p-4 pt-0">
                    <div class="feature-icon p-4 mb-4">
                        <i class="fa fa-headphones fa-3x"></i>
                    </div>
                    <h4 class="mb-4">Suporte Rápido</h4>
                    <p class="mb-4">
                        Atendimento ágil via helpdesk para garantir continuidade operacional.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Feature End -->

<!-- FAQs Start -->
<div class="container-fluid faq-section bg-light pb-5">
    <div class="container pb-5">
        <div class="row g-5 align-items-center">

            <!-- FAQ CONTENT -->
            <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="h-100">
                    <div class="mb-5">
                        <h4 class="text-primary">Dúvidas Frequentes</h4>
                        <h1 class="display-4 mb-0">Perguntas Comuns sobre a ConectaTI</h1>
                    </div>

                    <div class="accordion" id="accordionExample">

                        <!-- FAQ 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button border-0" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    Como funciona o suporte técnico da ConectaTI Solutions?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show active"
                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body rounded">
                                    Nosso suporte funciona através de um sistema de helpdesk especializado,
                                    com atendimento remoto e presencial. Os chamados são tratados com agilidade,
                                    priorizando a continuidade das operações da sua empresa.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                    A ConectaTI atende empresas de qualquer porte?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Sim. Atendemos pequenas, médias e grandes empresas, oferecendo soluções
                                    personalizadas de acordo com o porte, segmento e necessidade do negócio.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 3 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree">
                                    Vocês trabalham com contrato mensal de suporte?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Sim. Trabalhamos com contratos mensais de suporte técnico, além de projetos
                                    pontuais e soluções sob demanda, garantindo previsibilidade e segurança
                                    para sua empresa.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 4 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                    aria-expanded="false" aria-controls="collapseFour">
                                    Quais serviços a ConectaTI oferece?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse"
                                aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Oferecemos suporte técnico, helpdesk corporativo, gestão de infraestrutura
                                    de TI, desenvolvimento de sistemas, plataformas digitais B2B e consultoria
                                    tecnológica.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 5 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                    aria-expanded="false" aria-controls="collapseFive">
                                    Como posso solicitar um orçamento?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse"
                                aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Você pode solicitar um orçamento entrando em contato pelo nosso site,
                                    WhatsApp ou e-mail. Um especialista da ConectaTI irá analisar sua necessidade
                                    e propor a melhor solução.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- IMAGE -->
            <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.4s">
                <img src="img/carousel-2.png" class="img-fluid w-100" alt="FAQ ConectaTI Solutions">
            </div>

        </div>
    </div>
</div>
<!-- FAQs End -->



        


        <!-- Footer Start -->
        <?php include ('_footer.php')?>
    </body>

</html>