<?php
include "./conexion.php";
session_start();

if (isset($_SESSION['id'])) {
    header('Location: ./verProductos.php');
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="sesion.css">
</head>

<body>
    <header>
        <div class="contenedor">
            <label class="icon-menu" for="menu-bar"></label>
            <nav class="menu"></nav>
        </div>
    </header>
    <div class="container">
        <div class="image-container">

            <img src="" alt="">
        </div>
        <div class="form-container">

            <div class="login-box">
                <h2>Hi Admin</h2>
                <form method="POST" action="iniciarSesion.php">
                    <div class="user-box">
                        <input type="text" name="correo" required=""><br>
                        <label>Mail</label>
                    </div>
                    <div class="user-box">
                        <input type="password" name="contrasena" required=""><br>
                        <label>Password</label>
                    </div>
                    <a href="#">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <input class="button" type="submit" value="Ingresar">
                    </a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>