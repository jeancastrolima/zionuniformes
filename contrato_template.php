<?php

// contrato_template.php
// Recebe as variáveis $cliente e $contrato do assinar-contrato.php ou processar-assinatura.php
?>

<div style="font-family: 'Roboto', sans-serif; color:#2c3e50; font-size:15px; line-height:1.8; text-align:justify;">

    <div style="text-align:center;">
        <h2>CONTRATO DE PRESTAÇÃO DE SERVIÇOS DIGITAIS</h2>
        <span style="font-size:11px;">Validade Jurídica: MP 2.200-2/2001</span>
    </div>

    <div style="margin-top:20px; padding:20px; background:#f8f9fa; border-left:5px solid #0d6efd; border-radius:8px;">
        <strong>CONTRATADA:</strong> CONECTATI SOLUTIONS LTDA, pessoa jurídica de direito privado, CNPJ nº 12.345.678/0001-90, com sede administrativa em Alagoinhas, Bahia.<br><br>
        <strong>CONTRATANTE:</strong> <strong><?= $cliente['empresa_nome'] ?></strong>, devidamente inscrito(a) sob o CNPJ/CPF nº <?= $cliente['cnpj'] ?>, e-mail <?= $cliente['email'] ?>, representado neste ato por <?= $cliente['nome_usuario'] ?>.
    </div>

    <p style="margin-top:20px;">
        As partes acima identificadas, de comum acordo, estabelecem as cláusulas e condições que regerão este contrato de prestação de serviços de Tecnologia da Informação:
    </p>

    <h4 style="margin-top:30px; color:#1a237e; border-bottom:1px solid #e0e0e0; padding-bottom:5px;">Cláusula 1ª - Do Objeto</h4>
    <p>O presente contrato tem como objeto a prestação dos serviços de <strong><?= $contrato['titulo'] ?></strong>, englobando a assessoria técnica, monitoramento de sistemas e suporte especializado conforme plano contratado.</p>

    <h4 style="margin-top:30px; color:#1a237e; border-bottom:1px solid #e0e0e0; padding-bottom:5px;">Cláusula 2ª - Das Obrigações da Contratada</h4>
    <p>A CONTRATADA compromete-se a atuar com diligência e ética profissional, utilizando recursos tecnológicos atualizados para garantir a estabilidade e segurança dos serviços prestados, observando os prazos de atendimento (SLA) acordados.</p>

    <h4 style="margin-top:30px; color:#1a237e; border-bottom:1px solid #e0e0e0; padding-bottom:5px;">Cláusula 3ª - Das Obrigações da Contratante</h4>
    <p>A CONTRATANTE obriga-se a fornecer as credenciais, acessos e informações necessárias para a execução dos serviços, bem como efetuar o pagamento dos honorários na data estipulada, evitando a suspensão dos serviços por inadimplência.</p>

    <h4 style="margin-top:30px; color:#1a237e; border-bottom:1px solid #e0e0e0; padding-bottom:5px;">Cláusula 4ª - Dos Valores e Vigência</h4>
    <p>Pelos serviços prestados, a CONTRATANTE pagará o valor total de <strong>R$ <?= number_format($contrato['valor'], 2, ',', '.') ?></strong>. Este contrato possui vigência de <strong><?= $contrato['vigencia'] ?></strong>, podendo ser renovado automaticamente por igual período caso não haja manifestação contrária de ambas as partes.</p>

    <h4 style="margin-top:30px; color:#1a237e; border-bottom:1px solid #e0e0e0; padding-bottom:5px;">Cláusula 5ª - Do Sigilo e LGPD</h4>
    <p>Ambas as partes comprometem-se a manter o mais estrito sigilo sobre dados sensíveis, em conformidade com a <strong>Lei Geral de Proteção de Dados (Lei nº 13.709/2018)</strong>, sendo proibida a divulgação de informações estratégicas a terceiros sem autorização prévia.</p>

    <h4 style="margin-top:30px; color:#1a237e; border-bottom:1px solid #e0e0e0; padding-bottom:5px;">Cláusula 6ª - Da Rescisão</h4>
    <p>O presente contrato poderá ser rescindido por qualquer uma das partes mediante aviso prévio por escrito de 30 (trinta) dias, sem prejuízo das faturas em aberto e obrigações já concluídas até a data da rescisão.</p>

    <h4 style="margin-top:30px; color:#1a237e; border-bottom:1px solid #e0e0e0; padding-bottom:5px;">Cláusula 7ª - Do Foro</h4>
    <p>Fica eleito o foro da comarca de Alagoinhas/BA para dirimir quaisquer dúvidas oriundas deste instrumento, com renúncia expressa a qualquer outro, por mais privilegiado que seja.</p>

    <div style="text-align:center; margin-top:50px;">
        <p class="mb-0"><strong>Alagoinhas/BA, <?= date('d/m/Y') ?>.</strong></p>
        <small style="color:#777;">Documento gerado eletronicamente através do IP: <?= $_SERVER['REMOTE_ADDR'] ?></small>
    </div>
</div>
