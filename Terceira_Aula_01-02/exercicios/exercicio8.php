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

// Escreva um algoritmo que receba um valor, calcule e mostre um desconto de 9%.

$valor = 100;
$desconto = $valor * 0.09;

$resultado = $valor - $desconto;

echo ("R$ ".$resultado . " com 9% de desconto");
?>
</body>
</html>
