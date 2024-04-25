
<?php
    include "./registro.php";

    $name = $_POST['nombre'];
    $email = $_POST['correo'];
    $password = $_POST['contrasena'];

    $sql = mysqli_query($connection, "INSERT INTO usuario(id, nombre, correo, contrasena) VALUES (0, '$name', '$email', '$password')");

    if($sql)
        echo " -> Usuario registrado";
    else
        echo " -> Error al registrar usuario";
?>
*/
