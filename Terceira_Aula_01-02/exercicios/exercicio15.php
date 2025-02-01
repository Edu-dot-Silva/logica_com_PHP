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
// Escreva um algoritmo que receba de entrada a distância total (em km) percorrida por um automóvel e a quantidade de combustível (em litros) consumida para percorrê-la, calcule e imprima o consumo médio de combustível.  Fórmula: Consumo médio = Km / litros

$distancia_percorrida = 500; 
$combustivel_consumido = 40; 

$consumo_medio = $distancia_percorrida / $combustivel_consumido;

echo "O consumo médio de combustível é: " . $consumo_medio . " km/l.";
?>
</body>
</html>
