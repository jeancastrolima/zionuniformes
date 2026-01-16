<?php

// Define o caminho da pasta
$diretorio = "downloads/";

// Verifica se a pasta existe, se não, cria
if (!is_dir($diretorio)) {
    mkdir($diretorio, 0755, true);
}

// Escaneia os arquivos, removendo os pontos "." e ".."
$arquivos = array_diff(scandir($diretorio), array('.', '..'));

// Função para formatar o tamanho do arquivo
function formatarTamanho($bytes) {
    if ($bytes >= 1073741824) { $bytes = number_format($bytes / 1073741824, 2) . ' GB'; }
    elseif ($bytes >= 1048576) { $bytes = number_format($bytes / 1048576, 2) . ' MB'; }
    elseif ($bytes >= 1024) { $bytes = number_format($bytes / 1024, 2) . ' KB'; }
    else { $bytes = $bytes . ' bytes'; }
    return $bytes;
}

// Função para ícones baseados na extensão
function obterIcone($nomeArquivo) {
    $ext = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
    switch ($ext) {
        case 'pdf': return 'fas fa-file-pdf text-danger';
        case 'zip': 
        case 'rar': 
        case '7z':  return 'fas fa-file-archive text-warning';
        case 'exe': 
        case 'msi': return 'fas fa-cog text-secondary';
        case 'jpg':
        case 'png': return 'fas fa-file-image text-info';
        case 'txt':
        case 'doc':
        case 'docx': return 'fas fa-file-alt text-primary';
        default: return 'fas fa-file text-muted';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<?php include ('_header.php')?>

<body>
    <?php include ('_navbar.php')?>

    <div class="container-fluid bg-light py-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="text-center mb-5">
                        <i class="fas fa-folder-open display-1 text-primary mb-4"></i>
                        <h1 class="display-5">Repositório de Arquivos</h1>
                        <p class="mb-4">Softwares, drivers e documentações técnicas atualizadas automaticamente para suporte.</p>
                    </div>

                    <div class="bg-white rounded shadow p-4 border-top border-primary border-5">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="py-3 px-4">Nome do Arquivo</th>
                                        <th class="py-3">Extensão</th>
                                        <th class="py-3">Tamanho</th>
                                        <th class="py-3 text-center">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($arquivos)): ?>
                                        <tr>
                                            <td colspan="4" class="text-center py-5 text-muted">
                                                <i class="fas fa-info-circle me-2"></i>
                                                Nenhum arquivo disponível na pasta <strong>/downloads</strong> no momento.
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($arquivos as $arquivo): 
                                            $caminhoCompleto = $diretorio . $arquivo;
                                            $tamanho = formatarTamanho(filesize($caminhoCompleto));
                                            $extensao = strtoupper(pathinfo($arquivo, PATHINFO_EXTENSION));
                                            $icone = obterIcone($arquivo);
                                        ?>
                                        <tr>
                                            <td class="px-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="btn-sm-square bg-light rounded-circle me-3">
                                                        <i class="<?= $icone ?> fs-5"></i>
                                                    </div>
                                                    <span class="text-dark fw-bold"><?= $arquivo ?></span>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-light text-primary border border-primary px-3 py-2">
                                                    <?= $extensao ?>
                                                </span>
                                            </td>
                                            <td class="text-muted small"><?= $tamanho ?></td>
                                            <td class="text-center">
                                                <a href="<?= $caminhoCompleto ?>" class="btn btn-primary btn-sm rounded-pill px-4 shadow-sm" download>
                                                    <i class="fas fa-download me-2"></i> Baixar
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="text-center mt-5">
                        <p class="text-muted">Precisa de algum driver específico? <a href="contact" class="text-primary fw-bold">Entre em contato.</a></p>
                        <a class="btn btn-secondary rounded-pill py-2 px-5 shadow-sm" href="../../">
                            <i class="fas fa-home me-2"></i>Voltar para Início
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include ('_footer.php')?>

</body>
</html>