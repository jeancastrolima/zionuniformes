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
            Solicitar Cotação
        </h4>
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="index">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Serviços</a></li>
            <li class="breadcrumb-item active text-primary">Solicitar Cotação</li>
        </ol>
    </div>
</div>
<!-- Header End -->



<!-- Cotação Start -->
<div class="container-fluid bg-light py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-9 wow fadeInUp" data-wow-delay="0.3s">

                <div class="text-center mb-5">
                    <i class="fas fa-file-invoice-dollar display-1 text-primary mb-4"></i>
                    <h1 class="mb-3">Solicite sua Cotação</h1>

                </div>

               <form id="quoteForm" method="post" action="javascript:void(0);">

                    <div class="row g-4">

                        <!-- Dados do Solicitante -->
                        <h5 class="text-primary mt-4">Dados do Solicitante</h5>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" name="name" required>
                                <label for="name">Nome completo</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" name="email" required>
                                <label for="email">E-mail corporativo</label>
                            </div>
                        </div>

<div class="col-md-6">
    <div class="form-floating">
        <input type="text" class="form-control" id="phone" name="phone" placeholder=" ">
        <label for="phone">Telefone / WhatsApp</label>
    </div>
</div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="position" name="position">
                                <label for="position">Cargo / Função</label>
                            </div>
                        </div>

                        <!-- Dados da Empresa -->
                        <h5 class="text-primary mt-4">Dados da Empresa</h5>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="company" name="company">
                                <label for="company">Nome da empresa</label>
                            </div>
                        </div>

<div class="col-md-3">
    <div class="form-floating">
        <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder=" ">
        <label for="cnpj">CNPJ</label>
    </div>
</div>

<div class="col-md-3">
    <div class="form-floating">
        <input type="text" class="form-control" id="employees" name="employees" placeholder=" ">
        <label for="employees">Nº de colaboradores</label>
    </div>
</div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="city" name="city">
                                <label for="city">Cidade / Estado</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select" id="segment" name="segment">
                                    <option value="" selected disabled>Selecione</option>
                                    <option>Indústria</option>
                                    <option>Comércio</option>
                                    <option>Serviços</option>
                                    <option>Educação</option>
                                    <option>Saúde</option>
                                    <option>Tecnologia</option>
                                    <option>Outro</option>
                                </select>
                                <label for="segment">Segmento da empresa</label>
                            </div>
                        </div>

                        <!-- Escopo do Serviço -->
                        <h5 class="text-primary mt-4">Detalhes da Cotação</h5>

                        <div class="col-12">
                            <div class="form-floating">
                                <select class="form-select" id="service" name="service" required>
                                    <option value="" selected disabled>Selecione o serviço</option>
                                    <option>Infraestrutura de TI</option>
                                    <option>Desenvolvimento de Sistemas</option>
                                    <option>Consultoria em TI</option>
                                    <option>Segurança da Informação</option>
                                    <option>Suporte Técnico / Help Desk</option>
                                    <option>Contrato de Suporte Mensal</option>
                                </select>
                                <label for="service">Serviço desejado</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select" id="urgency" name="urgency">
                                    <option value="" selected disabled>Selecione</option>
                                    <option>Imediato</option>
                                    <option>Até 30 dias</option>
                                    <option>Até 60 dias</option>
                                    <option>Planejamento futuro</option>
                                </select>
                                <label for="urgency">Urgência do projeto</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select" id="budget" name="budget">
                                    <option value="" selected disabled>Selecione</option>
                                    <option>Até R$ 5.000</option>
                                    <option>R$ 5.000 a R$ 15.000</option>
                                    <option>R$ 15.000 a R$ 50.000</option>
                                    <option>Acima de R$ 50.000</option>
                                    <option>Prefiro discutir</option>
                                </select>
                                <label for="budget">Orçamento estimado</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" id="message" name="message"
                                    style="height: 160px" required></textarea>
                                <label for="message">
                                    Descreva sua necessidade, ambiente atual, expectativas ou dúvidas
                                </label>
                            </div>
                        </div>

                        <!-- Botão -->
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn btn-primary rounded-pill py-3 px-5">
                                Solicitar Cotação
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- Cotação End -->

            </div>
        </div>
    </div>
</div>
<!-- Cotação End -->
<div class="modal fade" id="responseModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Aviso</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="modalMessage"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
          OK
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Seu JS -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/inputmask@5.0.8/dist/inputmask.min.js"></script>
<script src="assets/js/cotacao.js"></script>

      <?php include ('_footer.php')?>


    </body>

</html>