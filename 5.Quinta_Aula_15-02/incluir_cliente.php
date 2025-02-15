<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incluir Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="container">
<form action="processo_incluir_cliente.php" method="POST">
    <div class="form-group">
      <label for="cpf_cnpj">CPF/CNPJ</label>
      <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" placeholder="CPF/CNPJ">
    </div>
  <div class="form-group">
    <label for="nome">Nome cliente</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
  </div>
  <div class="form-group">
    <label for="telefone_fixo">Telefone fixo</label>
    <input type="text" class="form-control" id="telefone_fixo" name="telefone_fixo" placeholder="Telefone">
  </div>
  <div class="form-group">
    <label for="celular">Celular</label>
    <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="cep">CEP</label>
    <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP">
  </div>
  <div class="form-group">
    <label for="logradouro">Logradouro</label>
    <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Logradouro">
  </div>
  <div class="form-group">
    <label for="numero_endereco">Numero endereco</label>
    <input type="text" class="form-control" id="numero_endereco" name="numero_endereco" placeholder="Numero endereço">
  </div>
  <div class="form-group">
    <label for="complemento">Complemento</label>
    <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento endereco">
  </div>
  <div class="form-group">
    <label for="bairro">Bairro</label>
    <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro endereco">
  </div>
  <div class="form-group">
    <label for="cidade">Cidade</label>
    <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade endereco">
  </div>
  <div class="form-group">
    <label for="estado">Estado</label>
    <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado endereco">
  </div>
  <div class="form-group">
    <label for="email">E-mail</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
  </div>
				
  <button id="botao" type="submit" class="btn btn-primary">Adicionar cliente</button>
</form>
</div>
</body>
</html>