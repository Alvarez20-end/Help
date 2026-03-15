<!-- Modal -->
<form id="frmActrualizarUsuario" method="POST" onsubmit="return actualizarUsuario()">
<div class="modal fade" id="modalActualizarUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">

    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar usuariou</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#modalAgregarUsuarios').modal('hide')">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">

        <div class="row">

            <div class="col-sm-4">
                <label for="paternou">Apellido paternou</label>
                <input type="text" class="form-control" id="paternou" name="paternou" required>
            </div>
            <div class="col-sm-4">
                <label for="maternou">Apellido maternou</label>
                <input type="text" class="form-control" id="maternou" name="maternou" required>
            </div>
            <div class="col-sm-4">
                <label for="nombreu">nombreu</label>
                <input type="text" class="form-control" id="nombreu" name="nombreu" required>
            </div>

        </div>

        <div class="row">

            <div class="col-sm-4">
                <label for="fechaNacimientou">fecha de nacimiento</label>
                <input type="date" class="form-control" id="fechaNacimientou" name="fechaNacimientou">
            </div>
            <div class="col-sm-4">
                <label for="sexou">sexou</label>
                <select class="form-control" id="sexou" name="sexou" required>
                    <option value=""></option>
                    <option value="F">femenino</option>
                    <option value="M">masculino</option>
                </select>
            </div>
            <div class="col-sm-4">
                <label for="telefonou">telefonou</label>
                <input type="text" class="form-control" id="telefonou" name="telefonou">
            </div>

        </div>

        <div class="row">

            <div class="col-sm-4">
                <label for="correou">correou</label>
                <input type="mail" class="form-control" id="correou" name="correou">
            </div>
            <div class="col-sm-4">
                <label for="usuariou">usuariou</label>
                <input type="text" class="form-control" id="usuariou" name="usuariou">
            </div>
            <div class="col-sm-4">
                <label for="password">password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

        </div>

        <div class="row">
            <div class="col-sm-12">
                <label for="idRolu">Rol de usuariou</label>
                <select name="idRolu" id="idRolu" class="form-control">
                    <option value="1">Cliente</option>
                    <option value="2">Administrador</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <label for="ubicacionu">Ubicacion</label>
                <textarea name="ubicacionu" id="ubicacionu" class="form-control"></textarea>
            </div>
        </div>

    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-warning">Actualizar</button>
    </div>

</div>
</div>
</div>
</form>