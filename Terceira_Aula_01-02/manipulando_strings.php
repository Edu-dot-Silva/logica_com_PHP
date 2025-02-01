<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terceiroa aula</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php
        $nome_completo ="Joaquim Ferreira Goulart";

        $posicao_espaco = strpos($nome_completo, " ");
        // strpos retorna a ultima posicao de alguma coisa que queremos dentro de uma string

        $ultima_posicao = strrpos($nome_completo, " ");
        // funcao substring retorna uma parte de uma string da posicao inicial ate posicao final começando do zero

        $primeiro_nome = substr($nome_completo, 0, $posicao_espaco);
        // funcao que retorna o tamnho da string desejada
        
        $sobrenome = substr($nome_completo, $ultima_posicao, strlen($nome_completo));

        echo("<h1> Nome completo: ". $nome_completo. "</h1>");
        echo("<h1> Primeiro nome: ". $primeiro_nome. "</h1>");
        echo("<h1> Sobrenome: ". $sobrenome. "</h1>");
    ?>
</body>
</html>
