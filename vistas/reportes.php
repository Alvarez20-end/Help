<?php
include "header.php";
if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2) {
?>

<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">

            <h1 class="fw-light">Gestionar Reporte Usuarios</h1>

            <!-- TABLA -->
            <div id="tablaReporteAdminLoad"></div>

        </div>
    </div>
</div>

<?php
include "reportesAdmin/modalAgregarSolucion.php";
include "footer.php";
?>

<script src="../public/js/reportesAdmin/reportesAdmin.js"></script>

<!-- 🔥 AQUI ESTA LA MAGIA -->
<script>
$(document).ready(function(){

    $('#tablaReporteAdminLoad').load("reportesAdmin/tablaReportesAdmin.php", function(){

        let tabla = $('#tablaReportesAdminDataTable').DataTable({
            destroy: true,
            responsive: true,
            language: {
                url: "../public/datatable/es_es.json"
            },
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copy',
                    text: '<i class="fas fa-copy"></i> Copiar'
                },
                {
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel"></i> Excel'
                },
                {
                    extend: 'pdf',
                    text: '<i class="fas fa-file-pdf"></i> PDF'
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print"></i> Imprimir'
                }
            ]
        });

        // 🔥 ESTO ES CLAVE PARA QUE SE VEAN
        tabla.buttons().container()
            .appendTo('#tablaReportesAdminDataTable_wrapper .col-md-6:eq(0)');

    });

});
</script>

<?php
} else {
    header("location:../index.html");
}
?>
