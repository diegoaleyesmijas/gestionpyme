<?php
$host = "localhost";
$dbname = "tienda";
$user = "root";
$password = "Thiago2015";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    echo "Conexión exitosa";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
// 1. Escribís la consulta SQL (ya sabes hacer esto!)
$sql = "SELECT * FROM productos";

// 2. PHP la ejecuta contra la base de datos
$resultado = $pdo->query($sql);

// 3. Recorrés los resultados y los mostrás
foreach ($resultado as $fila) {
    echo $fila['nombre'] . " - " . $fila['precio'] . "<br>";
}
?>
