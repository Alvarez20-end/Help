<?php
session_start();
include "header.php";
include "../clases/Conexion.php";

$con = new Conexion();
$conexion = $con->conectar();

if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1) {
?>

<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            
            <h1 class="fw-light">Reportes de cliente</h1>

            <p class="lead">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalCrearReporte">
                    Crear Reporte
                </button>
            </p>

            <hr>

            <div id="tablaReporteClienteLoad"></div>

        </div>
    </div>
</div>

<?php
include "reportesCliente/modalCrearReporte.php";
include "footer.php";
?>

<script src="../public/js/reportesCliente/reportesCliente.js"></script>

<script>
$(document).ready(function(){
    $('#tablaReporteClienteLoad').load("reportesCliente/tablaReporteCliente.php");
});
</script>

<?php
} else {
    header("location:../index.html");
}
?>