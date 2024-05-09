<?php
session_start();
$_SESSION['nombre'] = $_POST['nombre'];
$_SESSION['categoria'] = $_POST['categoria'];
$_SESSION['descripcion'] = $_POST['descripcion'];
$_SESSION['precio'] = $_POST['precio'];
echo $_POST['nombre'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p> nombre del articulo: <?php echo $_SESSION['nombre'] ?></p>
    <p></p>
    <p></p>
</body>

</html>