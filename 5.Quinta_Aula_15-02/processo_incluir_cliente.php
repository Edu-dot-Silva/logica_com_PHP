<?php
include 'conexao.php';

$cpf_cnpj = ($_POST['cpf_cnpj']);
$nome = ($_POST['nome']);
$telefone_fixo = ($_POST['telefone_fixo']);
$celular = ($_POST['celular']);
$email = ($_POST['email']);

$cep = ($_POST['cep']);
$logradouro = ($_POST['logradouro']);
$numero_endereco = ($_POST['numero_endereco']);
$complemento = ($_POST['complemento']);
$bairro = ($_POST['bairro']);
$cidade = ($_POST['cidade']);
$estado = ($_POST['estado']);
			
			
try{
    $sql = "INSERT INTO clientes (cpf_cnpj,nome,telefone_fixo,celular,email, cep ,logradouro,numero_endereco,complemento,bairro,cidade,estado) VALUES (:cpf_cnpj,:nome,:telefone_fixo,:celular,:email,:cep,:logradouro,:numero_endereco,:complemento,:bairro,:cidade,:estado)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':cpf_cnpj',$cpf_cnpj);
    $stmt->bindParam(':nome',$nome);
    $stmt->bindParam(':telefone_fixo',$telefone_fixo);
    $stmt->bindParam(':celular',$celular);
    $stmt->bindParam(':email',$email);

    $stmt->bindParam(':cep',$cep);
    $stmt->bindParam(':logradouro',$logradouro);
    $stmt->bindParam(':numero_endereco',$numero_endereco);
    $stmt->bindParam(':complemento',$complemento);
    $stmt->bindParam(':bairro',$bairro);
    $stmt->bindParam(':cidade',$cidade);
    $stmt->bindParam(':estado',$estado);

    if($stmt->execute()){
        header("Location:lista_clientes.php");
    } else{
        echo "Erro ao inserir registro";
    }
} catch (PDOException $e){
echo "Erro". $e->getMessage();
}
?>