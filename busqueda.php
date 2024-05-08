<?php
include "registro.php";


if (isset($_GET['buscar'])) {
    $buscar = $_GET['buscar'];

    // Consulta SQL para buscar en la base de datos
    $SQL_READ = "SELECT * FROM productos WHERE nombre LIKE '%$buscar%' OR descripcion LIKE '%$buscar%' OR precio LIKE '%$buscar%'";

    $sql_query = mysqli_query($connection, $SQL_READ);

    // Verifica si se encontraron resultados
    if (mysqli_num_rows($sql_query) > 0) {
        while ($row = mysqli_fetch_assoc($sql_query)) {
            echo "<div class='productos'>";
            echo "<img src='" . $row['imagen'] . "' alt='" . $row['nombre'] . "'>";
            echo "<h2>" . $row['nombre'] . "</h2>";
            echo "<p>" . $row['descripcion'] . "</p>";
            echo "<p>Precio: $" . $row['precio'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "No se encontraron productos.";
    }
} else {
    echo "No se ha proporcionado una consulta de búsqueda.";
}

// Cerrar la conexión
mysqli_close($connection);
?>