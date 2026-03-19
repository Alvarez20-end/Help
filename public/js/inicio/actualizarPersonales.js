function actualizarDatosPersonales() {
    $.ajax({
        type: "POST",
        data: $('#frmActualizarDatosPersonales').serialize(),
        url: "../procesos/inicio/actualizarPersonales.php",
        success: function(respuesta) {
            respuesta = respuesta.trim();

            if (respuesta == 1) {
                Swal.fire(":D", "Actualizado con exito!", "success");
            } else {
                Swal.fire(":(", "Fallo al actualizar!" + respuesta, "error");
            }
        }
    });

    return false;
}