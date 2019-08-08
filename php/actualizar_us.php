<?php

var_dump($_POST);

if (isset($_POST)){
    
    if (isset($_POST['enviar'])) {
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($bd, $_POST['nombre']) : false;
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($bd, $_POST['apellido']) : false;
    $nc = isset($_POST['ncontrol']) ? mysqli_real_escape_string($bd, $_POST['ncontrol']) : false;
    $correo = isset($_POST['correo']) ? mysqli_real_escape_string($bd, $_POST['correo']) : false;
    $us = intval($_POST['id_us']);
    
    }
    
    if (isset($_POST['ok'])) {
        $pass = $_POST['pass'];
        $pass2 = $_POST['pass2'];

        if ($pass == $pass2){
            
            $contra = password_hash($pass, PASSWORD_BCRYPT, ['cost'=>4]);
            act_contra($bd, $contra, $us);
            
        } else {
            
            echo '<script> alert("Las contraseñas no son las mismas"); </script>';
            header("Refresh:1, URL=../editar_usuario.php?id_us=$us");
            
        }
                
    }
    
}

function act_datos($conexion, $nombre, $apellido, $nc, $correo, $us){

    $sql = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', ncontrol = '$nc' WHERE id = $us";
    
}

function act_contra($conexion, $pass, $us){
    
    $sql = "UPDATE usuarios SET pass = '$pass' WHERE id = $us";
    $guarda = mysqli_query($conexion, $sql);
    
    if ($guarda){
        echo '<script> alert("FELICIDADES: se ha modificado tu contraseña"); </script>';
        header("Refresh:1, URL=../principal.php");
    } else {
        echo '<script> alert("ERROR: NO se pudo actualizar la contraseña"); </script>';
        header("Refresh:1, URL=../editar_usuario.php?id_us=$us");
    }
    
}

