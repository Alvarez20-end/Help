<?php
session_start();
include "header.php";

if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1) {

    include "../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();

    $idUsuario = $_SESSION['usuario']['id'];

    $sql = "SELECT 
                persona.id_persona AS idPersona
            FROM t_usuarios AS usuario
            INNER JOIN t_persona AS persona 
                ON usuario.id_persona = persona.id_persona
            WHERE usuario.id_usuario = '$idUsuario'";

    $respuesta = mysqli_query($conexion, $sql);
    $idPersona = mysqli_fetch_array($respuesta)[0];

    $sql = "SELECT
                equipo.nombre AS nombreEquipo,
                asignacion.marca,
                asignacion.modelo,
                asignacion.color,
                asignacion.descripcion,
                asignacion.memoria,
                asignacion.disco_duro AS discoDuro,
                asignacion.procesador,
                equipo.descripcion AS imagen
            FROM t_asignacion AS asignacion
            INNER JOIN t_cat_equipo AS equipo 
                ON asignacion.id_equipo = equipo.id_equipo
            WHERE asignacion.id_persona = '$idPersona'";

    $respuesta = mysqli_query($conexion, $sql);
?>

<div class="container mt-5">

    <!-- FONDO BLANCO CENTRAL -->
    <div class="p-4 bg-white rounded shadow">

        <h2 class="mb-4 text-center">Mis dispositivos</h2>

        <div class="row">

            <?php while($mostrar = mysqli_fetch_array($respuesta)) { ?>

                <div class="col-md-6 col-lg-4 mb-4">

                    <div class="card h-100 shadow-sm">

                        <div class="card-body">

                            <h5 class="card-title">
                                <?php echo $mostrar['imagen']; ?>
                                <?php echo $mostrar['nombreEquipo']; ?>
                            </h5>

                            <p class="card-text">
                                <?php echo $mostrar['descripcion']; ?>
                            </p>

                            <ul class="list-unstyled">
                                <li><strong>Marca:</strong> <?php echo $mostrar['marca']; ?></li>
                                <li><strong>Modelo:</strong> <?php echo $mostrar['modelo']; ?></li>
                                <li><strong>Color:</strong> <?php echo $mostrar['color']; ?></li>
                                <li><strong>Memoria:</strong> <?php echo $mostrar['memoria']; ?></li>
                                <li><strong>Disco Duro:</strong> <?php echo $mostrar['discoDuro']; ?></li>
                                <li><strong>Procesador:</strong> <?php echo $mostrar['procesador']; ?></li>
                            </ul>

                        </div>

                    </div>

                </div>

            <?php } ?>

        </div>

    </div>

</div>

<?php
include "footer.php";
} else {
    header("location:../index.html");
}
?>