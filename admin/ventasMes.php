<?php session_start(); 
require_once('controllersAdmin/controllersAdminReportes.php');

$reportes_mes = array();
if (isset($_GET['mes'])) {
    $mes = $_GET['mes'];
    $reportes_mes = $obj->ventasMes($mes);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>ADMINISTRADOR</title>
    <?php include 'librerias.php'; ?>
</head>
<body>
<div class="container-fluid"> 
    <div class="row">
        <?php include 'nav.php'; ?>
    </div> 
    <div class="row">
        <div class="col-xs-2">
            <select class="form-control" id="calendario">
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
        <button class="btn btn-primary" id="btn-month">REPORTE</button>
    </div>
    <div class="row" id="reports">
        <?php if(isset($_GET['mes'])){ ?>
        <?php if(!empty($reportes_mes)){ ?>
        <h2><?php echo 'REPORTES DE '.mes($_GET['mes']); ?></h2>
        <table class="table" id="table-report"> 
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Total ventas</th>
                </tr>
            </thead>
            <tbody>'
                <tr>
        <?php  foreach ($reportes_mes as $value) { ?>
                <tr>
                    <td><?php echo $value['fecha']; ?></td>
                    <td><?php echo $value['total']; ?></td>
                </tr>
        <?php }?>
                </tr>
            </tbody>
        </table>
        <hr>
    <?php }else{ ?>
    <h2><?php echo 'NO SE ENCONTRARON REGISTROS DE '.mes($_GET['mes']); ?></h2>
    <?php }} ?>
    </div>
    <input type="hidden" value="<?php echo mes($_GET['mes']); ?>" id="PDF">
</div>
</body>
<script type="text/javascript">
    $('#btn-month').click(function(){
        var month = $('#calendario').val();
        window.location.href = 'ventasMes.php?mes='+month;
        });
</script>
</html>  