<?php session_start(); 
if ($_SESSION['usuario'] != 'admin') {
  header('location: ../index.php');
} 
require_once("controllersAdmin/controllersAdminReportes.php");
if (isset($_GET['anio'])) {
  $anio = $_GET['anio'];
  $lista = $obj->ventasAnio($anio); 
}
?>
<!DOCTYPE html>
<html>
<head>
<?php include 'librerias.php'; ?>
<script>
google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

function drawChart() {

      var data = google.visualization.arrayToDataTable([
          ['Mes', 'Total'],
      <?php 
      foreach($lista as $campo){ 
        $mes = mes($campo['mes']);
        $total =  $campo['total_mes']*1;
        echo "['$mes'," .$total ."],";
      } 
      ?>
        ]);

        var options = {
          title: 'Total Ventas por mes del año ' + $('#current_year').val(),
        };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>
</head>
<body>
<?php include "nav.php" ?>
<div class="row">
    <div class="col-xs-2">
      <div class="form-group">
        <select class="form-control" id="year">
          <option value="2017">2017</option>
          <option value="2016">2016</option>
          <option value="2015">2015</option>
          <option value="2014">2014</option>
          <option value="2013">2013</option>
          <option value="2012">2012</option>
          <option value="2011">2011</option>
          <option value="2010">2010</option>
        </select>
      </div> 
      <div class="form-group">     
        <button class="btn btn-primary" id="btn-year">REPORTE</button>
        <input type="hidden" value="<?php if(isset($_GET['anio'])){ echo $_GET['anio']; } ?>" id="current_year">
      </div>  
    </div>
</div>
<div class="row" id="piechart" style="width: 900px; height: 500px;"></div>
</body>
<script type="text/javascript">
  $('#btn-year').click(function(){
        var year = $('#year').val();
        window.location.href = 'graficoAnio.php?anio='+year;
    });
</script>
</html>
  