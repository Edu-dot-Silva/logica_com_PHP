<?php
include 'conexao_bdaluno.php';

if (!isset($_GET['id'])) {
    echo "<h2>ID do aluno não fornecido.</h2>";
    exit;
}

$id = $_GET['id'];

try {
    $stmt = $pdo->prepare('SELECT * FROM alunos WHERE id = ?');
    $stmt->execute([$id]);
    $aluno = $stmt->fetch();

    if (!$aluno) {
        echo "<h2>Aluno não encontrado.</h2>";
        exit;
    }
} catch (PDOException $e) {
    echo "<h2>Erro ao buscar aluno: " . $e->getMessage() . "</h2>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];

    try {
        $stmt = $pdo->prepare('UPDATE alunos SET nome = ?, data_nascimento = ?, email = ?, celular = ? WHERE id = ?');
        $stmt->execute([$nome, $data_nascimento, $email, $celular, $id]);
        header('Location: lista_alunos.php');
        exit;
    } catch (PDOException $e) {
        echo "<h2>Erro ao atualizar aluno: " . $e->getMessage() . "</h2>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Editar Aluno</h1>
        <form method="post">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($aluno['nome']); ?>" required>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?php echo htmlspecialchars($aluno['data_nascimento']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($aluno['email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="celular">Celular</label>
                <input type="text" class="form-control" id="celular" name="celular" value="<?php echo htmlspecialchars($aluno['celular']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>
