function datosPersonalesInicio(idUsuario) {

    console.log("ID que se envía:", idUsuario); // 🔥 DEBUG

    $.ajax({
        type: "POST",
        url: "../procesos/usuarios/crud/obtenerDatosUsuario.php",
        data: {
            idUsuario: idUsuario
        },
        success: function(respuesta) {

            console.log("RESPUESTA:", respuesta);

            $('#paterno').text(respuesta.paterno);
            $('#materno').text(respuesta.materno);
            $('#nombre').text(respuesta.nombrePersona);
            $('#telefono').text(respuesta.telefono);
            $('#correo').text(respuesta.correo);
            $('#edad').text(respuesta.fechaNacimiento);
        }
    });
}