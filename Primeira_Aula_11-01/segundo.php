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
        $numero1 = 5;
        $numero2 = 2;
        $resultado1 = $numero1 + $numero2;
        $resultado2 = $numero1 - $numero2;
        $resultado3 = $numero1 * $numero2;
        $resultado4 = $numero1 / $numero2;
        echo("<h1>A soma é: ". $resultado1 ."</h1>");
        echo("<h1>A subtração é: ". $resultado2 ."</h1>");
        echo("<h1>A multiplicação é: ". $resultado3 ."</h1>");
        echo("<h1>A divisao é: ". $resultado4 ."</h1>");

        echo($numero1 . $numero2);
        // aqui o resultado é 52 pq apenas concatenou
        
        
    ?>
    
</body>
</html>