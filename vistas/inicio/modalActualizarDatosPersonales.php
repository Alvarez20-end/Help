<form id="frmActualizarDatosPersonales" method="POST" onsubmit="return actualizarDatosPersonales()">

    <!-- ID oculto -->
    <input type="hidden" id="idUsuario" value="<?php echo $_SESSION['usuario']['id']; ?>">

    <div class="modal fade" id="modalActualizarDatosPersonales" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Actualizar datos personales</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <label>Apellido paterno</label>
                    <input type="text" class="form-control mb-2" id="paternoInicio" name="paternoInicio">

                    <label>Apellido materno</label>
                    <input type="text" class="form-control mb-2" id="maternoInicio" name="maternoInicio">

                    <label>Nombre</label>
                    <input type="text" class="form-control mb-2" id="nombreInicio" name="nombreInicio">

                    <label>Telefono</label>
                    <input type="text" class="form-control mb-2" id="telefonoInicio" name="telefonoInicio">

                    <label>Correo</label>
                    <input type="email" class="form-control mb-2" id="correoInicio" name="correoInicio">

                    <label>Fecha de nacimiento</label>
                    <input type="date" class="form-control mb-2" id="fechaNacInicio" name="fechaNacInicio">

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    <!-- 🔥 ESTE ES EL IMPORTANTE -->
                    <button type="submit" class="btn btn-warning">Actualizar</button>
                </div>

            </div>
        </div>
    </div>

</form>