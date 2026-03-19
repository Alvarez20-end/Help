$(document).ready(function(){
    cargarTablaReportes();
});

function cargarTablaReportes() {

    $('#tablaReporteAdminLoad').load('reportesAdmin/tablaReportesAdmin.php', function(){

        $('#tablaReportesAdminDataTable').DataTable({
            destroy: true,
            responsive: true
        });

    });
}

// ELIMINAR
function eliminarReporteAdmin(idReporte) {
    $.ajax({
        type: "POST",
        data: "idReporte=" + idReporte,
        url: "../procesos/reportesCliente/eliminarReporteCliente.php",
        success: function(respuesta) {

            if (respuesta == 1) {
                cargarTablaReportes();
                Swal.fire("Correcto", "Eliminado", "success");
            } else {
                Swal.fire("Error", respuesta, "error");
            }
        }
    });
}

// OBTENER DATOS
function obtenerDatosSolucion(idReporte) {
    $.ajax({
        type:"POST",
        data:"idReporte=" + idReporte,
        url:"../procesos/reportesAdmin/obtenerSolucion.php",
        success:function(respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            $('#idReporte').val(respuesta['idReporte']);
            $('#solucion').val(respuesta['solucion']);
            $('#estatus').val(respuesta['estatus']);
        }
    });
}

function agregarSolucionReporte() {
    $.ajax({
        type:"POST",
        data:$('#frmAgregarSolucionReporte').serialize(),
        url:"../procesos/reportesAdmin/actualizarSolucion.php",
        success:function(respuesta) {

            respuesta = respuesta.trim();

            if (respuesta == 1) {
                Swal.fire(":D","Agregado con exito!", "success");
                $('#tablaReporteAdminLoad').load('reportesAdmin/tablaReportesAdmin.php');
            } else {
                Swal.fire(":(","Fallo! " + respuesta, "error");
            }

        }
    });
    return false;
} 