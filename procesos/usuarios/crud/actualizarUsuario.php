<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../../../clases/Usuarios.php";

$datos = array(
    "idUsuario" => $_POST['idUsuario'],
    "paterno" => $_POST['paterno'],
    "materno" => $_POST['materno'],
    "nombre" => $_POST['nombre'],
    "fechaNacimiento" => $_POST['fechaNacimiento'],
    "sexo" => $_POST['sexo'],
    "telefono" => $_POST['telefono'],
    "correo" => $_POST['correo'],
    "usuario" => $_POST['usuario'],
    "idRol" => $_POST['idRol'],
    "ubicacion" => $_POST['ubicacion']
);

$usuarios = new Usuarios();

echo $usuarios->actualizarUsuario($datos);