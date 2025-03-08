<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conexao_bdaluno.php';

// Verifica se o ID do aluno foi fornecido
if (!isset($_GET['id'])) {
    echo "<h2>ID do aluno não fornecido.</h2>";
    exit;
}

// Obtém o ID do aluno a ser excluído a partir dos parâmetros GET
$id = $_GET['id'];

try {
    // Prepara a instrução SQL para deletar o aluno com o ID fornecido
    $stmt = $pdo->prepare('DELETE FROM alunos WHERE id = ?');
    // Executa a instrução SQL com o ID fornecido
    $stmt->execute([$id]);
    // Redireciona para a página de lista de alunos
    header('Location: lista_alunos.php?excluido=1');
    exit;
} catch (PDOException $e) {
    // Exibe uma mensagem de erro caso ocorra uma exceção
    echo "<h2>Erro ao excluir aluno: " . $e->getMessage() . "</h2>";
}
?>
