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
    header("location: catalogo.php");

} else {
    header("Location: ./inicioSesion.php");
}



exit;

?>