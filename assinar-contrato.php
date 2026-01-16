<?php


include ('assets/conect/dbcliente.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Captura os dados enviados via URL
$cliente_id  = isset($_GET['cliente_id']) ? $_GET['cliente_id'] : null;
$id_contrato = isset($_GET['id_contrato']) ? $_GET['id_contrato'] : null;

// Se não houver cliente ou contrato, volta para a área do cliente
if (!$cliente_id || !$id_contrato) {
    header("Location: area-cliente");
    exit();
}

// 1. Busca os detalhes específicos deste CONTRATO
$stmtCon = $pdo->prepare("SELECT * FROM contratos WHERE id = ? AND cliente_id = ?");
$stmtCon->execute([$id_contrato, $cliente_id]);
$contrato = $stmtCon->fetch();

// 2. Busca os detalhes do CLIENTE
$stmtCli = $pdo->prepare("SELECT * FROM clientes WHERE id = ?");
$stmtCli->execute([$cliente_id]);
$cliente = $stmtCli->fetch();

if (!$contrato || !$cliente) {
    die("Erro: Dados do contrato ou cliente não encontrados.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include ('_header.php')?>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

<style>
    body { font-family: 'Roboto', sans-serif; }
    
    .contract-body {
        color: #2c3e50;
        font-size: 15px;
        line-height: 1.8;
        text-align: justify;
    }
    
    .clause-title {
        font-weight: 700;
        text-transform: uppercase;
        color: #1a237e;
        margin-top: 30px;
        margin-bottom: 10px;
        display: block;
        border-bottom: 1px solid #e0e0e0;
        padding-bottom: 5px;
    }

    .contract-party {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        border-left: 5px solid #0d6efd;
        margin-bottom: 25px;
    }

    .signature-wrapper {
        background: #ffffff;
        border: 2px dashed #0d6efd;
        border-radius: 12px;
        position: relative;
        touch-action: none;
        box-shadow: inset 0 0 10px rgba(0,0,0,0.02);
    }

    canvas {
        width: 100%;
        height: 200px;
        cursor: crosshair;
    }

    .legal-badge {
        font-size: 11px;
        background: #e8f5e9;
        color: #2e7d32;
        padding: 5px 12px;
        border-radius: 20px;
        font-weight: bold;
    }

    @media print { .no-print { display: none; } }
</style>

<body class="bg-light">
    <?php include ('_navbar.php')?>

   <div class="container-fluid py-5">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="card shadow-lg border-0 overflow-hidden">
                    <div class="bg-dark p-4 d-flex justify-content-between align-items-center">
                        <div class="text-white">
                            <h4 class="mb-0 text-white fw-bold">CONTRATO DE PRESTAÇÃO DE SERVIÇOS DIGITAIS</h4>
                            <div class="mt-1">
                                <span class="legal-badge text-uppercase">Validade Jurídica: MP 2.200-2/2001</span>
                            </div>
                        </div>
                        <img src="img/logo.png" alt="Logo ConectaTI" style="height: 45px; filter: brightness(0) invert(1);">
                    </div>

                    <div class="card-body p-4 p-md-5 bg-white contract-body">

                        <div class="contract-party">
                            <strong>CONTRATADA:</strong> <strong>CONECTATI SOLUTIONS LTDA</strong>, pessoa jurídica de direito privado, CNPJ nº 12.345.678/0001-90, com sede administrativa em Alagoinhas, Bahia.<br><br>
                            <strong>CONTRATANTE:</strong> <strong><?= $cliente['empresa_nome'] ?></strong>, devidamente inscrito(a) sob o CNPJ/CPF nº <?= $cliente['cnpj'] ?>, e-mail <?= $cliente['email'] ?>, representado neste ato por <?= $cliente['nome_usuario'] ?>.
                        </div>

                        <p>As partes acima identificadas, de comum acordo, estabelecem as cláusulas e condições que regerão este contrato de prestação de serviços de Tecnologia da Informação:</p>

                        <!-- CLÁUSULAS -->
                        <span class="clause-title">Cláusula 1ª - Do Objeto</span>
                        <p>O presente contrato tem como objeto a prestação dos serviços de <strong><?= $contrato['titulo'] ?></strong>, englobando assessoria técnica, monitoramento de sistemas, suporte especializado, manutenção, desenvolvimento de soluções digitais e quaisquer atividades correlatas definidas no plano contratado.</p>

                        <span class="clause-title">Cláusula 2ª - Das Obrigações da Contratada</span>
                        <ul>
                            <li>Executar os serviços com ética, profissionalismo e pessoal qualificado.</li>
                            <li>Manter os sistemas monitorados, atualizados e disponíveis conforme SLA contratado.</li>
                            <li>Garantir a confidencialidade de informações e dados do contratante.</li>
                            <li>Notificar o contratante sobre qualquer evento crítico ou incidente de segurança.</li>
                            <li>Prestar suporte técnico e treinamento quando aplicável.</li>
                        </ul>

                        <span class="clause-title">Cláusula 3ª - Das Obrigações da Contratante</span>
                        <ul>
                            <li>Fornecer acessos, credenciais e informações necessárias para execução dos serviços.</li>
                            <li>Efetuar os pagamentos na data acordada.</li>
                            <li>Cooperar com testes, auditorias e manutenções, evitando uso indevido do sistema.</li>
                        </ul>

                        <span class="clause-title">Cláusula 4ª - Valores, Pagamento e Vigência</span>
                        <ul>
                            <li>O valor total será de <strong>R$ <?= number_format($contrato['valor'],2,',','.') ?></strong>.</li>
                            <li>Forma de pagamento: [mensalidade/parcelas], conforme plano contratado.</li>
                            <li>Vigência do contrato: <strong><?= $contrato['vigencia'] ?></strong>, podendo ser renovado automaticamente.</li>
                            <li>Multa por atraso: 2% do valor e juros de 1% ao mês.</li>
                        </ul>

                        <span class="clause-title">Cláusula 5ª - Confidencialidade e LGPD</span>
                        <p>As partes comprometem-se a:</p>
                        <ul>
                            <li>Manter sigilo absoluto sobre dados sensíveis e estratégicos.</li>
                            <li>Não divulgar informações a terceiros sem consentimento por escrito.</li>
                            <li>Cumprir integralmente a Lei nº 13.709/2018 (LGPD).</li>
                        </ul>

                        <span class="clause-title">Cláusula 6ª - Propriedade Intelectual</span>
                        <p>Todo material, software, relatórios ou ferramentas desenvolvidos pela CONTRATADA permanecem como propriedade intelectual da CONTRATADA, salvo quando houver transferência expressa mediante contrato específico.</p>

                        <span class="clause-title">Cláusula 7ª - SLA e Suporte Técnico</span>
                        <p>O suporte técnico e o SLA serão prestados conforme acordado no plano contratado, incluindo:</p>
                        <ul>
                            <li>Tempo de resposta definido por prioridade.</li>
                            <li>Disponibilidade mínima de 99,5% mensal.</li>
                            <li>Documentação de incidentes e ações corretivas.</li>
                        </ul>

                        <span class="clause-title">Cláusula 8ª - Rescisão e Penalidades</span>
                        <ul>
                            <li>Rescisão mediante aviso prévio de 30 dias.</li>
                            <li>Descumprimento de cláusulas autoriza rescisão imediata.</li>
                            <li>Multas e indenizações podem ser aplicadas em caso de danos comprovados.</li>
                        </ul>

                        <span class="clause-title">Cláusula 9ª - Responsabilidade Civil</span>
                        <p>A CONTRATADA não será responsável por perdas indiretas, lucros cessantes, interrupções por terceiros ou falhas de hardware/software não fornecido por ela.</p>

                        <span class="clause-title">Cláusula 10ª - Legislação e Foro</span>
                        <p>O presente contrato será regido pelas leis brasileiras, elegendo-se o foro da comarca de Alagoinhas/BA para dirimir dúvidas ou conflitos, com renúncia a qualquer outro.</p>

                        <span class="clause-title">Cláusula 11ª - Disposições Gerais</span>
                        <ul>
                            <li>Alterações contratuais só serão válidas se por escrito e assinadas digitalmente.</li>
                            <li>Se qualquer cláusula for considerada inválida, as demais permanecem válidas.</li>
                            <li>Contrato eletrônico, com assinatura digital válida legalmente.</li>
                        </ul>

                        <div class="mt-5 text-center">
                            <p class="mb-0 fw-bold">Alagoinhas/BA, <?= date('d/m/Y') ?>.</p>
                            <small class="text-muted">Documento gerado eletronicamente através do IP: <?= $_SERVER['REMOTE_ADDR'] ?></small>
                        </div>

                        <div class="mt-5 pt-4 border-top no-print">
                            <div class="row align-items-center">
                                <div class="col-md-7">
                                    <h6 class="fw-bold mb-3"><i class="fas fa-signature me-2 text-primary"></i>Assinatura Digital do Contratante</h6>
                                    <div class="signature-wrapper">
                                        <canvas id="signatureCanvas"></canvas>
                                        <button class="btn btn-sm btn-light text-danger position-absolute top-0 end-0 m-2 shadow-sm" onclick="limparAssinatura()">
                                            <i class="fas fa-eraser"></i> Limpar Campo
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-5 text-center text-md-end mt-4">
<button class="btn btn-primary btn-lg rounded-pill px-5 shadow-lg fw-bold" onclick="abrirModalConfirmacao()">
    FINALIZAR CONTRATO <i class="fas fa-check-circle ms-2"></i>
</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


    <?php include ('_footer.php')?>

    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
    <script>
        const canvas = document.getElementById('signatureCanvas');
        const signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgba(255, 255, 255, 0)',
            penColor: 'rgb(26, 35, 126)' // Cor Azul Escuro para a caneta
        });

        function resizeCanvas() {
            const ratio = Math.max(window.devicePixelRatio || 1, 1);
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d").scale(ratio, ratio);
            signaturePad.clear(); 
        }

        window.addEventListener("resize", resizeCanvas);
        setTimeout(resizeCanvas, 200);

        function limparAssinatura() { signaturePad.clear(); }

        // 1. Apenas valida e abre o Modal
function abrirModalConfirmacao() {
    if (signaturePad.isEmpty()) {
        alert('Por favor, faça sua assinatura antes de finalizar.');
        return;
    }
    // Abre o modal do Bootstrap
    var meuModal = new bootstrap.Modal(document.getElementById('modalConfirmarContrato'));
    meuModal.show();
}

// 2. É chamada pelo botão "Sim" dentro do Modal
function submitAssinaturaReal() {
    // Desabilita o botão para evitar cliques duplos
    const btn = document.getElementById('btnEnviar');
    btn.disabled = true;
    btn.innerHTML = 'Processando...';

    // Pega a imagem do canvas
    const assinaturaBase64 = signaturePad.toDataURL('image/png');
    
    // Cria o formulário oculto e envia
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = 'processar-assinatura.php';

    // Adiciona os campos necessários (IDs e Imagem)
    const fields = {
        'assinatura_data': assinaturaBase64,
        'id_contrato': '<?= $id_contrato ?>',
        'cliente_id': '<?= $cliente_id ?>'
    };

    for (const key in fields) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = key;
        input.value = fields[key];
        form.appendChild(input);
    }

    document.body.appendChild(form);
    form.submit();
}
    </script>
    <div class="modal fade" id="modalConfirmarContrato" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold">Confirmar Assinatura Digital</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4 text-center">
                <i class="fas fa-file-signature fa-3x text-success mb-3"></i>
                <h5 class="fw-bold">Deseja assinar este documento?</h5>
                <p class="text-muted">Ao confirmar, sua assinatura será vinculada a este contrato com validade jurídica.</p>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary rounded-pill px-4 fw-bold" id="btnEnviar" onclick="submitAssinaturaReal()">
                    Sim, Confirmar
                </button>
            </div>
        </div>
    </div>
</div>
</body>
</html>