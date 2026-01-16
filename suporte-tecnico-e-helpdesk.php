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
        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">
            Suporte Técnico & Helpdesk
        </h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="../../">Home</a></li>
            <li class="breadcrumb-item"><a href="../servicos.html">Serviços</a></li>
            <li class="breadcrumb-item active text-primary">Suporte Técnico</li>
        </ol>    
    </div>
</div>
<!-- Header End -->



   <!-- Service Detail Start -->
<div class="container-fluid bg-light py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">

            <!-- TEXTO -->
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                <h4 class="text-primary mb-3">Serviço Especializado</h4>
                <h1 class="display-5 mb-4">Suporte Técnico & Helpdesk Corporativo</h1>

                <p>
                    O serviço de Suporte Técnico & Helpdesk da <strong>ConectaTI Solutions</strong>
                    foi desenvolvido para garantir que sua empresa opere sem interrupções,
                    com atendimento rápido, eficiente e especializado.
                </p>

                <p>
                    Atuamos na prevenção, diagnóstico e resolução de problemas técnicos,
                    oferecendo suporte remoto e presencial para ambientes corporativos.
                </p>

                <ul class="list-unstyled mb-4">
                    <li class="mb-2">
                        <i class="fa fa-check text-primary me-2"></i>
                        Atendimento via helpdesk com abertura e acompanhamento de chamados
                    </li>
                    <li class="mb-2">
                        <i class="fa fa-check text-primary me-2"></i>
                        Suporte remoto e presencial conforme a necessidade
                    </li>
                    <li class="mb-2">
                        <i class="fa fa-check text-primary me-2"></i>
                        Resolução de problemas em computadores, sistemas e redes
                    </li>
                    <li class="mb-2">
                        <i class="fa fa-check text-primary me-2"></i>
                        Manutenção preventiva e corretiva
                    </li>
                    <li class="mb-2">
                        <i class="fa fa-check text-primary me-2"></i>
                        Redução de falhas e aumento da produtividade
                    </li>
                </ul>

                <a href="#" class="btn btn-primary rounded-pill py-3 px-5">
                    Solicitar Atendimento
                </a>
            </div>

            <!-- IMAGEM -->
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.4s">
                <img src="img/service-helpdesk.png" class="img-fluid rounded" alt="Suporte Técnico ConectaTI">
            </div>

        </div>
    </div>
</div>
<!-- Service Detail End -->


<!-- Benefits Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row g-4 text-center">

            <div class="col-md-4">
                <div class="bg-light rounded p-4 h-100">
                    <i class="fa fa-clock fa-3x text-primary mb-3"></i>
                    <h4>Atendimento Rápido</h4>
                    <p>
                        Respostas ágeis para minimizar impactos e garantir continuidade operacional.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-light rounded p-4 h-100">
                    <i class="fa fa-user-shield fa-3x text-primary mb-3"></i>
                    <h4>Equipe Especializada</h4>
                    <p>
                        Profissionais qualificados e experientes em ambientes corporativos.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-light rounded p-4 h-100">
                    <i class="fa fa-chart-line fa-3x text-primary mb-3"></i>
                    <h4>Mais Produtividade</h4>
                    <p>
                        Menos falhas técnicas, mais eficiência e desempenho para sua empresa.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Benefits End -->

<!-- CTA Start -->
<div class="container-fluid bg-primary py-5">
    <div class="container text-center py-5">
        <h1 class="text-white mb-4">
            Precisa de Suporte Técnico Confiável?
        </h1>
        <p class="text-white mb-4">
            Fale com um especialista da ConectaTI Solutions e garanta estabilidade
            e segurança para o seu ambiente de TI.
        </p>
        <a href="#" class="btn btn-light rounded-pill py-3 px-5">
            Falar com um Especialista
        </a>
    </div>
</div>
<!-- CTA End -->


      <?php include ('_footer.php')?>
    </body>

</html>