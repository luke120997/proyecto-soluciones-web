<?php session_start(); 
if ($_SESSION['usuario'] != 'admin') {
  header('location: ../index.php');
} 
require_once("controllersAdmin/controllersAdminReportes.php");
if (isset($_GET['mes'])) {
    $mes = $_GET['mes'];
    $lista = $obj->ventasMes($mes);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <?php include 'librerias.php'; ?>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Total'],
      <?php 
      foreach($lista as $campo){ 
        $mes1 = $campo['fecha'];
        $total =  $campo['total']*1;
        echo "['fecha: $mes1'," .$total ."],";
      } 
      ?>
        ]);
      var texto = "REPORTE VENTAS DEL MES "+$('#current_month').val();
      var options = { title: texto};
      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
      chart.draw(data, options);
    }
  </script>
</head>
<body>
<?php include 'nav.php'; ?>
<div class="row">
    <div class="col-xs-2">
      <div class="form-group">
        <select class="form-control" id="calendario-grafico">
            <option value="1">Enero</option>
            <option value="2">Febrero</option>
            <option value="3">Marzo</option>
            <option value="4">Abril</option>
            <option value="5">Mayo</option>
            <option value="6">Junio</option>
            <option value="7">Julio</option>
            <option value="8">Agosto</option>
            <option value="9">Setiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
        </select>
      </div>  
      <div class="form-group">
        <button class="btn btn-primary" id="btn-mes">REPORTE</button>
      </div>
      <input type="hidden" value="<?php if(isset($_GET['mes'])){ echo mes($_GET['mes']); } ?>" id="current_month">
    </div>
</div>
<div class="row" id="piechart" style="width: 700px; height: 400px;"></div>
</body>
<script>
    $('#btn-mes').click(function(){
        var mes_grafico = $('#calendario-grafico').val();
        window.location.href = 'graficoMes.php?mes='+mes_grafico;
    });
</script>
</html>