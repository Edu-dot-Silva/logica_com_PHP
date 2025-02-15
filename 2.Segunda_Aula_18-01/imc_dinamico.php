<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segunda aula</title>
    <link rel="stylesheet" href="imc_dinamico.css">
</head>
<body>
    <h1>Calcule seu IMC 👨🏻‍⚕️</h1>

    <form method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required placeholder="Digite seu nome"><br>
        
        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" required placeholder="Digite sua idade"><br>
        
        <label for="altura">Altura:</label>
        <input type="number" id="altura" step="0.01" min="0.01" name="altura" required placeholder="Digite sua altura X.XX"><br>
        
        <label for="peso">Peso:</label>
        <input type="number" id="peso" name="peso" step="0.1" min="1" required placeholder="Digite seu peso XX.X"><br>
        
        <input type="submit" value="Calcular" class="btn">
    </form>
    <?php
   if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nome = htmlspecialchars($_POST["nome"]);
    $peso = floatval($_POST["peso"]);
    $altura = floatval($_POST["altura"]);

    $imc = $peso / ($altura * $altura);


    echo("<p>$nome, seu IMC esta em: " . round($imc,2) . "</p>;<br> <p>Nivel: ");

    if ($imc < 18.5) {
        echo '<p style="color: blue;">Abaixo do peso normal</p>'; 
        echo "<img class='imagem' style='mix-blend-mode: multiply;' src='./tabela.png' alt='Tabela IMC'>";
    }
    else if ($imc >= 18.5 and $imc <= 24.9) {
        echo '<p style="color: green;">Peso normal</p>'; 
        echo "<img class='imagem' style='mix-blend-mode: multiply;' src='./tabela.png' alt='Tabela IMC'>";

    }
    else if ($imc >= 25.0 and $imc <= 29.9) {
        echo '<p style="color: orange;">Excesso de peso</p>';
        echo "<img class='imagem' style='mix-blend-mode: multiply;' src='./tabela.png' alt='Tabela IMC'>";
 
    }
    else if ($imc >= 30.0 and $imc <= 34.9) {
        echo '<p style="color: red;">Obesidade classe I</p>'; 
        echo "<img class='imagem' style='mix-blend-mode: multiply;' src='./tabela.png' alt='Tabela IMC'>";
 
    }
    else if ($imc >= 35.0 and $imc <= 39.9) {
        echo '<p style="color: darkred;">Obesidade classe II</p>'; 
        echo "<img class='imagem' style='mix-blend-mode: multiply;' src='./tabela.png' alt='Tabela IMC'>";

    }
    else {
        echo '<p style="color: darkviolet;">Obesidade classe III</p>'; 
        echo "<img class='imagem' style='mix-blend-mode: multiply;' src='./tabela.png' alt='Tabela IMC'>";

    }
}

    ?>
</body>
</html>
