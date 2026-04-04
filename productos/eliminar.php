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
    
    $sql = "DELETE FROM productos WHERE producto_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    
  
    header("Location: listar.php?msg=eliminado");
    exit;

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>