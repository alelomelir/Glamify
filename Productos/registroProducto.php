<?php
    include "./registro.php";

    $imagen = $_POST['imagen'];
    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    $sql = mysqli_query($connection, "INSERT INTO producto(id, imagen, nombre, categoria, descripcion, precio) VALUES 
    (0, '$imagen', '$nombre', '$categoria', '$descripcion' , '$precio')");

    if($sql)
        echo " -> Producto registrado";
    else
        echo " -> Error al registrar producto";
?>