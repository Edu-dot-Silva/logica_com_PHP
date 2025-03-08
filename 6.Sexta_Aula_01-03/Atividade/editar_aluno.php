<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conexao_bdaluno.php';

// Verifica se o ID do aluno foi fornecido via GET
if (!isset($_GET['id'])) {
    // Exibe uma mensagem de erro se o ID não foi fornecido
    echo "<h2>ID do aluno não fornecido.</h2>";
    exit;
}

// Obtém o ID do aluno a partir dos parâmetros GET
$id = $_GET['id'];

try {
    // Prepara a instrução SQL para selecionar o aluno com o ID fornecido
    $stmt = $pdo->prepare('SELECT * FROM alunos WHERE id = ?');
    // Executa a instrução SQL com o ID fornecido
    $stmt->execute([$id]);
    // Obtém o resultado da consulta
    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o aluno foi encontrado
    if (!$aluno) {
        // Exibe uma mensagem de erro se o aluno não foi encontrado
        echo "<h2>Aluno não encontrado.</h2>";
        exit;
    }
} catch (PDOException $e) {
    // Exibe uma mensagem de erro caso ocorra uma exceção
    echo "<h2>Erro ao buscar aluno: " . $e->getMessage() . "</h2>";
    exit;
}

// Verifica se o método da requisição é POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados do formulário
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];

    try {
        // Prepara a instrução SQL para atualizar os dados do aluno com o ID fornecido
        $stmt = $pdo->prepare('UPDATE alunos SET nome = ?, data_nascimento = ?, email = ?, celular = ? WHERE id = ?');
        // Executa a instrução SQL com os dados fornecidos
        $stmt->execute([$nome, $data_nascimento, $email, $celular, $id]);
        // Redireciona para a página de lista de alunos
        header('Location: lista_alunos.php');
        exit;
    } catch (PDOException $e) {
        // Exibe uma mensagem de erro caso ocorra uma exceção
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
