<?php
 
   // grafico.php
   // https://developers.google.com/chart/interactive/docs/gallery?hl=pt-br
   include 'conexao.php'; // Conectamos ao banco de dados
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Estado', 'Quantidade'],
          <?php
          $sql = "select estado,sum(quantidade) as total from vendas group by estado"; // Consulta a tabela
          $stmt = $pdo->query($sql); // Executa a consulta usando PDO
          // Laço para trazer os dados da consulta
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { // exibir registro por registro até o fim
              $estado = $row['estado']; // Retorna o Estado
              $total = $row['total']; // Retorna o total vendido
              ?>
 
          ['<?php echo($estado)?>',     <?php echo($total)?>], // exibindo estado e total
 
          <?php
          }  // fechando o laço while
          ?>
 
        ]);
       
        var options = {
          title: 'Vendas por estado', // Titulo do gráfico
          is3D: true,
        };
 
        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <!-- Podemos definir o tamanho do gráfico  -->
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>
</html>