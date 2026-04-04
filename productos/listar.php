<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit;
}
?>
<?php
$host = "localhost";
$dbname = "tienda";
$user = "root";
$password = "Thiago2015";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    
    $total_productos = $pdo->query("SELECT COUNT(*) FROM productos")->fetchColumn();
    $total_categorias = $pdo->query("SELECT COUNT(*) FROM categoria")->fetchColumn();
    
    $sql = "SELECT productos.producto_id, nombre, precio, nombre_categoria 
            FROM productos 
            JOIN categoria ON productos.categoria_id = categoria.categoria_id";
    
    $resultado = $pdo->query($sql);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GestiónPyme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include '../navbar.php'; ?>
<?php include '../sidebar.php'; ?>

<?php if(isset($_GET['msg'])): ?>
    <div class="alert alert-success alert-dismissible fade show mx-4 mt-3" role="alert">
        <?php
            if($_GET['msg'] == 'creado') echo '✅ Producto agregado correctamente';
            if($_GET['msg'] == 'editado') echo '✅ Producto actualizado correctamente';
            if($_GET['msg'] == 'eliminado') echo '✅ Producto eliminado correctamente';
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="row mb-4 mx-2 mt-3">
    <div class="col-md-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h6 class="card-title">Total Productos</h6>
                <h2><?= $total_productos ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h6 class="card-title">Categorías</h6>
                <h2><?= $total_categorias ?></h2>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid px-4">
    <h2>Productos</h2>
    <a href="crear.php" class="btn btn-primary mb-3">+ Agregar Producto</a>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($resultado as $fila): ?>
            <tr>
                <td><?= $fila['nombre'] ?></td>
                <td>$<?= $fila['precio'] ?></td>
                <td><?= $fila['nombre_categoria'] ?></td>
                <td>
                    <a href='editar.php?id=<?= $fila['producto_id'] ?>' class='btn btn-warning btn-sm'>Editar</a>
                    <a href='eliminar.php?id=<?= $fila['producto_id'] ?>' class='btn btn-danger btn-sm'>Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>