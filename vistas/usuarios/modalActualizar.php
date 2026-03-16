<!-- Modal -->
<form id="frmActualizarUsuario" method="POST">
<div class="modal fade" id="modalActualizarUsuarios" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">

<div class="modal-header">
<h5 class="modal-title">Actualizar usuario</h5>
<button type="button" class="close" data-dismiss="modal">
<span>&times;</span>
</button>
</div>

<div class="modal-body">

<input type="hidden" id="idUsuario" name="idUsuario">

<div class="row">

<div class="col-sm-4">
<label>Apellido paterno</label>
<input type="text" class="form-control" id="paternou" name="paterno">
</div>

<div class="col-sm-4">
<label>Apellido materno</label>
<input type="text" class="form-control" id="maternou" name="materno">
</div>

<div class="col-sm-4">
<label>Nombre</label>
<input type="text" class="form-control" id="nombreu" name="nombre">
</div>

</div>

<div class="row">

<div class="col-sm-4">
<label>Fecha nacimiento</label>
<input type="date" class="form-control" id="fechaNacimientou" name="fechaNacimiento">
</div>

<div class="col-sm-4">
<label>Sexo</label>
<select class="form-control" id="sexou" name="sexo">
<option value=""></option>
<option value="F">Femenino</option>
<option value="M">Masculino</option>
</select>
</div>

<div class="col-sm-4">
<label>Telefono</label>
<input type="text" class="form-control" id="telefonou" name="telefono">
</div>

</div>

<div class="row">

<div class="col-sm-4">
<label>Correo</label>
<input type="email" class="form-control" id="correou" name="correo">
</div>

<div class="col-sm-4">
<label>Usuario</label>
<input type="text" class="form-control" id="usuariou" name="usuario">
</div>

<div class="col-sm-4">
<label>Password</label>
<input type="password" class="form-control" name="password">
</div>

</div>

<div class="row">

<div class="col-sm-12">
<label>Rol</label>
<select name="idRol" id="idRolu" class="form-control">
<option value="1">Cliente</option>
<option value="2">Administrador</option>
</select>
</div>

</div>

<div class="row">

<div class="col-sm-12">
<label>Ubicación</label>
<textarea name="ubicacion" id="ubicacionu" class="form-control"></textarea>
</div>

</div>

</div>

<div class="modal-footer">

<button type="button" onclick="actualizarUsuario()" class="btn btn-warning">
Actualizar
</button>

</div>

</div>
</div>
</div>
</form>