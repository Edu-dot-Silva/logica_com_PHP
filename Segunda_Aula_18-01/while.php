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

    $numero = 7;

    $i = 1;
    // no while o incremento é atribuido antes

    while($i <=10){
        echo($numero. " X ". $i . " = " . $numero * $i . "<br>");
        $i = $i +1;
        // essa linha para incrementar, sem ela entra em loop infinito de 7x1
    }

    // normalmente o for é para numero e while é para quando nao tem parametros/
    // exemplo: while para puxar todos os registros de um banco de dados que voce não sabe quantos registros tem

    ?>
</body>
</html>
