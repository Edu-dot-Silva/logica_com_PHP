<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conexao_bdaluno.php';

try {
    // Prepara a instrução SQL para selecionar todos os alunos
    $stmt = $pdo->prepare('SELECT * FROM alunos');
    $stmt->execute();
    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Exibe uma mensagem de erro caso ocorra uma exceção
    echo "<h2>Erro ao buscar alunos: " . $e->getMessage() . "</h2>";
    exit;
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Alunos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Sistema de cadastro de alunos</h1>
        <a href="adicionar_aluno.php" class="btn btn-success mb-3">Adicionar Aluno</a>
        <?php 
        // Verifica se a lista de alunos está vazia e exibe uma mensagem centralizada se não houver alunos cadastrados
        if (empty($alunos)): ?>
            <div class="alert alert-warning text-center" role="alert">
                Não há alunos cadastrados.
            </div>
        <?php else: ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>Email</th>
                    <th>Celular</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alunos as $aluno): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($aluno['nome']); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($aluno['data_nascimento'])); ?></td>
                        <td><?php echo htmlspecialchars($aluno['email']); ?></td>
                        <td><?php echo htmlspecialchars($aluno['celular']); ?></td>
                        <td>
                            <a href="editar_aluno.php?id=<?php echo $aluno['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <form method="post" action="deletar_aluno.php" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $aluno['id']; ?>">
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal<?php echo $aluno['id']; ?>">Deletar</button>
                                <!-- Modal -->
                                <div class="modal fade" id="confirmDeleteModal<?php echo $aluno['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirmar Deleção</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Você tem certeza que deseja deletar este aluno?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-danger">Deletar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                <?php 
                // Fecha o loop foreach
                endforeach; ?>
            </tbody>
        </table>
        <?php 
        // Fecha a estrutura de controle if
        endif; ?>
    </div>

    <script>
        $(document).ready(function() {
            // Faz o alerta de sucesso desaparecer após 5 segundos
            $("#success-alert").fadeTo(5000, 500).slideUp(500, function() {
                $(this).remove();
            });

            // Configura o modal de confirmação de deleção
            $('#confirmModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var confirmDelete = $('#confirmDelete');
                confirmDelete.attr('href', 'excluir_aluno.php?id=' + id);
            });
        });
    </script>
</body>
</html>