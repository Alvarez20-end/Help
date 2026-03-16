<?php
include "../../clases/Conexion.php";
$con = new Conexion();
$conexion = $con->conectar();
?>

<!-- Modal -->
<form id="frmAsignaEquipo" method="POST">

<div class="modal fade" id="modalAsignarEquipo" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Asignar equipo</h5>

        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>


      <div class="modal-body">
        <div class="container-fluid">

          <div class="row">

            <!-- PERSONA -->
            <div class="col-sm-6">
              <label>Nombre de persona</label>

              <?php
              $sql = "SELECT 
                        id_persona,
                        CONCAT(paterno,' ',materno,' ',nombre) AS nombre
                      FROM t_persona
                      ORDER BY paterno";
              $respuesta = mysqli_query($conexion, $sql);
              ?>

              <select name="idPersona" id="idPersona" class="form-control" required>
                <option value="">Selecciona una opción</option>

                <?php while($mostrar = mysqli_fetch_array($respuesta)) { ?>

                  <option value="<?php echo $mostrar['id_persona']; ?>">
                    <?php echo $mostrar['nombre']; ?>
                  </option>

                <?php } ?>

              </select>
            </div>


            <!-- TIPO DE EQUIPO -->
            <div class="col-sm-6">
              <label>Tipo de equipo</label>

              <?php
              $sql = "SELECT id_equipo, nombre
                      FROM t_cat_equipo
                      ORDER BY nombre";
              $respuesta = mysqli_query($conexion, $sql);
              ?>

              <select name="idEquipo" id="idEquipo" class="form-control" required>
                <option value="">Selecciona una opción</option>

                <?php while($mostrar = mysqli_fetch_array($respuesta)) { ?>

                  <option value="<?php echo $mostrar['id_equipo']; ?>">
                    <?php echo $mostrar['nombre']; ?>
                  </option>

                <?php } ?>

              </select>
            </div>

          </div>


          <div class="row mt-3">

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


          <div class="row mt-3">

            <div class="col-sm-12">
              <label>Descripción</label>
              <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
            </div>

          </div>


          <div class="row mt-3">

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
          Cerrar
        </button>

        <button type="submit" class="btn btn-primary">
          Asignar
        </button>

      </div>

    </div>

  </div>
</div>

</form>