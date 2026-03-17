$(document).ready(function(){
    cargarTabla();
});

function cargarTabla(){
    $("#tablaAsignacionesLoad").load("asignacion/tablaAsignacion.php", function(){

        if ($.fn.DataTable.isDataTable('#tablaAsignacionDataTable')) {
            $('#tablaAsignacionDataTable').DataTable().destroy();
        }

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

function eliminarAsignacion(idAsignacion) {

    Swal.fire({
        title: 'Estas seguro de eliminar este registro?',
        text: "Una vez eliminado no podra ser recuperado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ok'
    }).then((result) => {

        if (result.isConfirmed) {

            $.ajax({
                type: "POST",
                data: "idAsignacion=" + idAsignacion,
                url: "../procesos/asignacion/eliminarAsignacion.php",
                success:function(respuesta){

                    respuesta = respuesta.trim();

                    if (respuesta == 1) {

                        cargarTabla();

                        Swal.fire(":D","Eliminado con exito!","success");

                    } else {

                        Swal.fire(":(","Fallo al eliminar! " + respuesta,"error");

                    }

                }
            });

        }

    });

    return false;
}