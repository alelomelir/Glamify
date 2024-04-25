<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="stylesheet" type="text/css" href="verProductos.css">
<title>Tabla de Productos</title>
</head>
<body>
<?php
        include "./registro.php";

        $sql = mysqli_query($connection, "SELECT * FROM producto");
    ?> 
  
    <section id="tabla"> 
    <table>
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
    </tabla>
  <tbody>
  <?php
        while($row = mysqli_fetch_array($sql)) {
            ?>
    <tr>
      <td><p><?php echo $row['id'] ?></p></td>
      <td><p><?php echo $row['imagen'] ?></p></td>
      <td><p><?php echo $row['nombre'] ?></p></td>
      <td><p><?php echo $row['categoria'] ?></p></td>
      <td><p><?php echo $row['descripcion'] ?></p></td>
      <td><p><?php echo $row['precio'] ?></p></td>
    </tr>
    <?php
        }
     ?>
  </tbody>
</table>
</body>
</html>