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
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Contate-nos</h4>
                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-primary">Contato</li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->


       <!-- Contact Start -->
<div class="container-fluid contact bg-light py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Fale Conosco</h4>
            <h1 class="display-4 mb-4">
                Entre em contato com a ConectaTI Solutions
            </h1>
       
        </div>

        <div class="row g-5">
            <!-- Imagem -->
            <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="contact-img d-flex justify-content-center">
                    <div class="contact-img-inner">
                        <img src="img/contact-img.png" class="img-fluid w-100" alt="Contato ConectaTI Solutions">
                    </div>
                </div>
            </div>

            <!-- Formulário -->
            <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.4s">
                <div>
                    <h4 class="text-primary">Envie sua Mensagem</h4>
                    <p class="mb-4">
                        Precisa de suporte técnico, infraestrutura de TI, desenvolvimento de sistemas ou consultoria em segurança da informação?
                        Preencha o formulário abaixo e nossa equipe entrará em contato rapidamente.
                    </p>
<form id="contactForm">
    <div class="row g-3">

        <div class="col-lg-12 col-xl-6">
            <div class="form-floating">
                <input type="text" class="form-control border-0"
                       id="name" name="name" placeholder="Seu Nome" required>
                <label for="name">Seu Nome</label>
            </div>
        </div>

        <div class="col-lg-12 col-xl-6">
            <div class="form-floating">
                <input type="email" class="form-control border-0"
                       id="email" name="email" placeholder="Seu E-mail" required>
                <label for="email">Seu E-mail</label>
            </div>
        </div>

        <div class="col-lg-12 col-xl-6">
            <div class="form-floating">
                <input type="tel" class="form-control border-0"
                       id="phone" name="phone" placeholder="Telefone">
                <label for="phone">Telefone / WhatsApp</label>
            </div>
        </div>

        <div class="col-lg-12 col-xl-6">
            <div class="form-floating">
                <input type="text" class="form-control border-0"
                       id="project" name="project" placeholder="Serviço de Interesse">
                <label for="project">Serviço de Interesse</label>
            </div>
        </div>

        <div class="col-12">
            <div class="form-floating">
                <input type="text" class="form-control border-0"
                       id="subject" name="subject" placeholder="Assunto">
                <label for="subject">Assunto</label>
            </div>
        </div>

        <div class="col-12">
            <div class="form-floating">
                <textarea class="form-control border-0"
                          id="message" name="message"
                          placeholder="Descreva sua necessidade"
                          style="height:120px" required></textarea>
                <label for="message">Mensagem</label>
            </div>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary w-100 py-3">
                Enviar Mensagem
            </button>
        </div>

    </div>
</form>

                </div>
            </div>

            <!-- Informações de Contato -->
            <div class="col-12">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="contact-add-item">
                            <div class="contact-icon text-primary mb-4">
                                <i class="fas fa-map-marker-alt fa-2x"></i>
                            </div>
                            <div>
                                <h4>Localização</h4>
                                <p class="mb-0">Atendimento em todo o Brasil</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="contact-add-item">
                            <div class="contact-icon text-primary mb-4">
                                <i class="fas fa-envelope fa-2x"></i>
                            </div>
                            <div>
                                <h4>E-mail</h4>
                                <p class="mb-0">contato@conectatisolutions.com.br</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="contact-add-item">
                            <div class="contact-icon text-primary mb-4">
                                <i class="fa fa-phone-alt fa-2x"></i>
                            </div>
                            <div>
                                <h4>Telefone</h4>
                                <p class="mb-0">(22) 98121-7821</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.8s">
                        <div class="contact-add-item">
                            <div class="contact-icon text-primary mb-4">
                                <i class="fas fa-globe fa-2x"></i>
                            </div>
                            <div>
                                <h4>Website</h4>
                                <p class="mb-0">www.conectatisolutions.com.br</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Contact End -->
<!-- Modal Aviso -->
<div class="modal fade" id="responseModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Aviso</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="modalMessage">
        <!-- mensagem dinâmica -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
          OK
        </button>
      </div>
    </div>
  </div>
</div>



        <!-- Footer Start -->
         <script src="assets/js/contato.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


       <?php include ('_footer.php')?>
    </body>

</html>