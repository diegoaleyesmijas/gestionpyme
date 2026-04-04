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

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $sql = "INSERT INTO productos (nombre, precio, categoria_id) 
                VALUES (:nombre, :precio, :categoria_id)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nombre' => $_POST['nombre'],
            ':precio' => $_POST['precio'],
            ':categoria_id' => $_POST['categoria']
        ]);
        header("Location: listar.php?msg=creado");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include '../navbar.php'; ?>
<div class="container mt-4">
    <h2>Agregar Producto</h2>
    <a href="listar.php" class="btn btn-secondary mb-3">← Volver</a>

    <form action="crear.php" method="post">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="text" class="form-control" name="precio" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Categoría</label>
            <select class="form-select" name="categoria">
                <?php
                $categorias = $pdo->query("SELECT * FROM categoria");
                foreach($categorias as $cat):
                ?>
                    <option value="<?= $cat['categoria_id'] ?>"><?= $cat['nombre_categoria'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Agregar Producto</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>