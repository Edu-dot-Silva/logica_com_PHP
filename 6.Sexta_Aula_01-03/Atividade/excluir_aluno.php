<?php
include 'conexao_bdaluno.php';

if (!isset($_GET['id'])) {
    echo "<h2>ID do aluno não fornecido.</h2>";
    exit;
}

$id = $_GET['id'];

try {
    $stmt = $pdo->prepare('DELETE FROM alunos WHERE id = ?');
    $stmt->execute([$id]);
    header('Location: lista_alunos.php?excluido=1');
    exit;
} catch (PDOException $e) {
    echo "<h2>Erro ao excluir aluno: " . $e->getMessage() . "</h2>";
}
?>
