<?php
  $con = mysqli_connect("localhost", "root", "","wt");
  $qry = mysqli_query($con, "SELECT `tname`, `rating` FROM `ctt`");
  if($qry){
    $cd[] = ["Teacher", "Rating"];
    while($pie = mysqli_fetch_assoc($qry)){
      settype($pie['rating'], "int");
      $cd[] = [$pie['tname'], $pie['rating']];
    }
    $jso = json_encode($cd);
    //echo $jso;
  }
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable(
          <?php echo $jso; ?>
        );

        var options = {
          title: "Teacher's Rating Graph"
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>