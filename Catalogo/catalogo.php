<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos de Maquillaje</title>
    <link rel="stylesheet" href="catalogo.css">
</head>
<body>
    <?php
        include "./registro.php";
        
        $sql = mysqli_query($connection, "SELECT * FROM producto");
        ?>
        <header> <div class="contenedor">
                <h1 class="">Glamify</h1>
        </header>
    <div class="container">
    <?php
        while($row = mysqli_fetch_array($sql)) {
            ?>
        <div class="producto">
            <div class="descripcion">
                <p><?php echo $row['imagen']?></p>
                <h2><?php echo $row['nombre']?></h2>
                <p><?php echo $row['categoria']?></p>
                <p><?php echo $row['descripcion']?></p>
                <p><?php echo $row['precio']?></p>
            </div>
        </div>
        <?php
        }
     ?>
    </div>
</body>
</html>