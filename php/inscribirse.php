<?php
require_once 'conexion.php';

session_start();
if (empty($_SESSION['nombre'])){
    header("Location:../index.php");
}

if (isset($_POST)){
    //var_dump($_POST);
    
    $id_mat = intval($_POST['id_mat']);
    
    if (isset($_POST['clave'])) {
        $clave = $_POST['clave'];
        verifica($bd, $clave, $id_mat);
    } else {
        $id_alu = intval($_SESSION['id']);
        inscrito($bd, $id_alu, $id_mat);
    }
    
}

function verifica($conexion, $clave, $id_mat){
    
    $sql = "SELECT * FROM materias WHERE id = $id_mat";
    $query = mysqli_query($conexion, $sql);
    
    if ($query){
        
        $mat = mysqli_fetch_assoc($query);
        $v = password_verify($clave, $mat['clave']);
        
        if ($v){
            
            $id_alu = intval($_SESSION['id']);
            inscrito($conexion, $id_alu, $id_mat);
            
        } else {
            
            echo '<script> alert("ERROR: Clave incorrecta"); </script>';
            header("Refresh:1,URL=../index.php");
            
        }
    } else {
        
        echo '<script> alert("ERROR: Problemas con la BD"); </script>';
        header("Refresh:1,URL=../index.php");        
        
    }
    
}

function inscrito($conexion, $id_alu, $id_mat){
    
    $sql = "INSERT INTO alu_mat VALUES(null, $id_alu, $id_mat)";
    $query = mysqli_query($conexion, $sql);
    
    if ($query){
        echo '<script> alert("FELICIDADES: Te haz inscrito correctamente"); </script>';
        sesion($conexion, $id_mat);
        header("Refresh:1,URL=../index.php");        
    } else {
        echo '<script> alert("ERROR: Problemas con la BD"); </script>';
        header("Refresh:1,URL=../index.php");        
    }
}

function sesion ($conexion, $id_mat){
    
    include_once 'helpers.php';
    $res = Mod_Cur_Alu($conexion, $id_mat);
    $_SESSION['curso'] = intval($res[0]);
    $_SESSION['modulo'] = intval($res[1]);
    
}

