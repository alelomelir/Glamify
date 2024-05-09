<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabla de Productos</title>
  <link rel="stylesheet" type="text/css" href="verProductos.css">
</head>

<body>
  <div class="container">
    <p class="name">Glamify</p>
    <nav>

      <?php
      if (isset($_SESSION['correo'])) {
        ?> <a href="cerrar.php"> Cerrar Sesión </a>
        <a href="carrito.php"> Carrito </a>
      <?php } else { ?>
        <a href="inicioSesion.php"> Iniciar Sesión </a>
        <?php
      }
      ?>

      <?php if ($_SESSION['admin']) { ?>
        <a href="registroProducto.php"> Agregar Productos </a>
        <?php
      } ?>

    </nav>
  </div>

  <div class="container1">
    <table class="tabla">
      <thead>
        <tr>
          <th>ID</th>
          <th>Imagen</th>
          <th>Nombre</th>
          <th>Categoría</th>
          <th>Descripción</th>
          <th>Precio</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include "./conexion.php";

        $sql = mysqli_query($connection, "SELECT * FROM productos");

        while ($row = mysqli_fetch_array($sql)) {
          ?>
          <tr>
            <td><?php echo $row['id'] ?></td>
            <td style="background-image: url('<?php echo $row['imagen'] ?>');" class="imagen"></td>
            <td><?php echo $row['nombre'] ?></td>
            <td><?php echo $row['categoria'] ?></td>
            <td><?php echo $row['descripcion'] ?></td>
            <td><?php echo $row['precio'] ?></td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>