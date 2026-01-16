<?php
// processar-assinatura.php
require 'vendor/autoload.php'; 

use Dompdf\Dompdf;
use Dompdf\Options;

include ('assets/conect/dbcliente.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['assinatura_data'])) {
    
    $id_contrato     = $_POST['id_contrato'];
    $cliente_id      = $_POST['cliente_id'];
    $assinatura_img  = $_POST['assinatura_data']; 
    $ip_assinante    = $_SERVER['REMOTE_ADDR'];

    try {
        // 1. BUSCA DADOS COMPLETOS PARA O PDF
        $stmt = $pdo->prepare("
            SELECT co.*, cl.empresa_nome, cl.cnpj, cl.nome_usuario, cl.email 
            FROM contratos co 
            JOIN clientes cl ON co.cliente_id = cl.id 
            WHERE co.id = ? AND co.cliente_id = ?
        ");
        $stmt->execute([$id_contrato, $cliente_id]);
        $dados = $stmt->fetch();

        if (!$dados) { die("Erro: Contrato não localizado."); }

        // 2. MONTAGEM DO HTML PROFISSIONAL COM CLÁUSULAS COMPLETAS
        $html = '
        <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <style>
                body { font-family: "Helvetica", sans-serif; color: #2c3e50; line-height: 1.6; font-size: 13px; margin: 0; padding: 0; }
                .header { background-color: #212529; color: white; padding: 30px; text-align: left; }
                .header h4 { margin: 0; font-size: 18px; text-transform: uppercase; }
                .legal-badge { font-size: 10px; background: #e8f5e9; color: #2e7d32; padding: 3px 10px; border-radius: 10px; font-weight: bold; text-transform: uppercase; }
                .container { padding: 40px; }
                .contract-party { background: #f8f9fa; padding: 20px; border-left: 5px solid #0d6efd; margin-bottom: 25px; }
                .clause-title { font-weight: bold; text-transform: uppercase; color: #1a237e; margin-top: 25px; display: block; border-bottom: 1px solid #e0e0e0; padding-bottom: 5px; }
                .content { text-align: justify; }
                .content ul { margin-left: 20px; }
                .signature-section { text-align: center; margin-top: 50px; }
                .signature-img { width: 250px; border-bottom: 1px solid #333; }
                .footer { font-size: 10px; color: #7f8c8d; text-align: center; margin-top: 50px; border-top: 1px solid #eee; padding-top: 10px; }
                .stamp { color: #2e7d32; font-weight: bold; border: 2px solid #2e7d32; display: inline-block; padding: 5px 15px; margin-top: 10px; text-transform: uppercase; }
                h1, h2, h3, h4, h5, h6 { margin: 0; }
                p { margin: 5px 0 10px 0; }
            </style>
        </head>
        <body>
            <div class="header">
                <h4>Contrato de Prestação de Serviços Digitais</h4>
                <div style="margin-top: 8px;">
                    <span class="legal-badge">Validade Jurídica: MP 2.200-2/2001</span>
                </div>
                <div style="font-size: 10px; margin-top: 5px; opacity: 0.8;">Protocolo Digital: #'.date('Ymd').$id_contrato.'</div>
            </div>

            <div class="container">
                <div class="contract-party">
                    <strong>CONTRATADA:</strong> <strong>CONECTATI SOLUTIONS LTDA</strong>, CNPJ nº 12.345.678/0001-90, Alagoinhas, Bahia.<br><br>
                    <strong>CONTRATANTE:</strong> <strong>'.$dados['empresa_nome'].'</strong>, CNPJ/CPF nº '.$dados['cnpj'].', e-mail '.$dados['email'].', representado(a) por '.$dados['nome_usuario'].'.
                </div>

                <div class="content">
                    <p>As partes acima identificadas, de comum acordo, estabelecem as cláusulas que regerão este contrato de prestação de serviços digitais:</p>

                    <span class="clause-title">Cláusula 1ª - Do Objeto</span>
                    <p>Prestação dos serviços de <strong>'.$dados['titulo'].'</strong>, incluindo assessoria técnica, monitoramento, suporte especializado, manutenção de sistemas, desenvolvimento e quaisquer serviços correlatos.</p>

                    <span class="clause-title">Cláusula 2ª - Das Obrigações da Contratada</span>
                    <ul>
                        <li>Executar os serviços com ética, diligência e pessoal qualificado.</li>
                        <li>Manter sistemas monitorados, atualizados e disponíveis conforme SLA.</li>
                        <li>Garantir confidencialidade e integridade de dados.</li>
                        <li>Notificar sobre incidentes críticos ou falhas de segurança.</li>
                        <li>Prestar suporte técnico, treinamento e documentação sempre que necessário.</li>
                    </ul>

                    <span class="clause-title">Cláusula 3ª - Das Obrigações da Contratante</span>
                    <ul>
                        <li>Fornecer credenciais, acessos e informações necessárias.</li>
                        <li>Efetuar pagamentos na data acordada.</li>
                        <li>Cooperar em testes, auditorias e manutenção.</li>
                    </ul>

                    <span class="clause-title">Cláusula 4ª - Valores, Pagamento e Vigência</span>
                    <ul>
                        <li>Valor total: <strong>R$ '.number_format($dados['valor'],2,',','.').'</strong>.</li>
                        <li>Forma de pagamento: conforme plano contratado.</li>
                        <li>Vigência: <strong>'.$dados['vigencia'].'</strong>, com renovação automática.</li>
                        <li>Multa por atraso: 2% e juros de 1% ao mês.</li>
                    </ul>

                    <span class="clause-title">Cláusula 5ª - Confidencialidade e LGPD</span>
                    <p>Compromisso absoluto com a confidencialidade e proteção de dados pessoais conforme Lei nº 13.709/2018 (LGPD).</p>

                    <span class="clause-title">Cláusula 6ª - Propriedade Intelectual</span>
                    <p>Todo material e software desenvolvidos pela CONTRATADA permanecem sob sua propriedade, salvo acordo específico em contrário.</p>

                    <span class="clause-title">Cláusula 7ª - SLA e Suporte Técnico</span>
                    <ul>
                        <li>Tempo de resposta definido por prioridade.</li>
                        <li>Disponibilidade mínima de 99,5% mensal.</li>
                        <li>Registro de incidentes e ações corretivas.</li>
                    </ul>

                    <span class="clause-title">Cláusula 8ª - Rescisão e Penalidades</span>
                    <ul>
                        <li>Rescisão mediante aviso prévio de 30 dias.</li>
                        <li>Descumprimento de cláusulas permite rescisão imediata.</li>
                        <li>Multas aplicáveis por danos comprovados.</li>
                    </ul>

                    <span class="clause-title">Cláusula 9ª - Responsabilidade Civil</span>
                    <p>A CONTRATADA não se responsabiliza por perdas indiretas, lucros cessantes, interrupções de terceiros ou falhas de hardware/software de terceiros.</p>

                    <span class="clause-title">Cláusula 10ª - Foro</span>
                    <p>Fica eleito o foro da comarca de Alagoinhas/BA para dirimir conflitos, renunciando a qualquer outro.</p>

                    <span class="clause-title">Cláusula 11ª - Disposições Gerais</span>
                    <ul>
                        <li>Alterações contratuais só válidas se por escrito e assinadas digitalmente.</li>
                        <li>Se qualquer cláusula for inválida, as demais permanecem válidas.</li>
                        <li>Contrato eletrônico com assinatura digital reconhecida legalmente.</li>
                    </ul>
                </div>

                <div class="signature-section">
                    <p style="margin-bottom: 10px;">Assinado digitalmente em '.date('d/m/Y \à\s H:i:s').'</p>
                    <img src="'.$assinatura_img.'" class="signature-img"><br>
                    <strong style="text-transform: uppercase; display:block; margin-top:10px;">'.$dados['nome_usuario'].'</strong>
                    <div class="stamp">Assinatura Digital Validada</div>
                </div>

                <div class="footer">
                    ConectaTI Solutions - Tecnologia e Gestão | Documento Gerado via IP '.$ip_assinante.'<br>
                    Alagoinhas/BA, '.date('d/m/Y').'
                </div>
            </div>
        </body>
        </html>';

        // 3. GERAÇÃO DO PDF
        $options = new Options();
        $options->set('isRemoteEnabled', true); 
        $options->set('defaultFont', 'Helvetica');
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // 4. SALVAR PDF NO SERVIDOR
        $nome_arquivo = "contrato_" . $id_contrato . "_" . uniqid() . ".pdf";
        $pasta = "arquivos/contratos/";
        if (!file_exists($pasta)) { mkdir($pasta, 0777, true); }
        $caminho_final = $pasta . $nome_arquivo;
        file_put_contents($caminho_final, $dompdf->output());

        // 5. ATUALIZA BANCO
        $sql = "UPDATE contratos SET 
                    assinatura_img = ?, 
                    data_assinatura = NOW(), 
                    status_contrato = 'Assinado',
                    arquivo_url = ? 
                WHERE id = ? AND cliente_id = ?";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$assinatura_img, $caminho_final, $id_contrato, $cliente_id]);

        $redirecionar = isset($_SESSION['admin_id']) ? "helpdesk.php" : "area-cliente.php";
        header("Location: " . $redirecionar . "?mensagem=Contrato assinado e PDF gerado com sucesso!");
        exit();

    } catch (Exception $e) {
        die("Erro ao gerar PDF: " . $e->getMessage());
    }
}
?>
