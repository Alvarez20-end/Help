<!-- Modal -->
<div class="modal fade" id="modalAgregarUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">

    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#modalAgregarUsuarios').modal('hide')">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <form id="frmAgregarUsuario" method="POST" onsubmit="return agregarNuevoUsuario()">

    <div class="modal-body">

        <div class="row">

            <div class="col-sm-4">
                <label for="paterno">Apellido paterno</label>
                <input type="text" class="form-control" id="paterno" name="paterno" required>
            </div>
            <div class="col-sm-4">
                <label for="materno">Apellido materno</label>
                <input type="text" class="form-control" id="materno" name="materno" required>
            </div>
            <div class="col-sm-4">
                <label for="nombre">nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

        </div>

        <div class="row">

            <div class="col-sm-4">
                <label for="fechaNacimiento">fecha de nacimiento</label>
                <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento">
            </div>
            <div class="col-sm-4">
                <label for="sexo">sexo</label>
                <select class="form-control" id="sexo" name="sexo" required>
                    <option value=""></option>
                    <option value="F">femenino</option>
                    <option value="M">masculino</option>
                </select>
            </div>
            <div class="col-sm-4">
                <label for="telefono">telefono</label>
                <input type="text" class="form-control" id="telefono" name="telefono">
            </div>

        </div>

        <div class="row">

            <div class="col-sm-4">
                <label for="correo">correo</label>
                <input type="mail" class="form-control" id="correo" name="correo">
            </div>
            <div class="col-sm-4">
                <label for="usuario">usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario">
            </div>
            <div class="col-sm-4">
                <label for="password">password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

        </div>

        <div class="row">
            <div class="col-sm-12">
                <label for="idRol">Rol de usuario</label>
                <select name="idRol" id="idRol" class="form-control">
                    <option value="1">Cliente</option>
                    <option value="2">Administrador</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <label for="ubicacion">Ubicacion</label>
                <textarea name="ubicacion" id="ubicacion" class="form-control"></textarea>
            </div>
        </div>

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#modalAgregarUsuarios').modal('hide')">Cerrar</button>
        <button type="submit" class="btn btn-primary">agregar</button>
    </div>

    </form>

</div>
</div>
</div>