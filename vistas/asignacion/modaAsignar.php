<!-- Modal -->
<div class="modal fade" id="modalAsignarEquipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Asignar equipo</h5>

        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>


      <div class="modal-body">

        <div class="container-fluid">

          <div class="row">

            <div class="col-md-6">
              <div class="form-group">
                <label>Nombre de persona</label>

                <select name="idPersona" id="idPersona" class="form-control">
                  <option value=""></option>
                </select>
              </div>
            </div>


            <div class="col-md-6">
              <div class="form-group">
                <label>Tipo de equipo</label>

                <select name="idEquipo" id="idEquipo" class="form-control">
                  <option value=""></option>
                </select>
              </div>
            </div>

          </div>


          <div class="row">

            <div class="col-sm-4">
              <label>Marca</label>
              <input type="text" name="marca" id="marca" class="form-control">
            </div>

            <div class="col-sm-4">
              <label>Modelo</label>
              <input type="text" name="modelo" id="modelo" class="form-control">
            </div>

            <div class="col-sm-4">
              <label>Color</label>
              <input type="text" name="color" id="color" class="form-control">
            </div>

          </div>


          <div class="row">

            <div class="col-sm-12">
              <label>Descripcion</label>
              <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
            </div>

          </div>


          <div class="row">

            <div class="col-sm-4">
              <label>Memoria</label>
              <input type="text" name="memoria" id="memoria" class="form-control">
            </div>

            <div class="col-sm-4">
              <label>Disco Duro</label>
              <input type="text" name="discoDuro" id="discoDuro" class="form-control">
            </div>

            <div class="col-sm-4">
              <label>Procesador</label>
              <input type="text" name="procesador" id="procesador" class="form-control">
            </div>

          </div>

        </div>

      </div>


      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Close
        </button>

        <button type="button" class="btn btn-primary">
          Save changes
        </button>

      </div>

    </div>
  </div>
</div>