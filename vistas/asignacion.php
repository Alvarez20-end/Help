<?php
include "header.php";

if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2) {
?>

<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">

            <h1 class="fw-light">Asignación de equipos</h1>

            <p class="lead">
                <button class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#modalAsignarEquipo">
                    <i class="fas fa-plus"></i> Asignar Equipo
                </button>
            </p>

            <hr>

            <div id="tablaAsignacionesLoad"></div>

        </div>
    </div>
</div>

<?php include "reportesAdmin/modalAgregarSolucion.php"; ?>
<?php include "footer.php"; ?>

<script src="../public/js/asignacion/asignacion.js"></script>

<script>
$(document).ready(function(){

    $('#tablaAsignacionesLoad').load("asignacion/tablaAsignacion.php", function(){

        let tabla = $('#tablaAsignacionDataTable').DataTable({
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
            .appendTo('#tablaAsignacionDataTable_wrapper .col-md-6:eq(0)');

    });

});
</script>

<?php
} else {
    header("location:../index.html");
}
?>