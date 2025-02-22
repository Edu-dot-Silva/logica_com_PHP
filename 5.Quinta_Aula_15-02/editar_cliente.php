<!DOCTYPE html>
<html lang="pt-br">
<?php
include 'conexao.php';
$id_cliente = $_GET['id'];
// puxando o id do cliente pelo metodo get para essa pagina
$sql = "SELECT * FROM clientes WHERE id_cliente = :id_cliente";
// fazendo a consulta desse id no sql
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id_cliente', $id_cliente,PDO::PARAM_INT);
// preparando o parametro id cliente de forma segura
$stmt->execute();
// executa a consulta/querry
$cliente = $stmt->fetch(PDO::FETCH_ASSOC);
// trazendo os dados em um array

if($cliente){
    // $cliente é o array

    $id_cliente = $cliente['id_cliente'];
    $nome = $cliente['nome'];
    $cpf_cnpj = $cliente['cpf_cnpj'];
    $telefone_fixo = $cliente['telefone_fixo'];
    $celular = $cliente['celular'];
    $email = $cliente['email'];
    $cep = $cliente['cep'];

    $logradouro = $cliente['logradouro'];
    $numero_endereco = $cliente['numero_endereco'];
    $complemento = $cliente['complemento'];
    $bairro = $cliente['bairro'];
    $cidade = $cliente['cidade'];
    $estado = $cliente['estado'];
    $email = $cliente['email'];

}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
<?php include 'menu.php' ?>
    <!-- trazendo o value atraves da variaveis do php no começo do arquivo -->
    <div class="container">
        <form action="processo_editar_cliente.php" method="POST">

                <input type="hidden" id="id_cliente" name="id_cliente" value="<?php echo $id_cliente ?>">

            <div class="form-group">
                <label for="cpf_cnpj">CPF/CNPJ</label>
                <input value="<?php echo $cpf_cnpj ?>" type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" >
            </div>
            <div class="form-group">
                <label for="nome">Nome cliente</label>
                <input value="<?php echo $nome ?>" type="text" class="form-control" id="nome" name="nome" >
            </div>
            <div class="form-group">
                <label for="telefone_fixo">Telefone fixo</label>
                <input value="<?php echo $telefone_fixo ?>" type="text" class="form-control" id="telefone_fixo" name="telefone_fixo" >
            </div>
            <div class="form-group">
                <label for="celular">Celular</label>
                <input value="<?php echo $celular ?>" type="text" class="form-control" id="celular" name="celular" >
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input value="<?php echo $email ?>" type="email" class="form-control" id="email" name="email" >
            </div>
            <div class="form-group">
                <label for="cep">CEP</label>
                <input value="<?php echo $cep ?>" type="text" class="form-control" id="cep" name="cep" >
            </div>
            <div class="form-group">
                <label for="logradouro">Logradouro</label>
                <input value="<?php echo $logradouro ?>" type="text" class="form-control" id="logradouro" name="logradouro" >
            </div>
            <div class="form-group">
                <label for="numero_endereco">Numero endereco</label>
                <input value="<?php echo $numero_endereco ?>" type="text" class="form-control" id="numero_endereco" name="numero_endereco" >
            </div>
            <div class="form-group">
                <label for="complemento">Complemento</label>
                <input value="<?php echo $complemento ?>" type="text" class="form-control" id="complemento" name="complemento" >
            </div>
            <div class="form-group">
                <label for="bairro">Bairro</label>
                <input value="<?php echo $bairro ?>" type="text" class="form-control" id="bairro" name="bairro" >
            </div>
            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input value="<?php echo $cidade ?>" type="text" class="form-control" id="cidade" name="cidade" >
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <input value="<?php echo $estado ?>" type="text" class="form-control" id="estado" name="estado" >
            </div>

            <button id="botao" type="submit" class="btn btn-primary">Salvar edição</button>
        </form>
    </div>
</body>

</html>