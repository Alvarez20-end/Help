<?php
include "header.php";

if (isset($_SESSION['usuario'])) {

    include "../clases/Usuarios.php";

    $Usuarios = new Usuarios();
    $datos = $Usuarios->obtenerDatosUsuario($_SESSION['usuario']['id']);
?>

<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">

            <h1 class="fw-light">
                Bienvenido <?php echo $_SESSION['usuario']['nombre']; ?>
            </h1>

            <div class="row">
                <div class="col-sm-4">
                    Apellido paterno: <?php echo $datos['paterno']; ?>
                </div>

                <div class="col-sm-4">
                    Apellido materno: <?php echo $datos['materno']; ?>
                </div>

                <div class="col-sm-4">
                    Nombre: <?php echo $datos['nombrePersona']; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    Teléfono: <?php echo $datos['telefono']; ?>
                </div>

                <div class="col-sm-4">
                    Correo: <?php echo $datos['correo']; ?>
                </div>

                <div class="col-sm-4">
                    Edad: <?php echo $datos['fechaNacimiento']; ?>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
include "footer.php";

} else {
    header("location:../index.html");
}
?>