<?php

include "../../../clases/Conexion.php";

$con = new Conexion();
$conexion = $con->conectar();

$idUsuario = $_POST['idUsuario'];

$sql = "DELETE FROM t_usuarios WHERE id_usuario = ?";
$query = $conexion->prepare($sql);
$query->bind_param("i", $idUsuario);

$respuesta = $query->execute();

echo $respuesta;

?>