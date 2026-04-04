<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">GestiónPyme</a>
        <div class="navbar-nav me-auto">
            <a class="nav-link" href="/gestionpyme/productos/listar.php">Productos</a>
            <a class="nav-link" href="/gestionpyme/productos/crear.php">Agregar</a>
        </div>
        <div class="d-flex align-items-center">
            <span class="text-white me-3">👤 <?= isset($_SESSION['usuario']) ? $_SESSION['usuario'] : '' ?></span>
            <a href="/gestionpyme/logout.php" class="btn btn-outline-light btn-sm">Cerrar sesión</a>
        </div>
    </div>
</nav>