<?php
include "../../clases/Conexion.php";

$con = new Conexion();
$conexion = $con->conectar();

$sql = "SELECT
            usuarios.id_usuario AS idUsuario,
            usuarios.usuario AS nombreUsuario,
            roles.nombre AS rol,
            usuarios.id_rol AS idRol,
            usuarios.ubicacion AS ubicacion,
            usuarios.activo AS estatus,
            usuarios.id_persona AS idPersona,
            persona.nombre AS nombrePersona,
            persona.paterno AS paterno,
            persona.materno AS materno,
            persona.fecha_nacimiento AS fechaNacimiento,
            persona.sexo AS sexo,
            persona.correo AS correo,
            persona.telefono AS telefono
        FROM t_usuarios AS usuarios
        INNER JOIN t_cat_roles AS roles ON usuarios.id_rol = roles.id_rol
        INNER JOIN t_persona AS persona ON usuarios.id_persona = persona.id_persona";

$respuesta = mysqli_query($conexion, $sql);
?>

<table class="table table-sm table-bordered dt-responsive nowrap" 
id="tablaUsuariosDataTable" style="width:100%">

<thead>
<tr>
    <th></th>
    <th>Paterno</th>
    <th>Materno</th>
    <th>Nombre</th>
    <th>Teléfono</th>
    <th>Correo</th>
    <th>Usuario</th>
    <th>Ubicación</th>
    <th>Sexo</th>
    <th>Reset</th>
    <th>Estatus</th>
    <th>Editar</th>
    <th>Eliminar</th>
</tr>
</thead>

<tbody>

<?php while ($mostrar = mysqli_fetch_array($respuesta)) { ?>

<tr>

<td></td>

<td><?php echo $mostrar['paterno']; ?></td>
<td><?php echo $mostrar['materno']; ?></td>
<td><?php echo $mostrar['nombrePersona']; ?></td>
<td><?php echo $mostrar['telefono']; ?></td>
<td><?php echo $mostrar['correo']; ?></td>
<td><?php echo $mostrar['nombreUsuario']; ?></td>
<td><?php echo $mostrar['ubicacion']; ?></td>
<td><?php echo $mostrar['sexo']; ?></td>
<td>
    <button class="btn btn-success btn-sm"
    data-toggle="modal" data-target="#modalResetPassword" 
    onclick="agregarIdUsuarioReset(<?php echo $mostrar['idUsuario'] ?>)">
        <i class="fas fa-sync"></i>
    </button>
</td>

<!-- ESTATUS -->
<td>
    <button 
        class="btn btn-sm <?php echo ($mostrar['estatus'] == 1 ? 'btn-success' : 'btn-secondary'); ?>"
        onclick="cambiarEstatusUsuario(this, <?php echo $mostrar['idUsuario']; ?>, <?php echo $mostrar['estatus']; ?>)">
        
        <?php echo ($mostrar['estatus'] == 1 ? 'Activo' : 'Inactivo'); ?>
    </button>
</td>

<!-- EDITAR -->
<td>
    <button class="btn btn-warning btn-sm"
    data-toggle="modal"
    data-target="#modalActualizarUsuarios"
    onclick="obtenerDatosUsuario('<?php echo $mostrar['idUsuario']; ?>')">
        <i class="fas fa-edit"></i>
    </button>
</td>

<!-- ELIMINAR -->
<td>
    <button class="btn btn-danger btn-sm"
        onclick="eliminarUsuario(<?php echo $mostrar['idUsuario']; ?>)">
        <i class="fas fa-trash"></i>
    </button>
</td>

</tr>

<?php } ?>

</tbody>
</table>

<script>
$(document).ready(function(){

    let tabla = $('#tablaUsuariosDataTable').DataTable({
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
                className: 'btn btn-secondary'
            },
            {
                extend: 'excel',
                text: '<i class="fas fa-file-excel"></i> Excel',
                className: 'btn btn-success'
            },
            {
                extend: 'pdf',
                text: '<i class="fas fa-file-pdf"></i> PDF',
                className: 'btn btn-danger'
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print"></i> Imprimir',
                className: 'btn btn-dark'
            }
        ]
    });

    tabla.buttons().container()
        .appendTo('#tablaUsuariosDataTable_wrapper .col-md-6:eq(0)');

});
</script> 