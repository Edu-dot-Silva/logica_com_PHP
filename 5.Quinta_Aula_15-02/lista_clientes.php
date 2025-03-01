<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista - Clientes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script>
        // Comantário no Javascript e PHP
        function confirmarExclusao(id) {
            $('#confirmModal').modal('show');
            document.getElementById('confirmDeleteBtn').onclick = function() {
                window.location.href = "excluir_cliente.php?id_cliente=" + id;
            };
        }
    </script>    
</head>
<body>
    <?php include 'menu.php' ?>
    <!-- incluido o menu, funcionando como um componente -->
<div class="container">    
<?php
    include 'conexao.php'; // Inclui o arquivo de conexão
?>  
<a href="incluir_cliente.php" class="btn btn-success">Novo Cliente</a>
<table class="table table-striped tabela_clientes">
  <thead> <!--Cabeçalho da tag tabela do html -->
    <tr> <!--Linha da tag tabela do html -->
      <th scope="col">ID</th> <!-- Coluna da tag tabela do html -->
      <th scope="col">Nome Cliente</th>
      <th scope="col">Editar</th>
      <th scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody> <!-- Corpo da tag tabela do html -->
  <?php
        $sql = "SELECT * FROM clientes"; // Consulta a tabela
        $stmt = $pdo->query($sql); // Executa a consulta usando PDO
        // Laço para trazer os dados da consulta
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { // exibir registro por registro até o fim
            $id_cliente = $row['id_cliente']; // Retorna o id do cliente
            $nome = $row['nome']; // Retorna o nome do cliente
   ?>
    <tr>
      <td><?php echo htmlspecialchars($id_cliente); ?></td> <!-- htmlspecialchars-função limpeza -->
      <td><?php echo htmlspecialchars($nome); ?></td>
      <td><a href="editar_cliente.php?id=
      <?php echo htmlspecialchars($id_cliente); ?>" class="btn btn-primary btn_edita btn_lista">
      Editar</a></td>  
      <td><a href="#" onclick="confirmarExclusao(<?php echo htmlspecialchars($id_cliente); ?>)"
      class="btn btn-danger btn_lista">Excluir</a></td>
    </tr>
    <?php
        } // O laço está entre as chaves
    ?>
    </tbody>
</table>
</div>
<!-- Modal de Confirmação -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog"
  aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmModalLabel">Confirmar Exclusão</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Tem certeza que deseja excluir este cliente?
      </div>
      <div class="modal-footer">
        <!-- O data-dismiss="modal", simplesmente fechará o modal -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <!-- Note o nome do botão que está no id: confirmDeleteBtn
         Quando pressionado irá acionar o javascript que acionará a exclusão -->
        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Excluir</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Declarando as bibliotecas externas de jquery, bootstrap.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 
 
</body>
</html>