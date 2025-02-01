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

// Escreva um algoritmo que receba o valor de um produto e calcule um desconto de 7%, exibindo para o usuário o valor original, o valor do desconto e o valor com o desconto.
$valor = 100;
$desconto = $valor * 0.07;

$resultado = $valor - $desconto;

echo ("R$ ".$valor . " original");
echo "<br>";
echo ("R$ ".$desconto . " valor do desconto");
echo "<br>";
echo ("R$ ".$resultado . " com 7% de desconto");
?>
</body>
</html>
