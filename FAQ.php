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
            Dúvidas Frequentes
        </h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">ConectaTI</a>
            </li>
            <li class="breadcrumb-item active text-primary">
                FAQ
            </li>
        </ol>    
    </div>
</div>
<!-- Header End -->



      <div class="container-fluid faq-section bg-light py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="h-100">
                    <div class="mb-5">
                        <h4 class="text-primary">FAQ Técnico Especializado</h4>
                        <h1 class="display-4 mb-0">Respostas para suas dúvidas sobre TI</h1>
                    </div>
                    <div class="accordion" id="accordionExample">
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button border-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Q: Por que terceirizar a TI em vez de ter uma equipe interna?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body rounded">
                                    A: A terceirização (Outsourcing) reduz custos fixos com encargos trabalhistas e treinamentos constantes. Além disso, sua empresa passa a contar com um <strong>pool de especialistas</strong> em diversas áreas (segurança, redes, nuvem) pelo preço de um único funcionário pleno, garantindo suporte 24/7 e redundância de conhecimento.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Q: Há risco de perda de dados durante a migração de e-mails?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    A: Não. Utilizamos ferramentas de migração via IMAP ou API que realizam a <strong>replicação dos dados</strong>. O conteúdo é copiado do servidor antigo para o novo (como Microsoft 365 ou Google Workspace) enquanto o serviço original permanece ativo. Só realizamos o apontamento do MX (troca de servidor) após a conferência da integridade de todas as caixas postais.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Q: O que está incluso no suporte de Helpdesk e Service Desk?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    A: Nosso suporte abrange desde a resolução de problemas de software e hardware (Nível 1) até configurações complexas de servidores e ativos de rede (Nível 3). Inclui <strong>suporte remoto imediato</strong>, visitas técnicas presenciais programadas, gestão de patches de segurança e inventário de ativos.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Q: Como a infraestrutura de TI auxilia na conformidade com a LGPD?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    A: A tecnologia é o pilar da LGPD. Implementamos <strong>criptografia de dados</strong>, controle estrito de acesso (quem pode ver o quê), logs de auditoria e firewalls avançados. Isso garante que as informações sensíveis da sua empresa estejam protegidas contra vazamentos, evitando multas pesadas e danos à reputação.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Q: Ter um HD externo é suficiente para o backup da empresa?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    A: Definitivamente não. Seguimos a regra <strong>3-2-1</strong>: 3 cópias dos dados, em 2 mídias diferentes, sendo 1 fora da empresa (nuvem). HDs externos são frágeis e vulneráveis a Ransomware. Nossas soluções de backup em nuvem são imutáveis e automáticas, garantindo a recuperação rápida em caso de desastres ou ataques cibernéticos.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.4s">
                <img src="img/carousel-2.png" class="img-fluid w-100" alt="Suporte Tecnológico Profissional">
            </div>
        </div>
    </div>
</div>


        <!-- Footer Start -->
      <?php include ('_footer.php')?>
    </body>

</html>