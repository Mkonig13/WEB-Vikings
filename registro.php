<?php

    $conexion = mysqli_connect("localhost", "root", "", "contactos") 
    or die('no se pudo conectar al servidor');

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    $consulta_existencia = mysqli_query($conexion, "SELECT * FROM contactos WHERE nombre='$nombre' AND email='$email'");

    if(mysqli_num_rows($consulta_existencia) > 0)
    {
        echo "El contacto ya existe en la base de datos";
    }
    else
    {
        $consulta = mysqli_query($conexion, "INSERT INTO contactos (nombre, email) 
        VALUES ('$nombre', '$email')") or die(mysqli_error($conexion));
            if ($consulta) {
                echo "Contacto guardado";
            } else {
                echo "Error al insertar el contacto.";
            }    
    }


    mysqli_close($conexion);
?>