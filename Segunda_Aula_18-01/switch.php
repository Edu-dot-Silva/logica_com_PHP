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

    $dia_semana = "quarta";

    switch($dia_semana){
        case "segunda";
        echo("Hoje é Segunda Feira");
        break;

        case "terca";
        echo("Hoje é Terça Feira");
        break;

        case "quarta";
        echo("Hoje é Quarta Feira");
        break;

        case "quinta";
        echo("Hoje é Quinta Feira");
        break;

        case "sexta";
        echo("Hoje é Sexta Feira");
        break;

        case "sabado";
        echo("Hoje é Sabádo");
        break;

        case "domingo";
        echo("Hoje é Domingo");
        break;

        default:
        echo("Dia invalido!!!");
        // default é uma excessao que nao existe no processamento
    }

    // switch faz sentido para ser usado em menus

    ?>
</body>
</html>
