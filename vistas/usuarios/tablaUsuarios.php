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

<style>
td.details-control {
    background: url('https://www.datatables.net/examples/resources/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('https://www.datatables.net/examples/resources/details_close.png') no-repeat center center;
}
</style>

<table class="table table-sm dt-responsive nowrap" id="tablaUsuariosDataTable" style="width:100%">

<thead>
<tr>
    <th></th>
    <th>Apellido paterno</th>
    <th>Apellido materno</th>
    <th>Nombre</th>
    <th>Edad</th>
    <th>Telefono</th>
    <th>Correo</th>
    <th>Usuario</th>
    <th>Ubicacion</th>
    <th>Sexo</th>
    <th>Reset</th>
    <th>Activar</th>
    <th>Editar</th>
    <th>Eliminar</th>
</tr>
</thead>

<tbody>

<?php while ($mostrar = mysqli_fetch_array($respuesta)) { ?>

<tr>

    <td class="details-control"></td>

    <td><?php echo $mostrar['paterno']; ?></td>
    <td><?php echo $mostrar['materno']; ?></td>
    <td><?php echo $mostrar['nombrePersona']; ?></td>
    <td></td>
    <td><?php echo $mostrar['telefono']; ?></td>
    <td><?php echo $mostrar['correo']; ?></td>
    <td><?php echo $mostrar['nombreUsuario']; ?></td>
    <td><?php echo $mostrar['ubicacion']; ?></td>
    <td><?php echo $mostrar['sexo']; ?></td>

    <td>
        <button class="btn btn-success btn-sm">
            <span class="fas fa-exchange-alt"></span>
        </button>
    </td>

    <td>
        <?php if ($mostrar['estatus'] == 1) { ?>
            <button class="btn btn-info btn-sm">Activo</button>
        <?php } else { ?>
            <button class="btn btn-secondary btn-sm">Inactivo</button>
        <?php } ?>
    </td>

    <td>
        <button class="btn btn-warning btn-sm"
        data-toggle="modal"
        data-target="#modalActualizarUsuarios"
        onclick="obtenerDatosUsuario('<?php echo $mostrar['idUsuario']; ?>')">
            Editar
        </button>
    </td>

    <td>
        <button class="btn btn-danger btn-sm">
            Eliminar
        </button>
    </td>

</tr>

<?php } ?>

</tbody>
</table>

<script>
function format(d) {
    return `
        <table cellpadding="5" cellspacing="0" border="0">
            <tr><td><b>Correo:</b></td><td>${d[6]}</td></tr>
            <tr><td><b>Usuario:</b></td><td>${d[7]}</td></tr>
            <tr><td><b>Ubicación:</b></td><td>${d[8]}</td></tr>
        </table>
    `;
}

$(document).ready(function() {

    var table = $('#tablaUsuariosDataTable').DataTable({
        language: {
            url: "../public/datatable/es_es.json"
        },
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    $('#tablaUsuariosDataTable tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row(tr);

        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('shown');
        } else {
            row.child(format(row.data())).show();
            tr.addClass('shown');
        }
    });

});
</script>