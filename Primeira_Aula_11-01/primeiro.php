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
    // tag de abertura php
    // pra rodar não esquecer de ativar o xammp
    // url localhost/nome_da_pasta/nome_do_arquivo.php

    echo("Primeiros comandos");

    echo ("<h1 class='titulo'> Testando comando echo </h1>");
    // echo é o print no navegador
    // tags html podem ser chamadas dentro do echo
    // para classes e id chamar apenas com ''

    echo("<h1 class='titulo'>". 5 + 5 ."</h1>");
    // o . é a concatenação 

    $primeiro_nome = "Eduardo";
    $segundo_nome = "Silva";

    echo("<h1 class='titulo'>Nome: ". $primeiro_nome ." ".$segundo_nome."</h1>");
    // concatenação de variaveis

    ?>
</body>
</html>