$(document).ready(function(){
    $("#tablaUsuariosLoad").load("usuarios/tablaUsuarios.php");
});
function agregarNuevoUsuario(){

    $.ajax({
        type: "POST",
        data: $("#frmAgregarUsuario").serialize(),
        url: "../procesos/usuarios/crud/agregarNuevoUsuario.php",
        success:function(respuesta){
            console.log(respuesta);

            respuesta = respuesta.trim();

            if (respuesta == 1) {

                $("#tablaUsuariosLoad").load("usuarios/tablaUsuarios.php");
                $("#frmAgregarUsuario")[0].reset();

                Swal.fire("Agregado con exito!", "", "success");

            } else {

                Swal.fire("Error al agregar! " + respuesta, "", "error");

            }
        }
    });

    return false;
}
