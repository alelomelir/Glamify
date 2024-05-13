<?php
session_start();
$_SESSION['url'] = $_POST['url'];
$_SESSION['imagen'] = $_POST['imagen'];
$_SESSION['nombre'] = $_POST['nombre'];
$_SESSION['categoria'] = $_POST['categoria'];
$_SESSION['descripcion'] = $_POST['descripcion'];
$_SESSION['precio'] = $_POST['precio'];

header('Location: ./catalogo.php');

?>