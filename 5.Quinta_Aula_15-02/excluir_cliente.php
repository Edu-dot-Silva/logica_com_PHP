<?php
// clientes_excluir.php
include 'conexao.php'; // Conectamos ao banco de dados
$id_cliente = $_GET['id_cliente']; // Chave para exclusão
$sql = "DELETE FROM clientes WHERE id_cliente = :id_cliente";
try {
    $stmt = $pdo->prepare($sql); // Prepara a declaração SQL
    $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
    $stmt->execute(); // Executa a exclusão
 
    header("Location: lista_clientes.php");
    exit(); // Certifica que o script para aqui após o redirecionamento
} catch (PDOException $e) { // Tratamento de excessão
    // Verifica se o erro é devido a uma restrição de chave estrangeira
    if ($e->getCode() == '23000') {
        echo "<script>
                alert('Erro: Não é possível excluir esse cliente pois está associada a outros registros.');
                window.location.href='lista_clientes.php';
              </script>";
    } else {
        echo "Erro ao excluir: " . $e->getMessage(); // Mensagem genérica para outros erros
    }
}
?>