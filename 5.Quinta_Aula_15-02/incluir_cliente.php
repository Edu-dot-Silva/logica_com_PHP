<!DOCTYPE html>
<!-- clientes_incluir.php -->
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes Inclusão</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<?php
   include 'menu.php';
?>
    <div class="container">
    <form action="processo_incluir_cliente.php" method="post">
    <label for="cpf_cnpj">CPF / CNPJ</label>
    <input type="text" class="form-control cpfOuCnpj" id="cpf_cnpj" name="cpf_cnpj"
     placeholder="CPF / CNPJ do Cliente">
 
    <label for="nome">Nome do cliente</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do cliente" required>
 
     <label for="telefone_fixo">Telefone fixo</label>
     <input type="text" class="form-control" id="telefone_fixo" name="telefone_fixo" placeholder="Entre com o Telefone fixo">
 
     <label for="celular">Celular</label>  
     <input type="text" class="form-control" id="celular" name="celular" placeholder="Entre com o Celular">  
     <label for="email">E-Mail</label>  
 
     <input type="email" class="form-control" id="email" name="email" placeholder="Entre com o E-mail">
     <label for="email">CEP</label>  
 
     <input type="text" class="form-control" onblur="formatarCEP(this)"
     id="cep" name="cep" placeholder="Entre com o CEP">  
 
     <label for="endereco">Endereço</label>  
     <input type="text" class="form-control" id="logradouro" name="logradouro"
     placeholder="Entre com o Endereço">
 
     <label for="numero_endereco">Número</label>  
     <input type="text" class="form-control" id="numero_endereco" name="numero_endereco"
     placeholder="Entre com o Número">
 
     <label for="complemento">Complemento</label>  
     <input type="text" class="form-control" id="complemento"
     name="complemento" placeholder="Entre com o Complemento">
 
     <label for="bairro">Bairro</label>  
     <input type="text" class="form-control" id="bairro"
     name="bairro" placeholder="Entre com o Bairro">
 
     <label for="Cidade">Cidade</label>  
     <input type="text" class="form-control" id="cidade"
     name="cidade" placeholder="Entre com a Cidade">
 
     <label for="estado">Estado</label>  
     <input type="text" class="form-control" id="estado"
     name="estado" placeholder="Entre com o Estado">
     
 
    <button type="submit" id="botao" class="btn btn-primary"> Incluir</button>
    </form>
    </div>
 
<!-- Carregando bibliotecas corretamente -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>
 
    <script type="text/javascript">
        // Função para mascaramento automatico de cpf ou cnpj
        var options = {
            onKeyPress: function (cpf, ev, el, op) {
                var masks = ['000.000.000-000', '00.000.000/0000-00'];
                $('.cpfOuCnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
            }
        }
       
        $('.cpfOuCnpj').length > 11 ? $('.cpfOuCnpj').mask('00.000.000/0000-00', options) : $('.cpfOuCnpj').mask('000.000.000-00#', options);
       
        // Função para buscar CEP via API do ViaCEP
        // Converte o JSON para os inputs que declararamos no form
        $(document).ready(function() {
            $("#cep").blur(function() {
                var cep = $(this).val().replace(/\D/g, '');
                if (cep.length === 8) {
                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/", function(dados) {
                        if (!("erro" in dados)) {
                            $("#logradouro").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#estado").val(dados.uf);
                        } else {
                            alert("CEP não encontrado.");
                        }
                    });
                }
            });
        });
 
        // Função para buscar CNPJ na API do minhareceita.org
        // Converte o JSON para os inputs que declararamos no form
        $(document).ready(function() {
           $("#cpf_cnpj").blur(function() {
                var cpf_cnpj = $(this).val().replace(/\D/g, ""); // Remove caracteres não numéricos
 
                if (cpf_cnpj.length === 14) { // CNPJ válido sem pontuação
                    $.getJSON(`https://minhareceita.org/${cpf_cnpj}`, function(dados) {
                        if (!dados.erro) {
                            $("#nome").val(dados.razao_social || "");
                            $("#logradouro").val((dados.descricao_tipo_de_logradouro || "") + " " + (dados.logradouro || ""));
                            $("#cep").val(dados.cep || "");
                            $("#cidade").val(dados.municipio || "");
                            $("#estado").val(dados.uf || "");
                            $("#bairro").val(dados.bairro || "");
                            $("#numero_endereco").val(dados.numero || "");
                            $("#complemento").val(dados.complemento || "");
                            $("#contato").val(dados.nome_socio || "");
                        } else {
                            alert("CNPJ não encontrado.");
                        }
                    }).fail(function() {
                        alert("Erro ao consultar a API.");
                    });
                }
            });
        });
 
 
        // Função para mascaramento do CEP após digitado, pra inserir o tracinho
        function formatarCEP(input) {
            let valor = input.value.replace(/\D/g, ""); // Remove tudo que não for número
            if (valor.length > 5) {
                valor = valor.substring(0, 5) + "-" + valor.substring(5, 8);
            }
            input.value = valor;
        }
    </script>
</body>
</html>