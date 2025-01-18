<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segunda aula</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <!-- para deixar a variavel dinamica por um formulario -->

    <form method="post">
        <!-- formulario com metodo post -->
        <label for="numero">Digite o numero para tabuada</label>
        <input type="number" id="numero" name="numero" required>
        <input type="submit" value="Gerar">
    </form>

    <?php
   if($_SERVER["REQUEST_METHOD"] == "POST"){
    // se no servidor o metodo de requisição for post (esta sendo pq esta no formulario quando submetido)

    $numero = intval($_POST["numero"]);
    // a varivavel numero recebe a string que esta no input convertido para int

    echo("<h2>Tabuada do $numero</h2>");

    for($i = 1; $i<=10 ; $i++){
        echo($numero. " X ". $i." = ".$numero*$i."<br>");
        // faz o for para a tabuda com a variavel numero com o valor que foi atribuido para ela
    }
   }

    ?>
</body>
</html>
