<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Bootstrap 4 -->
<link rel="stylesheet" href="../public/bootstrap/bootstrap.min.css">

<!-- Estilos -->
<link rel="stylesheet" href="../public/css/plantilla.css">

<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap4.min.css">

<!-- Buttons -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap4.min.css">

<!-- FontAwesome -->
<link rel="stylesheet" href="../public/fontawesome/css/all.css">

<title>Help-Desk</title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
<div class="container">

<a class="navbar-brand" href="inicio.php">
   <img src="../public/img/logoicono.ico" width="30%">
</a>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarResponsive">

<ul class="navbar-nav ml-auto">

<li class="nav-item active">
<a class="nav-link" href="inicio.php">
  <span class="fas fa-home"></span> Inicio</a>
</li>

<?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1) { ?>

<li class="nav-item">
<a class="nav-link" href="misDispositivos.php">
   <span class="fas fa-microchip"></span> Mis dispositivos</a>
</li>

<li class="nav-item">
<a class="nav-link" href="misReportes.php">
   <span class="fas fa-file-alt"></span> Reportes soporte</a>
</li>

<?php } else if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2) { ?>

<li class="nav-item">
<a class="nav-link" href="usuarios.php">
   <span class="fas fa-users-cog"></span> Usuarios</a>
</li>

<li class="nav-item">
<a class="nav-link" href="asignacion.php">
   <span class="fas fa-address-book"></span> Asignación</a>
</li>

<li class="nav-item">
<a class="nav-link" href="reportes.php">
   <span class="fas fa-file-alt"></span> Reportes</a>
</li>

<?php } ?>

<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle"
   href="#"
   id="navbarDropdown"
   role="button"
   data-toggle="dropdown"
   aria-haspopup="true"
   aria-expanded="false"
   style="color:red">
   
   <span class="fas fa-user-ninja"></span>
   Usuario: <?php echo $_SESSION['usuario']['nombre']; ?>
</a>

<div class="dropdown-menu">

<a class="dropdown-item" href="#"
   data-toggle="modal"
   data-target="#modalActualizarDatosPersonales"
   onclick="obtenerDatosPersonalesInicio(<?php echo $_SESSION['usuario']['id']; ?>)">
   <span class="fas fa-user-edit"></span> Editar datos
</a>

<div class="dropdown-divider"></div>

<a class="dropdown-item" href="../procesos/usuarios/login/salir.php">
   <span class="fas fa-sign-out-alt"></span> Salir
</a>

</div>

</li>

</ul>
</div>
</div>
</nav>

<?php
include "inicio/modalActualizarDatosPersonales.php";
?>