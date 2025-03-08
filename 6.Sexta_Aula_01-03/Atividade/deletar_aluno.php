<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conexao_bdaluno.php';

// Verifica se o método da requisição é POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém o ID do aluno a ser deletado a partir dos dados POST
    $id = $_POST['id'];

    try {
        // Prepara a instrução SQL para deletar o aluno com o ID fornecido
        $stmt = $pdo->prepare('DELETE FROM alunos WHERE id = ?');
        // Executa a instrução SQL com o ID fornecido
        $stmt->execute([$id]);
        // Redireciona para a página de lista de alunos
        header('Location: lista_alunos.php');
        exit;
    } catch (PDOException $e) {
        // Exibe uma mensagem de erro caso ocorra uma exceção
        echo "<h2>Erro ao deletar aluno: " . $e->getMessage() . "</h2>";
    }
}
?>
