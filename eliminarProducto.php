<?php
session_start();
include "./conexion.php";
$nombre = $_POST['nombre'];
echo "<script>alert('$nombre')</script>"; // Corrección aquí

$sqleliminar = "DELETE FROM productos WHERE nombre='$nombre'";
if (mysqli_query($connection, $sqleliminar)) {
    header("Location: verProductos.php");
} else {
    echo "Error: " . $sqleliminar . "<br>" . mysqli_error($connection);
}
?>