<?php
include 'conexao_bdaluno.php';

try {
    $stmt = $pdo->query('SELECT * FROM alunos');
    $alunos = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "<h2>Erro ao buscar alunos: " . $e->getMessage() . "</h2>";
    exit;
}

if (isset($_GET['excluido']) && $_GET['excluido'] == 1) {
    echo "<div class='alert alert-success' id='success-alert'>Aluno excluído com sucesso!</div>";
}
if (isset($_GET['adicionado']) && $_GET['adicionado'] == 1) {
    echo "<div class='alert alert-success' id='success-alert'>Aluno adicionado com sucesso!</div>";
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
        <h1>Alunos</h1>
        <a href="adicionar_aluno.php" class="btn btn-success mb-3">Adicionar Aluno</a>
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
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmModal" data-id="<?php echo $aluno['id']; ?>">Excluir</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Confirm Delete Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmar Exclusão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir este aluno?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a href="" id="confirmDelete" class="btn btn-danger">Excluir</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#success-alert").fadeTo(5000, 500).slideUp(500, function() {
                $(this).remove();
            });

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