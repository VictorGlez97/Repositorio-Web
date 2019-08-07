<?php

require_once 'conexion.php';
//var_dump($_POST);
//die();

/*if (empty($_SESSION['nombre'])){
    header("Location:../index.php");
} elseif ($_SESSION['rol'] == 1) {
    header("Location:../index.php");
}*/

if (isset($_POST)){
    echo 'entre';
    
    $id_mat = intval($_POST['id_mat']);
    
    $tarea = isset($_POST['tarea']) ? mysqli_real_escape_string($bd, $_POST['tarea']) : false;
    $desc = isset($_POST['desc']) ? mysqli_real_escape_string($bd, $_POST['desc']) : false;
    
    // Q acepta la tarea
    $img = isset($_POST['img']) ? 'si': 'no';
    $doc = isset($_POST['doc']) ? 'si': 'no';
    $arc = isset($_POST['arc']) ? 'si': 'no';
    
    if (isset($_FILES)){
       $archivo = $_FILES['mat']['tmp_name']; 
    } else {
        $archivo = false;
    }
    //$archivo = isset($_FILES['mat']) ? addslashes(file_get_contents($_FILES['mat']['tmp_name'])) : false;
    
    $id_uni = isset($_POST['id_uni']) ? $_POST['id_uni'] : false;
    
    $f_ini = isset($_POST['f_i']) ? $_POST['f_i'] : false;
    $f_fin = isset($_POST['f_f']) ? $_POST['f_f'] : false;
    
    /*var_dump($tarea);
    var_dump($desc);
    var_dump($img);
    var_dump($doc);
    var_dump($arc);
    var_dump($archivo);
    var_dump($id_uni);
    var_dump($f_ini);
    var_dump($f_fin);
    die();*/
    
    if ($tarea = '') {
        echo '<script> alert("La tarea necesita un nombre"); </script>';
        header("Refresh:1,URL=../nueva_tarea.php");
    }
    
    if ($desc = '') {
        $desc = false;
    }
    
    guardar($bd, $tarea, $desc, $img, $doc, $arc, $archivo, $f_ini, $f_fin, $id_mat, $id_uni);
    
}

function guardar($conexion, $tarea, $desc, $img, $doc, $arc, $archivo, $f_ini, $f_fin, $id_mat, $id_unidad){
    
    if($desc == false){
        
        if ($archivo != false){
            $sql = "INSERT INTO conf_tarea VALUES(null, '$tarea', null, '$img', '$doc', '$arc', $archivo, '$f_ini', '$f_fin', $id_mat, $id_unidad)";
        } else {
            $sql = "INSERT INTO conf_tarea VALUES(null, '$tarea', null, '$img', '$doc', '$arc', null, '$f_ini', '$f_fin', $id_mat, $id_unidad)";
        }
        
    } else{
        if ($archivo != false){
            $sql = "INSERT INTO conf_tarea VALUES(null, '$tarea', '$desc', '$img', '$doc', '$arc', $archivo, '$f_ini', '$f_fin', $id_mat, $id_unidad)";
        } else {
            $sql = "INSERT INTO conf_tarea VALUES(null, '$tarea', '$desc', '$img', '$doc', '$arc', null, '$f_ini', '$f_fin', $id_mat, $id_unidad)";
        }
    }
    
    var_dump($sql);
    die();
    
    $guarda = mysqli_query($conexion, $sql);
    
    if($guarda){
        echo '<script> alert("Felicidades: La configuracion de la tarea se guardo"); </script>';
        header("Refresh:1,URL=../principal.php");
    } else {
        echo '<script> alert("ERROR: La configuracion de la tarea NO se pudo guardar"); </script>';
        header("Refresh:1,URL=../principal.php");
    }
}














