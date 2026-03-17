$(document).ready(function(){
    cargarTabla();
});

function cargarTabla(){

    $("#tablaAsignacionesLoad").load("asignacion/tablaAsignacion.php", function(){

        // destruir si ya existe
        if ($.fn.DataTable.isDataTable('#tablaAsignacionDataTable')) {
            $('#tablaAsignacionDataTable').DataTable().destroy();
        }

        // inicializar correctamente
        $('#tablaAsignacionDataTable').DataTable({
            responsive: {
                details: {
                    type: 'column',
                    target: 0
                }
            },
            columnDefs: [
                {
                    className: 'control',
                    orderable: false,
                    targets: 0
                }
            ],
            order: [1, 'asc'],
            autoWidth: false,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
            }
        });

    });

}

function asignarEquipo() {

    $.ajax({
        type: "POST",
        data: $('#frmAsignaEquipo').serialize(),
        url: "../procesos/asignacion/asignar.php",
        success:function(respuesta) {

            respuesta = respuesta.trim();

            if (respuesta == 1) {

                cargarTabla();

                $('#frmAsignaEquipo')[0].reset();

                $('#modalAsignarEquipo').modal('hide');

                Swal.fire(":D","Asignado con exito!","success");

            } else {

                Swal.fire(":(","Fallo al asignar! " + respuesta,"error");

            }

        }
    });

    return false;
}