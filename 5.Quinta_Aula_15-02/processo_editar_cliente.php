<?php
include 'conexao.php';

$id_cliente = $_POST['id_cliente'];
$nome = $_POST['nome'];
$cpf_cnpj = $_POST['cpf_cnpj'];
$telefone_fixo = $_POST['telefone_fixo'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$cep = $_POST['cep'];

$logradouro = $_POST['logradouro'];
$numero_endereco = $_POST['numero_endereco'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];

// criando as variaveis com parametros do forms

try {  // Tenta alterar
    // update é a função de alteração de registro em tabela SQL
    $sql = "UPDATE clientes SET
        nome = :nome, cpf_cnpj = :cpf_cnpj,
        telefone_fixo = :telefone_fixo, celular = :celular,
        email = :email, cep = :cep, logradouro = :logradouro, 
        numero_endereco = :numero_endereco, complemento =:complemento, bairro = :bairro, cidade = :cidade,
        estado = :estado
        WHERE id_cliente = :id_cliente"; // Altera somente do registro
        // selecionado
    $stmt = $pdo->prepare($sql); // Prepara a declaração SQL
    $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
    $stmt->bindParam(':cpf_cnpj', $cpf_cnpj);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':telefone_fixo', $telefone_fixo);    
    $stmt->bindParam(':celular', $celular);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':cep', $cep);
    $stmt->bindParam(':logradouro', $logradouro);
    $stmt->bindParam(':numero_endereco', $numero_endereco);
    $stmt->bindParam(':complemento', $complemento);
    $stmt->bindParam(':bairro', $bairro);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':estado', $estado);
 
    if ($stmt->execute()) {
        header("Location: lista_clientes.php"); // Retorna para a página de consulta
    } else {
        echo "Erro ao alterar registro.";
    }
} catch (PDOException $e) {
    // Exceção, onde é exibido o erro segundo o PHP
    echo "Erro: " . $e->getMessage();
}  

?>