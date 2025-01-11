<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primeira Aula</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php
        $peso = 120;
        $altura = 1.75; 
        $imc = $peso/($altura+$altura);   

        echo("Seu IMC esta em: ". number_format($imc,2,".",","). "<br> Nivel: ");
        // formatador de casas decimais em php, um metodo que recebe o numero, a quantidade de casas, o separador da variavel e o separador do resultado

        if ($imc < 18.5 ){
            echo("Abaixo do peso normal");
        }
        else if ($imc >= 18.5 and $imc <= 24.9 ){
            echo("Peso normal");
        }
        else if ($imc >= 25.0 and $imc <= 29.9 ){
            echo("Excesso de peso");
        }
        else if ($imc >= 30.0 and $imc <= 34.9 ){
            echo("Obesidade clase I");
        }
        else if ($imc >= 35.0 and $imc <= 39.9 ){
            echo("Obesidade clase II");
        }
        else{
            echo("Obesidade clase III");
        }

    ?>
</body>
</html>