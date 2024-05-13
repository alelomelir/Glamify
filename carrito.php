<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="carrito.css">
</head>

<body>
    <header>
        <div class="container">
            <nav>
                <h1>CARRITO DE COMPRAS</h1>
                <a href="inicioSesion.php"><i class=""></i></a>
            </nav>
        </div>
    </header>

    <div class="container">
        <div class="product">
            <img src="<?php echo isset($_SESSION['imagen']) ? $_SESSION['imagen'] : ''; ?>" alt="Imagen del producto">
            <p>Nombre del artículo: <?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : ''; ?></p>
            <p>Categoría: <?php echo isset($_SESSION['categoria']) ? $_SESSION['categoria'] : ''; ?></p>
            <p>Descripción: <?php echo isset($_SESSION['descripcion']) ? $_SESSION['descripcion'] : ''; ?></p>
            <p>Precio: <?php echo isset($_SESSION['precio']) ? $_SESSION['precio'] : ''; ?></p>
            <a href="pdf.php"><button>Pagar</button></a>
        </div>
    </div>
    </div>

</body>

</html>