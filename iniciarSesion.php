<?php
include "./conexion.php";
$correo = $_POST['correo'];
$password = $_POST['contrasena'];
session_start();
$_SESSION['correo'] = ['correo'];
$consulta = "SELECT*FROM usuario WHERE correo='$correo' and contrasena='$password'";
$result = mysqli_query($connection, $consulta);



$filas = mysqli_fetch_array($result);
if ($filas["correo"]) {
    $_SESSION['id'] = $filas["id"];
    $_SESSION['nombre'] = $filas["nombre"];
    $_SESSION['contrasena'] = $filas["contrasena"];
    $_SESSION['correo'] = $filas["correo"];

    if ($_SESSION['nombre'] === "AleLomeli") {
        $_SESSION['admin'] = true;
        header("location: ./verProductos.php");

    } else {
        $_SESSION['admin'] = false;
        header("location: ./catalogo.php");
    }

} else {
    header("Location: ./inicioSesion.php");
}



exit;

?>