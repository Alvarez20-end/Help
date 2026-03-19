<?php
include "header.php";
if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2) {
?>

<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">

            <h1 class="fw-light">Gestionar Reporte Usuarios</h1>

            <!-- 🔥 TABLA -->
            <div id="tablaReporteAdminLoad"></div>

        </div>
    </div>
</div>

<?php
include "reportesAdmin/modalAgregarSolucion.php";
include "footer.php";
?>

<script src="../public/js/reportesAdmin/reportesAdmin.js"></script>

<?php
} else {
    header("location:../index.html");
}
?>