 <?php

include "../../../clases/Usuarios.php";

$usuarios = new Usuarios();

$datos = array(
    "password" => $_POST['passwordReset'],
    "idUsuario" => $_POST['idUsuarioReset']
);

echo $usuarios->resetPassword($datos);

?>