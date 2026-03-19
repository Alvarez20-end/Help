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

<!-- 🔥 FILTRO -->
<div class="mb-2">
    <select id="filtroEstado" class="form-control form-control-sm" style="width:200px;">
        <option value="">Todos</option>
        <option value="Abierto">Abierto</option>
        <option value="Cerrado">Cerrado</option>
    </select>
</div>

<table id="tablaReportesAdminDataTable" 
class="table table-sm table-bordered dt-responsive nowrap" style="width:100%">

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
<i class="fas fa-tools"></i>
</button>

<?php if ($row['solucion'] != "") { ?>
<div><small><?php echo $row['solucion']; ?></small></div>
<?php } ?>
</td>

<td>
<button class="btn btn-danger btn-sm"
onclick="eliminarReporteAdmin(<?php echo $row['idReporte']; ?>)">
<i class="fas fa-trash"></i>
</button>
</td>

</tr>
<?php } ?>
</tbody>
</table>

<script>
$(document).ready(function(){

    let tabla = $('#tablaReportesAdminDataTable').DataTable({
        destroy: true,
        responsive: true,
        language: {
            url: "../public/datatable/es_es.json"
        },
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
                text: '<i class="fas fa-copy"></i> Copiar',
                className: 'btn btn-secondary btn-sm'
            },
            {
                extend: 'excel',
                text: '<i class="fas fa-file-excel"></i> Excel',
                className: 'btn btn-success btn-sm'
            },
            {
                extend: 'pdf',
                text: '<i class="fas fa-file-pdf"></i> PDF',
                className: 'btn btn-danger btn-sm'
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print"></i> Imprimir',
                className: 'btn btn-dark btn-sm'
            }
        ]
    });

    // 🔥 MOVER BOTONES
    tabla.buttons().container()
        .appendTo('#tablaReportesAdminDataTable_wrapper .col-md-6:eq(0)');

    // 🔥 FILTRO POR ESTADO
    $('#filtroEstado').on('change', function(){
        tabla.column(5).search(this.value).draw();
    });

});
</script>