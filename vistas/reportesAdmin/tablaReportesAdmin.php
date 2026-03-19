<?php
session_start();
include "../../clases/Conexion.php";

$con = new Conexion();
$conexion = $con->conectar();

$contador = 1;

$sql = "SELECT
    reporte.id_reporte AS idReporte,
    CONCAT(persona.paterno,' ',persona.materno,' ',persona.nombre) AS nombrePersona,
    equipo.nombre AS nombreEquipo,
    reporte.descripcion_problema AS problema,
    reporte.estatus AS estatus,
    reporte.solucion_problema AS solucion,
    reporte.fecha AS fecha
FROM t_reportes AS reporte
INNER JOIN t_usuarios AS usuario 
    ON reporte.id_usuario = usuario.id_usuario
INNER JOIN t_persona AS persona 
    ON usuario.id_persona = persona.id_persona
INNER JOIN t_cat_equipo AS equipo 
    ON reporte.id_equipo = equipo.id_equipo";

$respuesta = mysqli_query($conexion, $sql);
?>

<table class="table table-sm table-bordered" id="tablaReportesAdminDataTable">
    <thead>
        <th>#</th>
        <th>Persona</th>
        <th>Dispositivo</th>
        <th>Fecha</th>
        <th>Descripcion</th>
        <th>Estatus</th>
        <th>Solucion</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
        <?php while ($mostrar = mysqli_fetch_array($respuesta)) { ?>
        <tr>
            <td><?php echo $contador++; ?></td>
            <td><?php echo $mostrar['nombrePersona']; ?></td>
            <td><?php echo $mostrar['nombreEquipo']; ?></td>
            <td><?php echo $mostrar['fecha']; ?></td>
            <td><?php echo $mostrar['problema']; ?></td>

            <td>
                <?php
                if ($mostrar['estatus'] == 1) {
                    echo '<span class="badge badge-secondary">Pendiente</span>';
                } else {
                    echo '<span class="badge badge-success">Atendido</span>';
                }
                ?>
            </td>

            <td><?php echo $mostrar['solucion']; ?></td>

            <td>
                <?php if ($mostrar['solucion'] == "") { ?>
                    <button class="btn btn-danger btn-sm"
                        onclick="eliminarReporteAdmin(<?php echo $mostrar['idReporte'] ?>)">
                        Eliminar
                    </button>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script>
$(document).ready(function(){
    $('#tablaReportesAdminDataTable').DataTable();
});
</script>