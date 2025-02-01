<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segunda aula</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php
// Escreva um algoritmo que receba o valor de um produto, acrescente 16% a esse valor, divida em 10 parcelas e mostre para o usuário o valor da parcela e o valor total da compra.

$valor = 100;
$porcentagem = 0.16;
$soma_porcentagem = $valor * $porcentagem;
$valor_final = $valor + $soma_porcentagem;
$parcelas = 10;
$valor_parcela = $valor_final / $parcelas;

echo "Valor total: R$ ".$valor_final;
echo "<br>";
echo "Valor parcela R$ ".$valor_parcela;
?>
</body>
</html>
