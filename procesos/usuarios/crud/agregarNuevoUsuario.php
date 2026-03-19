<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_POST['paterno'])) {
    echo 0;
    exit();
}

// 🔐 encriptar password
$passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

$datos = array(
    "paterno" => $_POST['paterno'] ?? '',
    "materno" => $_POST['materno'] ?? '',
    "nombre" => $_POST['nombre'] ?? '',
    "fechaNacimiento" => $_POST['fechaNacimiento'] ?? '',
    "sexo" => $_POST['sexo'] ?? '',
    "telefono" => $_POST['telefono'] ?? '',
    "correo" => $_POST['correo'] ?? '',
    "usuario" => $_POST['usuario'] ?? '',
    "password" => $passwordHash, // 🔥 aquí ya va encriptado
    "idRol" => $_POST['idRol'] ?? '',
    "ubicacion" => $_POST['ubicacion'] ?? ''
);

include "../../../clases/Usuarios.php";

$Usuarios = new Usuarios();

$resultado = $Usuarios->agregarNuevoUsuario($datos);

echo $resultado;

?>