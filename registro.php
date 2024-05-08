<?php
include "./conexion.php";

$name = $_POST['nombre'];
$email = $_POST['correo'];
$password = $_POST['contrasena'];
$username = $_POST['username'];

$sql = mysqli_query($connection, "INSERT INTO usuario(id, nombre, username, correo, contrasena) VALUES (0, '$name', '$username', '$email', '$password')");

if ($sql) {
    echo " -> Usuario registrado";
    header("Location: ./inicioSesion.php");
} else
    echo " -> Error al registrar usuario";
?>