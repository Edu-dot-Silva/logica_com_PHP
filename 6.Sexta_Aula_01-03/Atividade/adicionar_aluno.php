<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conexao_bdaluno.php';

// Verifica se o método da requisição é POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém o nome do aluno a ser adicionado a partir dos dados POST
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];

    try {
        // Prepara a instrução SQL para inserir um novo aluno com o nome fornecido
        $stmt = $pdo->prepare('INSERT INTO alunos (nome, data_nascimento, email, celular) VALUES (?, ?, ?, ?)');
        // Executa a instrução SQL com o nome fornecido
        $stmt->execute([$nome, $data_nascimento, $email, $celular]);
        // Redireciona para a página de lista de alunos
        header('Location: lista_alunos.php');
        exit;
    } catch (PDOException $e) {
        // Exibe uma mensagem de erro caso ocorra uma exceção
        echo "<h2>Erro ao adicionar aluno: " . $e->getMessage() . "</h2>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Aluno</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Adicionar Aluno</h1>
        <form method="post">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="celular">Celular</label>
                <input type="text" class="form-control" id="celular" name="celular" required>
            </div>
            <button type="submit" class="btn btn-success">Adicionar</button>
        </form>
    </div>
</body>
</html>
