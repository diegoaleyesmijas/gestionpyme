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
    
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM productos WHERE producto_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include '../navbar.php'; ?>
<div class="container mt-4">
    <h2>Editar Producto</h2>
    <a href="listar.php" class="btn btn-secondary mb-3">← Volver</a>

   <form action="actualizar.php" method="post">
    <input type="hidden" name="id" value="<?= $producto['producto_id'] ?>">
    
    <label class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" value="<?= $producto['nombre'] ?>" required>
    
    <label class="form-label">Precio</label>
    <input type="text" class="form-control" name="precio" value="<?= $producto['precio'] ?>" required>
    
    <button type="submit">Guardar cambios</button>
</form>

</div>
</body>
</html>

```