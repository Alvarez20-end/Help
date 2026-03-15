<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$datos = array(
    "paterno" => $_POST['paterno'],
    "materno" => $_POST['materno'],
    "nombre" => $_POST['nombre'],
    "fechaNacimiento" => $_POST['fechaNacimiento'],
    "sexo" => $_POST['sexo'],
    "telefono" => $_POST['telefono'],
    "correo" => $_POST['correo'],
    "usuario" => $_POST['usuario'],
    "password" => $_POST['password'],
    "idRol" => $_POST['idRol'],
    "ubicacion" => $_POST['ubicacion']
);

include "../../../clases/Usuarios.php";

$Usuarios = new Usuarios();

echo $Usuarios->agregarNuevoUsuario($datos);