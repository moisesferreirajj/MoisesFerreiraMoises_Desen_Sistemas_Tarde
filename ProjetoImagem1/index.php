<?php

// INCLUINDO O ARQUIVO DE CONEXÃO COM O BANCO DE DADOS
require_once ('conecta.php');

// CRIA A CONSULTA SQL PARA SELECIONAR OS DADOS PRINCIPAIS (SEM A COLUNA IMAGEM)
$querySelecao = 'SELECT codigo, evento, descricao, nome_imagem, tamanho_imagem, tipo_imagem FROM tabela_imagens';

$resultado = mysqli_query($conexao, $querySelecao);

if (!$resultado) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto de Imagem</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow mb-4">
                    <div class="card-header bg-primary text-white">
                        <h2 class="mb-0 text-center">Selecione um novo arquivo de imagem</h2>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="upload.php" method="POST" class="row g-3">
                            <input type="hidden" name="MAX_FILE_SIZE" value="999999999">
                            <div class="col-md-6">
                                <input name="evento" type="text" class="form-control" placeholder="Evento" required>
                            </div>
                            <div class="col-md-6">
                                <input name="descricao" type="text" class="form-control" placeholder="Descrição" required>
                            </div>
                            <div class="col-md-12">
                                <input name="imagem" type="file" class="form-control" required>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-success px-5">Salvar Imagem</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card shadow">
                    <div class="card-header bg-secondary text-white">
                        <h4 class="mb-0 text-center">Imagens Salvas</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle mb-0">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col" class="text-center">Código</th>
                                        <th scope="col" class="text-center">Evento</th>
                                        <th scope="col" class="text-center">Descrição</th>
                                        <th scope="col" class="text-center">Nome da Imagem</th>
                                        <th scope="col" class="text-center">Tamanho</th>
                                        <th scope="col" class="text-center">Visualizar</th>
                                        <th scope="col" class="text-center">Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($arquivos = mysqli_fetch_array($resultado)) { ?>
                                    <tr>
                                        <td class="text-center"><?php echo htmlspecialchars($arquivos['codigo']); ?></td>
                                        <td class="text-center"><?php echo htmlspecialchars($arquivos['evento']); ?></td>
                                        <td class="text-center"><?php echo htmlspecialchars($arquivos['descricao']); ?></td>
                                        <td class="text-center"><?php echo htmlspecialchars($arquivos['nome_imagem']); ?></td>
                                        <td class="text-center"><?php echo htmlspecialchars($arquivos['tamanho_imagem']); ?></td>
                                        <td class="text-center">
                                            <a href="ver_imagem.php?id=<?php echo urlencode($arquivos['codigo']); ?>" class="btn btn-sm btn-info" target="_blank">Ver Imagem</a>
                                        </td>
                                        <td class="text-center">
                                            <a href="excluir_imagem.php?id=<?php echo urlencode($arquivos['codigo']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta imagem?');">Excluir</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Bootstrap JS (opcional, para componentes interativos) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>