<?php
include "header.php";

if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2) {

include "../clases/Conexion.php";
$con = new Conexion();
$conexion = $con->conectar();
?>

<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">

            <h1 class="fw-light">Asignación de equipos</h1>

            <p class="lead">
                <button class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#modalAsignarEquipo">
                    Asignar Equipo
                </button>
            </p>

            <hr>

            <div id="tablaAsignacionesLoad"></div>

        </div>
    </div>
</div>


<!-- MODAL -->
<form id="frmAsignaEquipo" method="POST">

<div class="modal fade" id="modalAsignarEquipo" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">

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
            <div class="col-md-6">
              <div class="form-group">
                <label>Nombre de persona</label>

                <?php
                $sql = "SELECT 
                        id_persona,
                        CONCAT(paterno,' ',materno,' ',nombre) AS nombre
                        FROM t_persona
                        ORDER BY paterno";

                $respuesta = mysqli_query($conexion,$sql);
                ?>

                <select name="idPersona" id="idPersona" class="form-control">

                  <option value="">Selecciona una opción</option>

                  <?php while($mostrar = mysqli_fetch_array($respuesta)){ ?>

                  <option value="<?php echo $mostrar['id_persona']; ?>">
                    <?php echo $mostrar['nombre']; ?>
                  </option>

                  <?php } ?>

                </select>

              </div>
            </div>


            <!-- TIPO DE EQUIPO -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Tipo de equipo</label>

                <?php
                $sql = "SELECT id_equipo, nombre 
                        FROM t_cat_equipo 
                        ORDER BY nombre";

                $respuesta = mysqli_query($conexion,$sql);
                ?>

                <select name="idEquipo" id="idEquipo" class="form-control">

                  <option value="">Selecciona una opción</option>

                  <?php while($mostrar = mysqli_fetch_array($respuesta)){ ?>

                  <option value="<?php echo $mostrar['id_equipo']; ?>">
                    <?php echo $mostrar['nombre']; ?>
                  </option>

                  <?php } ?>

                </select>

              </div>
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
              <label>Descripcion</label>
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
          Guardar
        </button>

      </div>

    </div>

  </div>
</div>

</form>


<?php
include "footer.php";

} else {
header("location:../index.html");
}
?>