<?php
// Inicia a sessão e inclui a conexão

include ('assets/conect/dbhelpdesk.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include ('_header.php')?>
<body>
    <?php include ('_navbar.php')?>

    <div class="container-fluid bg-light py-5">
        <div class="container text-start">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold text-dark mb-0">Painel Administrativo</h2>
                    <p class="text-muted mb-0">Gestão Conecta TI</p>
                </div>
                <a href="logout-admin" class="btn btn-danger rounded-pill px-4 shadow-sm">
                    <i class="fas fa-sign-out-alt me-2"></i>Sair
                </a>
            </div>

            <?php if($mensagem): ?>
                <div class="alert alert-success alert-dismissible fade show mb-4 border-0 shadow-sm" role="alert">
                    <i class="fas fa-check-circle me-2"></i> <?= $mensagem ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <ul class="nav nav-pills nav-justified mb-5 shadow-sm rounded bg-white p-2" id="adminTab" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active rounded-pill" data-bs-toggle="tab" data-bs-target="#tab-boletos" type="button"><i class="fas fa-file-invoice-dollar me-2"></i>Financeiro</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link rounded-pill" data-bs-toggle="tab" data-bs-target="#tab-chamados" type="button"><i class="fas fa-headset me-2"></i>Chamados</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link rounded-pill" data-bs-toggle="tab" data-bs-target="#tab-contratos" type="button"><i class="fas fa-file-contract me-2"></i>Contratos</button>
                </li>
            </ul>

            <div class="tab-content">
                
                <div class="tab-pane fade show active" id="tab-boletos">
                    <div class="bg-white rounded p-5 shadow-sm border-top border-primary border-5">
                        <h4 class="mb-4 text-primary fw-bold">Lançar Cobrança (Cora / Pix)</h4>
                        <form method="POST" onsubmit="this.btnBoleto.disabled=true;">
                            <input type="hidden" name="cadastrar_boleto" value="1">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Selecionar Cliente</label>
                                    <select name="cliente_id" class="form-select shadow-sm" required>
                                        <option value="">Selecione o cliente...</option>
                                        <?php foreach($clientes as $cl): ?>
                                            <option value="<?= $cl['id'] ?>"><?= $cl['empresa_nome'] ?> (<?= $cl['nome_usuario'] ?>)</option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label fw-bold">Vencimento</label>
                                    <input type="date" name="vencimento" class="form-control shadow-sm" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label fw-bold">Valor Total (R$)</label>
                                    <input type="number" step="0.01" name="valor" class="form-control shadow-sm" placeholder="0,00" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Descrição do Serviço</label>
                                <input type="text" name="descricao" class="form-control shadow-sm" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold text-primary">Pix Copia e Cola (Cora)</label>
                                <textarea name="pix_copia_cola" class="form-control shadow-sm" rows="2"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold text-danger">URL do PDF</label>
                                <input type="url" name="url_pdf" class="form-control shadow-sm">
                            </div>
                            <button type="submit" name="btnBoleto" class="btn btn-primary px-5 py-2 rounded-pill fw-bold shadow">Registrar Cobrança</button>
                        </form>
                    </div>
                </div>

                <div class="tab-pane fade" id="tab-chamados">
                    <div class="bg-white rounded p-5 shadow-sm border-top border-info border-5">
                        <h4 class="mb-4 text-info fw-bold">Gerenciar Chamados</h4>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Empresa</th>
                                        <th>Assunto</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($chamados_gerais as $ch): ?>
                                    <tr>
                                        <td><strong><?= $ch['empresa_nome'] ?></strong></td>
                                        <td><?= $ch['assunto'] ?></td>
                                        <td><span class="badge bg-<?= $ch['status'] == 'Aberto' ? 'danger' : ($ch['status'] == 'Em Análise' ? 'warning text-dark' : 'success') ?>"><?= $ch['status'] ?></span></td>
                                        <td><button class="btn btn-sm btn-primary rounded-pill px-3 shadow-sm" onclick="abrirModalChamado('<?= $ch['id'] ?>', '<?= $ch['empresa_nome'] ?>', '<?= $ch['assunto'] ?>', '<?= addslashes(str_replace(["\r", "\n"], ' ', $ch['mensagem'])) ?>', '<?= $ch['status'] ?>')">Ver</button></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="tab-contratos">
                    <div class="row g-4">
                        <div class="col-lg-5">
                            <div class="bg-white rounded p-4 shadow-sm border-top border-dark border-5 mb-4">
                                <h5 class="mb-3 text-dark fw-bold"><i class="fas fa-file-upload me-2"></i>Registrar Contrato</h5>
                                <form method="POST" onsubmit="this.btnContrato.disabled=true;">
                                    <input type="hidden" name="cadastrar_contrato" value="1">
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Cliente</label>
                                        <select name="cliente_id" class="form-select form-select-sm shadow-sm" required>
                                            <option value="">Selecione...</option>
                                            <?php foreach($clientes as $cl): ?>
                                                <option value="<?= $cl['id'] ?>"><?= $cl['empresa_nome'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Título</label>
                                        <input type="text" name="titulo" class="form-control form-control-sm shadow-sm" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label class="form-label small fw-bold">Vigência</label>
                                            <input type="text" name="vigencia" class="form-control form-control-sm shadow-sm" placeholder="Ex: 12 meses">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label class="form-label small fw-bold">Valor (R$)</label>
                                            <input type="number" step="0.01" name="valor" class="form-control form-control-sm shadow-sm" placeholder="0,00" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">Link PDF (opcional)</label>
                                        <input type="text" name="arquivo_url" class="form-control form-control-sm shadow-sm">
                                    </div>
                                    <button type="submit" name="btnContrato" class="btn btn-dark w-100 btn-sm shadow-sm fw-bold">Salvar Registro</button>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="bg-white rounded p-4 shadow-sm border-top border-dark border-5 h-100">
                                <h5 class="mb-3 text-dark fw-bold"><i class="fas fa-copy me-2"></i>Histórico</h5>
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover align-middle">
                                        <thead class="table-light small">
                                            <tr>
                                                <th>Empresa</th>
                                                <th>Valor</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody class="small">
                                            <?php foreach($contratos_gerais as $con): ?>
                                            <tr>
                                                <td><?= $con['empresa_nome'] ?></td>
                                                <td class="fw-bold text-primary">R$ <?= number_format($con['valor'], 2, ',', '.') ?></td>
                                                <td>
                                                    <?php if($con['status_contrato'] == 'Assinado'): ?>
                                                        <span class="badge bg-success">Assinado</span>
                                                    <?php else: ?>
                                                        <a href="assinar-contrato?cliente_id=<?= $con['cliente_id'] ?>&id_contrato=<?= $con['id'] ?>&servico=<?= urlencode($con['titulo']) ?>" class="btn btn-sm btn-outline-primary py-0">Assinar</a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalGerenciarChamado" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title fw-bold">Detalhes do Chamado #<span id="display_id"></span></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST">
                    <div class="modal-body p-4 text-start">
                        <input type="hidden" name="chamado_id" id="input_chamado_id">
                        <input type="hidden" name="alterar_status_chamado" value="1">
                        <h6 id="display_empresa" class="fw-bold mb-3"></h6>
                        <div class="p-3 bg-light rounded border small mb-3" id="display_mensagem" style="white-space: pre-wrap;"></div>
                        <select name="novo_status" id="select_status" class="form-select border-info shadow-sm">
                            <option value="Aberto">Aberto</option>
                            <option value="Em Análise">Em Análise</option>
                            <option value="Concluído">Concluído</option>
                        </select>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="submit" class="btn btn-info text-white px-4 shadow">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    function abrirModalChamado(id, empresa, assunto, mensagem, status) {
        document.getElementById('display_id').innerText = id;
        document.getElementById('display_empresa').innerText = empresa;
        document.getElementById('display_mensagem').innerText = mensagem;
        document.getElementById('input_chamado_id').value = id;
        document.getElementById('select_status').value = status;
        new bootstrap.Modal(document.getElementById('modalGerenciarChamado')).show();
    }
    </script>
    <?php include ('_footer.php')?>
</body>
</html>