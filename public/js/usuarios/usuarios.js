$(document).ready(function(){
    $("#tablaUsuariosLoad").load("usuarios/tablaUsuarios.php");
});

/* AGREGAR */
function agregarNuevoUsuario(){
    $.ajax({
        type: "POST",
        data: $("#frmAgregarUsuario").serialize(),
        url: "../procesos/usuarios/crud/agregarNuevoUsuario.php",
        success:function(respuesta){
            respuesta = respuesta.trim();

            if(respuesta == 1){
                $("#tablaUsuariosLoad").load("usuarios/tablaUsuarios.php");
                $("#frmAgregarUsuario")[0].reset();
                $("#modalAgregarUsuarios").modal('hide');
                Swal.fire(":D","Agregado con exito!","success");
            }else{
                Swal.fire(":(","Error: " + respuesta,"error");
            }
        }
    });
    return false;
}

/* OBTENER */
function obtenerDatosUsuario(idUsuario){
    $.ajax({
        type: "POST",
        data: "idUsuario=" + idUsuario,
        url: "../procesos/usuarios/crud/obtenerDatosUsuario.php",
        success:function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);

            $("#idUsuario").val(respuesta['idUsuario']);
            $("#paternou").val(respuesta['paterno']);
            $("#maternou").val(respuesta['materno']);
            $("#nombreu").val(respuesta['nombrePersona']);
            $("#fechaNacimientou").val(respuesta['fechaNacimiento']);
            $("#sexou").val(respuesta['sexo']);
            $("#telefonou").val(respuesta['telefono']);
            $("#correou").val(respuesta['correo']);
            $("#usuariou").val(respuesta['nombreUsuario']);
            $("#idRolu").val(respuesta['idRol']);
            $("#ubicacionu").val(respuesta['ubicacion']);
        }
    });
}

/* ACTUALIZAR */
function actualizarUsuario(){
    $.ajax({
        type: "POST",
        data: $("#frmActualizarUsuario").serialize(),
        url: "../procesos/usuarios/crud/actualizarUsuario.php",
        success:function(respuesta){
            respuesta = respuesta.trim();

            if(respuesta == 1){
                $("#tablaUsuariosLoad").load("usuarios/tablaUsuarios.php");
                $("#modalActualizarUsuarios").modal('hide');
                Swal.fire(":D","Actualizado","success");
            }else{
                Swal.fire("Error", respuesta,"error");
            }
        }
    });
    return false;
}

/* RESET */
function agregarIdUsuarioReset(idUsuario){
    $('#idUsuarioReset').val(idUsuario);
}

function resetPassword(){
    $.ajax({
        type: "POST",
        data: $('#frmActualizaPassword').serialize(),
        url: "../procesos/usuarios/extras/resetPassword.php",
        success: function(respuesta){
            respuesta = respuesta.trim();

            if (respuesta == 1){
                $('#modalResetPassword').modal('hide');
                Swal.fire("Listo","Password cambiado","success");
            }else{
                Swal.fire("Error",respuesta,"error");
            }
        }
    });
    return false;
}

/* ESTATUS */
function cambiarEstatusUsuario(btn, idUsuario, estatus){
    let nuevoEstatus = (estatus == 1) ? 0 : 1;

    $.ajax({
        type: "POST",
        url: "../procesos/usuarios/crud/cambiarEstatus.php",
        data: {
            idUsuario: idUsuario,
            estatus: nuevoEstatus
        },
        success: function(respuesta){

            respuesta = respuesta.trim();

            if (respuesta == 1){

                if (nuevoEstatus == 1){
                    $(btn).removeClass("btn-secondary").addClass("btn-success").text("Activo");
                }else{
                    $(btn).removeClass("btn-success").addClass("btn-secondary").text("Inactivo");
                }

                $(btn).attr("onclick", 
                    "cambiarEstatusUsuario(this," + idUsuario + "," + nuevoEstatus + ")"
                );

                $("#tablaUsuariosLoad").load("usuarios/tablaUsuarios.php");

            }else{
                Swal.fire("Error",respuesta,"error");
            }
        }
    });
}

/* ELIMINAR 🔥 */
function eliminarUsuario(idUsuario){

    Swal.fire({
        title: "¿Eliminar usuario?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí"
    }).then((result)=>{

        if(result.isConfirmed){

            $.ajax({
                type: "POST",
                url: "../procesos/usuarios/crud/eliminarUsuario.php",
                data: "idUsuario=" + idUsuario,
                success:function(respuesta){

                    respuesta = respuesta.trim();

                    if(respuesta == 1){
                        $("#tablaUsuariosLoad").load("usuarios/tablaUsuarios.php");
                        Swal.fire("Eliminado","","success");
                    }else{
                        Swal.fire("Error",respuesta,"error");
                    }

                }
            });

        }

    });
}