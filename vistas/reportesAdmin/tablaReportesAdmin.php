<?php
include "../../clases/Conexion.php";
$con = new Conexion();
$conexion = $con->conectar();

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
    ON reporte.id_equipo = equipo.id_equipo
ORDER BY reporte.fecha DESC";

$respuesta = mysqli_query($conexion, $sql);
?>

<table id="tablaReportesAdminDataTable" class="table table-sm table-bordered dt-responsive nowrap" style="width:100%">
<thead>
<tr>
<th>#</th>
<th>Persona</th>
<th>Equipo</th>
<th>Fecha</th>
<th>Descripción</th>
<th>Estatus</th>
<th>Solución</th>
<th>Eliminar</th>
</tr>
</thead>
<tbody>
<?php while ($row = mysqli_fetch_array($respuesta)) { ?>
<tr>
<td><?php echo $row['idReporte']; ?></td>
<td><?php echo $row['nombrePersona']; ?></td>
<td><?php echo $row['nombreEquipo']; ?></td>
<td><?php echo $row['fecha']; ?></td>
<td><?php echo $row['problema']; ?></td>

<td>
<?php
if ($row['estatus'] == 0) {
echo '<span class="badge badge-success">Cerrado</span>';
} else {
echo '<span class="badge badge-primary">Abierto</span>';
}
?>
</td>

<td>
<button class="btn btn-info btn-sm"
onclick="obtenerDatosSolucion(<?php echo $row['idReporte']; ?>)"
data-toggle="modal" data-target="#modalAgregarSolucionReporte">
Solución
</button>

<?php if ($row['solucion'] != "") { ?>
<div><small><?php echo $row['solucion']; ?></small></div>
<?php } ?>
</td>

<td>
<button class="btn btn-danger btn-sm"
onclick="eliminarReporteAdmin(<?php echo $row['idReporte']; ?>)">
Eliminar
</button>
</td>

</tr>
<?php } ?>
</tbody>
</table>