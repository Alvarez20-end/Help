<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION['usuario'])) {
    echo 0;
    exit();
}

$idUsuario = $_SESSION['usuario']['id'];

include "../../clases/Inicio.php";

$datos = array(
    'paterno' => $_POST['paternoInicio'],
    'materno' => $_POST['maternoInicio'],
    'nombre' => $_POST['nombreInicio'],
    'telefono' => $_POST['telefonoInicio'],
    'correo' => $_POST['correoInicio'],
    'fecha' => $_POST['fechaNacInicio'],
    'idUsuario' => $idUsuario
);

$Inicio = new Inicio();
echo $Inicio->actualizarPersonales($datos);