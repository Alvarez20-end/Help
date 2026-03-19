<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include "../../../clases/Usuarios.php";

    // Validar que existan los datos antes de usarlos
    $datos = array(
        "idUsuario" => isset($_POST['idUsuario']) ? $_POST['idUsuario'] : '',
        "paterno" => isset($_POST['paterno']) ? $_POST['paterno'] : '',
        "materno" => isset($_POST['materno']) ? $_POST['materno'] : '',
        "nombre" => isset($_POST['nombre']) ? $_POST['nombre'] : '',
        "fechaNacimiento" => isset($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento'] : '',
        "sexo" => isset($_POST['sexo']) ? $_POST['sexo'] : '',
        "telefono" => isset($_POST['telefono']) ? $_POST['telefono'] : '',
        "correo" => isset($_POST['correo']) ? $_POST['correo'] : '',
        "usuario" => isset($_POST['usuario']) ? $_POST['usuario'] : '',
        "idRol" => isset($_POST['idRol']) ? $_POST['idRol'] : '',
        "ubicacion" => isset($_POST['ubicacion']) ? $_POST['ubicacion'] : ''
    );

    // Validación básica
    if (empty($datos['idUsuario']) || empty($datos['nombre'])) {
        echo "0"; // error
        exit();
    }

    $usuarios = new Usuarios();

    $respuesta = $usuarios->actualizarUsuario($datos);

    echo $respuesta;

} else {
    echo "Acceso no permitido";
}