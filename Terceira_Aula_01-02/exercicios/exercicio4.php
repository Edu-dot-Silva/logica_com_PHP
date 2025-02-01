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

// Escreva um algoritmo que receba um valor, calcule e mostre para o usuário 5% e 50% deste valor.    $valor = 200;
$valor = 100;    
$porcentagem_cinco = 5;
    $porcentagem_cinquenta = 50;
    $resultado_cinco = ($porcentagem_cinco * $valor)/100;
    $resultado_cinquenta = ($porcentagem_cinquenta * $valor)/100;

    echo($resultado_cinco);
    echo "<br>";
    echo($resultado_cinquenta);

    ?>
</body>
</html>
