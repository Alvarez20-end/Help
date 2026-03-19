<?php

include "../../../clases/Usuarios.php";

$Usuarios = new Usuarios();

$datos = array(
    "idUsuario" => $_POST['idUsuario'],
    "estatus" => $_POST['estatus']
);

$resultado = $Usuarios->cambiarEstatus($datos);

if ($resultado) {
    echo 1;
} else {
    echo 0;
}