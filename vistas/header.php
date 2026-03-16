<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/plantilla.css">
    <link rel="stylesheet" href="../public/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../public/datatable/responsive.bootstrap4.min.css">

    <title>Help-Desk</title>
</head>
<body>
        <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
    <div class="container">
        <a class="navbar-brand" href="inicio.php">Help-Desk</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="inicio.php">Inicio</a>
            </li>
            <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1) { ?>
            <li class="nav-item">
                <a class="nav-link" href="misDispositivos.php">mis dispositivos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="misReportes.php">reportes soporte</a>
            </li>
            <?php } else if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2) { ?>
            <li class="nav-item">
                <a class="nav-link" href="usuarios.php">usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="asignacion.php">asignacion</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="reportes.php">reportes</a>
            </li>
            <?php } ?>
                <li class="nav-item dropdown" >
                <a style="color:red" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                Usuario: <?php echo $_SESSION['usuario']['nombre']; ?>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">editar datos</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../procesos/usuarios/login/salir.php">salir</a>
            </div>
            </li>
        </ul>
        </div>
    </div>
    </nav>

<script src="../public/jquery/jquery.min.js"></script>
<script src="../public/bootstrap/bootstrap.bundle.min.js"></script>

</body>
</html>