<?php
include "./registro.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $imagen = $_POST['imagen'];
    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    if (isset($_POST['agregardatos'])) {
        $sqlinsertar = "INSERT INTO productos (id, imagen, nombre, categoria, descripcion, precio) VALUES 
        (0, '$imagen', '$nombre', '$categoria', '$descripcion' , '$precio')";
        if (mysqli_query($connection, $sqlinsertar)) {
            header("Location: verProductos.php");
        }
    }

    if (isset($_POST['modificardatos'])) {
        $sqlmodificar = "UPDATE productos SET imagen='$imagen', nombre='$nombre', categoria='$categoria', descripcion='$descripcion', precio='$precio' WHERE imagen='$imagen'";
        if (mysqli_query($connection, $sqlmodificar)) {
            header("Location: verProductos.php");
        } else {
            echo "Error: " . $sqlmodificar . "<br>" . mysqli_error($connection);
        }
    }

    if (isset($_POST['eliminardatos'])) {
        $sqleliminar = "DELETE FROM productos WHERE imagen='$imagen'";
        if (mysqli_query($connection, $sqleliminar)) {
            header("Location: verProductos.php");
        } else {
            echo "Error: " . $sqleliminar . "<br>" . mysqli_error($connection);
        }
    }
}
?>