<?php
include ('assets/conect/dbcliente.php')?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include ('_header.php')?>
<body>
    <?php include ('_navbar.php')?>

    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row g-4 text-start">
                
                <div class="col-lg-3">
                    <div class="bg-white rounded p-4 shadow-sm wow fadeInUp">
                        <div class="text-center mb-4">
                            <i class="fas fa-user-circle display-3 text-primary"></i>
                            <h5 class="mt-2"><?= $_SESSION['cliente_nome'] ?></h5>
                            <p class="small text-muted"><?= $_SESSION['cliente_empresa'] ?></p>
                        </div>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
                            <button class="nav-link active mb-2 text-start" data-bs-toggle="pill" data-bs-target="#nav-resumo" type="button"><i class="fas fa-tachometer-alt me-2"></i> Painel Geral</button>
                            <button class="nav-link mb-2 text-start" data-bs-toggle="pill" data-bs-target="#nav-financeiro" type="button"><i class="fas fa-barcode me-2"></i> Financeiro</button>
                            <button class="nav-link mb-2 text-start" data-bs-toggle="pill" data-bs-target="#nav-chamados" type="button"><i class="fas fa-headset me-2"></i> Suporte</button>
                            <button class="nav-link mb-2 text-start" data-bs-toggle="pill" data-bs-target="#nav-contratos" type="button"><i class="fas fa-file-contract me-2"></i> Contratos</button>
                            <hr>
                            <a href="logout.php" class="nav-link text-danger text-start"><i class="fas fa-sign-out-alt me-2"></i> Sair</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 text-start">
                    <div class="tab-content" id="v-pills-tabContent">
                        
                        <div class="tab-pane fade show active" id="nav-resumo">
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <div class="card border-0 shadow-sm bg-primary p-4 text-center text-white">
                                        <h6 class="text-white opacity-75">Boletos Pendentes</h6>
                                        <h2 class="display-4 fw-bold text-white mb-0"><?= $countBoletos ?></h2>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border-0 shadow-sm bg-info p-4 text-center text-white">
                                        <h6 class="text-white opacity-75">Chamados Ativos</h6>
                                        <h2 class="display-4 fw-bold text-white mb-0"><?= $countChamados ?></h2>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border-0 shadow-sm bg-dark p-4 text-center text-white">
                                        <h6 class="text-white opacity-75">Contratos Ativos</h6>
                                        <h2 class="display-4 fw-bold text-white mb-0"><?= $countContratos ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-financeiro">
                            <div class="bg-white rounded p-4 shadow-sm">
                                <h5 class="mb-4 text-dark font-weight-bold">Financeiro / Boletos</h5>
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Vencimento</th>
                                                <th>Descrição</th>
                                                <th>Valor</th>
                                                <th>Status</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($listBoletos as $b): ?>
                                            <tr>
                                                <td class="text-dark"><?= date('d/m/Y', strtotime($b['vencimento'])) ?></td>
                                                <td class="text-dark"><?= $b['descricao'] ?></td>
                                                <td class="text-dark fw-bold">R$ <?= number_format($b['valor'], 2, ',', '.') ?></td>
                                                <td><span class="badge bg-<?= $b['status']=='Pago'?'success':'warning text-dark' ?>"><?= $b['status'] ?></span></td>
                                                <td>
                                                    <?php if($b['status'] != 'Pago'): ?>
                                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalPix" onclick="gerarQR('<?= trim($b['pix_copia_cola']) ?>', '<?= number_format($b['valor'], 2, ',', '.') ?>')">
                                                            <i class="fab fa-pix"></i> Pix
                                                        </button>
                                                        <a href="<?= $b['url_pdf'] ?>" target="_blank" class="btn btn-sm btn-danger">
                                                            <i class="fas fa-file-pdf"></i> PDF
                                                        </a>
                                                    <?php else: ?>
                                                        <span class="text-success small fw-bold"><i class="fas fa-check"></i> Pago</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-chamados">
                            <div class="bg-white rounded p-4 shadow-sm">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="mb-0">Suporte Técnico</h5>
                                    <button class="btn btn-primary rounded-pill btn-sm" data-bs-toggle="collapse" data-bs-target="#boxNovoChamado">Novo Chamado</button>
                                </div>
                                <div class="collapse mb-4" id="boxNovoChamado">
                                    <form method="POST" class="p-3 border rounded bg-light">
                                        <input type="hidden" name="acao" value="abrir_chamado">
                                        <div class="mb-3">
                                            <label class="form-label small fw-bold">Assunto</label>
                                            <input type="text" name="assunto" class="form-control" required placeholder="Ex: Erro no acesso ao sistema">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label small fw-bold">Descrição</label>
                                            <textarea name="mensagem" class="form-control" rows="3" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100 fw-bold">Enviar</button>
                                    </form>
                                </div>
                                <div class="list-group">
                                    <?php foreach($listChamados as $c): ?>
                                    <div class="list-group-item p-3 border-start border-4 <?= $c['status'] == 'Concluído' ? 'border-success' : 'border-primary' ?>">
                                        <div class="d-flex w-100 justify-content-between align-items-center">
                                            <h6 class="mb-1">#<?= $c['id'] ?> - <?= $c['assunto'] ?></h6>
                                            <div class="dropdown">
                                                <button class="btn btn-sm dropdown-toggle badge bg-<?= $c['status'] == 'Concluído' ? 'success' : ($c['status'] == 'Aberto' ? 'danger' : 'warning text-dark') ?>" type="button" data-bs-toggle="dropdown">
                                                    <?= $c['status'] ?>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="?acao=status&id=<?= $c['id'] ?>&novo=Concluído">Encerrar</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="mb-1 small text-muted"><?= $c['mensagem'] ?></p>
                                        <small class="text-muted">Data: <?= date('d/m/Y H:i', strtotime($c['data_abertura'])) ?></small>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                       <div class="tab-pane fade" id="nav-contratos">
   <div class="bg-white rounded p-4 shadow-sm text-start">
    <h5 class="mb-4 text-dark font-weight-bold">
        <i class="fas fa-file-contract me-2 text-primary"></i>Contratos e Documentos
    </h5>

    <div class="mb-5">
        <h6 class="text-uppercase text-muted small fw-bold mb-3 text-warning">
            <i class="fas fa-exclamation-circle me-1"></i>Aguardando sua Assinatura
        </h6>
        <div class="row g-3">
            <?php 
            $temPendente = false;
            foreach($listContratos as $con): 
                // Filtra apenas os que o admin criou mas o cliente ainda não assinou
                if ($con['status_contrato'] == 'Pendente'): 
                    $temPendente = true;
            ?>
                <div class="col-md-6">
                    <div class="border border-warning rounded p-3 d-flex align-items-center justify-content-between bg-white shadow-sm" style="border-left: 5px solid #ffc107 !important;">
                        <div>
                            <h6 class="mb-1 text-dark fw-bold"><?= $con['titulo'] ?></h6>
                            <span class="badge bg-warning text-dark small">Assinatura Pendente</span>
                        </div>
                       <a href="assinar-contrato?cliente_id=<?= $cliente_id ?>&id_contrato=<?= $con['id'] ?>&servico=<?= urlencode($con['titulo']) ?>" 
   class="btn btn-primary btn-sm rounded-pill px-4 shadow-sm fw-bold">
    Assinar Agora <i class="fas fa-pen-nib ms-1"></i>
</a>
                    </div>
                </div>
            <?php 
                endif; 
            endforeach; 

            if (!$temPendente): 
            ?>
                <div class="col-12">
                    <p class="text-muted small ps-2 italic">Não há contratos pendentes de assinatura no momento.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <hr class="my-4">

    <div>
        <h6 class="text-uppercase text-muted small fw-bold mb-3">Documentos e Contratos Firmados</h6>
        <div class="row g-3">
    <?php 
    $temFirmado = false;
    foreach($listContratos as $con): 
        // Mostra os que já foram assinados OU os que foram enviados como link de arquivo
        if ($con['status_contrato'] == 'Assinado' || !empty($con['arquivo_url'])): 
            $temFirmado = true;
    ?>
        <div class="col-md-6">
            <div class="border rounded p-3 d-flex align-items-center justify-content-between bg-light shadow-sm transition-hover">
                <div>
                    <h6 class="mb-1 text-dark fw-bold"><?= $con['titulo'] ?></h6>
                    <div class="d-flex align-items-center">
                        <small class="text-muted">
                            <i class="far fa-calendar-alt me-1"></i>
                            <?php if($con['status_contrato'] == 'Assinado'): ?>
                                Assinado em: <?= date('d/m/Y', strtotime($con['data_assinatura'])) ?>
                            <?php else: ?>
                                Vigência: <?= $con['vigencia'] ?>
                            <?php endif; ?>
                        </small>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <?php if($con['status_contrato'] == 'Assinado'): ?>
                        <div class="text-success text-center me-2">
                            <i class="fas fa-check-circle fs-4"></i>
                            <span class="d-block" style="font-size: 9px; font-weight: bold; text-transform: uppercase;">Validado</span>
                        </div>
                        
                        <a href="<?= $con['arquivo_url'] ?>" target="_blank" class="btn btn-danger btn-sm shadow-sm px-3" title="Baixar Contrato assinado">
                            <i class="fas fa-file-pdf me-1"></i> PDF
                        </a>
                    <?php else: ?>
                        <a href="<?= $con['arquivo_url'] ?>" target="_blank" class="btn btn-outline-danger btn-sm border-0 d-flex flex-column align-items-center">
                            <i class="fas fa-file-pdf fs-4"></i>
                            <span class="small" style="font-size: 10px;">Visualizar</span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php 
        endif; 
    endforeach; 

    if (!$temFirmado): 
    ?>
        <div class="col-12 text-center py-3 text-muted small">Nenhum documento arquivado.</div>
    <?php endif; ?>
</div>
    </div>
</div>
</div>

<style>
/* Efeito de hover para os cards de contrato */
.transition-hover:hover {
    border-color: #0d6efd !important;
    background-color: #fff !important;
    transition: 0.3s;
    transform: translateY(-2px);
}
</style>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalPix" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 350px;">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title w-100 text-dark fw-bold text-center">Pagamento via Pix</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center p-4">
                    <p class="mb-2 text-dark">Valor: <strong class="text-primary">R$ <span id="pixValorDisplay"></span></strong></p>
                    <div class="bg-white p-3 mb-3 rounded border shadow-sm mx-auto" style="width: 220px; height: 220px; display: flex; align-items: center; justify-content: center;">
                        <img id="imgQR" src="" alt="QR Code" class="img-fluid" style="display: none;">
                        <div id="loaderPix" class="spinner-border text-primary" role="status"><span class="visually-hidden">...</span></div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" id="pixInput" class="form-control form-control-sm" readonly>
                        <button class="btn btn-primary btn-sm" onclick="copiarTexto(document.getElementById('pixInput').value, 'Pix')">Copiar</button>
                    </div>
                    <p class="text-muted mb-0" style="font-size: 11px;">Escaneie o QR Code ou use o Copia e Cola no seu banco.</p>
                </div>
            </div>
        </div>
    </div>

    <?php include ('_footer.php')?>

   <script>
function gerarQR(payload, valor) {
    const img = document.getElementById('imgQR');
    const loader = document.getElementById('loaderPix');
    const input = document.getElementById('pixInput');
    const displayValor = document.getElementById('pixValorDisplay');

    if(!payload || payload === "" || payload === "0") {
        alert("Aguardando código Pix do financeiro.");
        return;
    }

    // Limpa espaços e prepara visual
    const payloadLimpo = payload.trim();
    img.style.display = 'none';
    loader.style.display = 'inline-block';
    displayValor.innerText = valor;
    input.value = payloadLimpo;

    // --- NOVA API QUE FUNCIONA (QR SERVER) ---
    // Tamanho 300x300
    const qrUrl = "https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=" + encodeURIComponent(payloadLimpo);
    
    img.src = qrUrl;

    // Quando a imagem terminar de baixar, esconde o spinner e mostra o QR Code
    img.onload = function() {
        loader.style.display = 'none';
        img.style.display = 'block';
    };

    // Caso a API falhe, avisa o usuário
    img.onerror = function() {
        loader.style.display = 'none';
        alert("Erro ao carregar QR Code. Tente usar o botão Copiar.");
    };
}

function copiarTexto(texto, tipo) {
    if (!texto) return;
    navigator.clipboard.writeText(texto).then(() => {
        alert(tipo + " copiado com sucesso! Cole no app do seu banco.");
    });
}
</script>
</body>
</html>