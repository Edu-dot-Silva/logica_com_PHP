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
// Escreva um algoritmo que leia 3 notas de um aluno e calcule a média final deste aluno, considerando que a média é ponderada, ou seja, o peso das notas são, respectivamente, 2, 3 e 5.
$nota1 = 7.5;  
$nota2 = 8.0;  
$nota3 = 9.0;  

$peso1 = 2;
$peso2 = 3;
$peso3 = 5;

$media = ($nota1 * $peso1 + $nota2 * $peso2 + $nota3 * $peso3) / ($peso1 + $peso2 + $peso3);

echo "A média ponderada é: " . number_format($media, 2, ',', '.') . "\n";
?>
</body>
</html>
