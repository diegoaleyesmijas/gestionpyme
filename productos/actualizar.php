

<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit;
}
$host = "localhost";
$dbname = "tienda";
$user = "root";
$password = "Thiago2015";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    
    $sql = "UPDATE productos SET nombre = :nombre, precio = :precio WHERE producto_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nombre' => $nombre,
        ':precio' => $precio,
        ':id' => $id
    ]);
    
    header("Location: listar.php?msg=editado");
    exit;

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>