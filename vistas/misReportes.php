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
            
            <h1 class="fw-light">Mis Reportes</h1>

            <p class="lead">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalCrearReporte">
                    <i class="fas fa-plus"></i> Crear Reporte
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

    $('#tablaReporteClienteLoad').load("reportesCliente/tablaReporteCliente.php", function(){

        let tabla = $('#tablaReportesClienteDataTable').DataTable({
            destroy: true,
            responsive: true,
            language: {
                url: "../public/datatable/es_es.json"
            },
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copy',
                    text: '<i class="fas fa-copy"></i> Copiar',
                    className: 'btn btn-secondary'
                },
                {
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel"></i> Excel',
                    className: 'btn btn-success'
                },
                {
                    extend: 'pdf',
                    text: '<i class="fas fa-file-pdf"></i> PDF',
                    className: 'btn btn-danger'
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print"></i> Imprimir',
                    className: 'btn btn-dark'
                }
            ]
        });

        tabla.buttons().container()
            .appendTo('#tablaReportesClienteDataTable_wrapper .col-md-6:eq(0)');

    });

});
</script>

<?php
} else {
    header("location:../index.html");
}
?>