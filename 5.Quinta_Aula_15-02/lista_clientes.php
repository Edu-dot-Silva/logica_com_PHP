<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista - Clientes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <?php
    include 'conexao.php';
    // trazendo todo o codigo de conexao para ca
    ?>
    <a href="incluir_cliente.php" class="btn btn-success">Novo cliente</a>
    <table class="table-striped table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome Cliente</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody >
            <?php
            $sql = "SELECT * FROM clientes";
            $stmt = $pdo->query($sql);
            // executa a consulta usando pdo e traz um array
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $id_cliente = $row['id_cliente'];
                $nome = $row['nome'];            
            ?>
            <tr>
                <td><?php echo htmlspecialchars($id_cliente); ?></td>
                <td><?php echo htmlspecialchars($nome); ?></td>
                <td><a href="#" class="btn btn-primary">Editar</a></td>
                <td><a href="#" class="btn btn-danger">Excluir</a></td>
            </tr>
            <?php
                }
                // para fechar o laço
            ?>
        </tbody>
    </table>
    </div>
</body>
</html>