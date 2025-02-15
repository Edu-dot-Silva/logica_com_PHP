<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terceira aula</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php
    echo("<h1>Manipulando arrays em PHP</h1>");

     $alunos = array("Joao","Pedro","Paulo", "Walter", "Chris", "Maria");

     echo ("Array completo: ". json_encode($alunos));
    //  json_encode traz o array me formato json
     echo "<br>";
     echo "<br>";

     echo ("Aluno na posição 6: " .$alunos[1]);
    //  retornando baseado no index do array
    echo "<br>";
    echo "<br>";

    echo("Total de alunos (elementos do array): ". count($alunos));
    // trazendo o total de elementos no array
    echo "<br>";
    echo "<br>";


    $alunos[] = "Luana";
    // adicionando um elemento novo no array
    echo ("Adicionado mais um elemento no array: " . json_encode($alunos));

    echo "<br>";
    echo "<br>";

    array_pop($alunos);
    // remove o ultimo elemento do array

    unset($alunos[1]);
    // remove o elemento do array baseado na posicao

    echo ("Array depois de excluir o ultimo e uma posicao especifica" .json_encode($alunos));
    
    echo "<br>";
    echo "<br>";

    echo ("<h2>Listando os elementos do array em ordem crescente</h2>");

    sort($alunos);
    // a função sort orderna o array em ordem crescente

    foreach($alunos as $aluno){
        echo $aluno. "<br>";
    }

    echo ("<h2>Listando os elementos do array em ordem descrescente</h2>");

    rsort($alunos);
    // a função sort orderna o array em ordem descrescente

    foreach($alunos as $aluno){
        echo $aluno. "<br>";
    }

    $celulares = array(
        "Eduardo" => "Samsung Galaxy S23",
        "Maria" => "iPhone 14 Pro Max",
        "Carlos" => "Motorola Edge 30",
        "Ana" => "Xiaomi 13 Pro",
        "Lucas" => "OnePlus 11 5G"
    );
    // array com chave e valor

    echo ("<h2>Array com chave a valor</h2>");
    echo ("Array chave a valor completo: " . json_encode($celulares));

    echo "<br>";
    echo "<br>";

    echo ("Valor de uma chave especifica: ". $celulares["Maria"]);
    // printando uma celular x de uma valor x

    echo "<br>";
    echo "<br>";

    echo("<h2> Array com linhas e colunas multidimensionais </h2>");

    $carros = array(
        array("Volvo",22,18),
        array("BMW",15,13),
        array("Saab",5,2),
        array("Land Rover",17,15)
    );

    echo("Array completo: ".json_encode($carros));
    echo "<br>";
    echo ("Carro da posição 0.0: ". $carros[0][0]);
    echo "<br>";
    echo ("Carro da posição 3.0: ". $carros[3][0]);

    echo("<h2>Array de pessoas (Banco de dados)</h2>");

        $pessoas = array(
            array("Maria","(11) 91234-5678","maria@gmail.com"),
            array("Jose","(11) 91234-5678","jose@gmail.com"),
            array("Marcos","(11) 91234-5678","marcos@gmail.com"),
            array("Andrea","(11) 91234-5678","Andrea@gmail.com")
        );

        echo ("Array completo: ".json_encode($pessoas));
        echo "<br>";
        echo "<br>";


        echo("Posição 0.0: ".$pessoas[0][0]);
        echo "<br>";
        echo("Posição 3.1: ".$pessoas[3][1]);
        echo "<br>";
        echo("Posição 1.2: ".$pessoas[1][2]);
        echo "<br>";
        echo ("Numero de pessoas no array: ".count($pessoas));
    

    ?>
</body>
</html>


