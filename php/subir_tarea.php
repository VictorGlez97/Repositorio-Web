<?php
session_start();
require_once 'conexion.php';

//var_dump($_POST);
//var_dump($_FILES);
//var_dump(!empty($_POST));
//die();

if (!empty($_POST)) {
    
    if (!empty($_FILES)) {
    
        $id_mat = intval($_SESSION['id_mat']);
        $id = intval($_SESSION['id']);
        $sql = "SELECT id FROM alu_mat WHERE id_alu =  $id AND id_mat = $id_mat";
        $query = mysqli_query($bd, $sql);
            
        var_dump($query);
        $id_a_m = mysqli_fetch_assoc($query);
        $id_am = intval($id_a_m['id']);
        /*var_dump($id_am);
        var_dump($_POST['id_tar']);
        $id_tar = intval($_POST['id_tar']);
        var_dump($id_tar);
        die();*/
        
        //echo 'a lo mejor se subio un archivo/imagen';
        if ($_FILES['img']['name'] != '' || $_FILES['arc']['name'] != '' || $_FILES['doc']['name'] != '') {
            
            echo 'correcto hay algo en archivo';
            //var_dump($_FILES);
            
            $id_mat = intval($_SESSION['id_mat']);
            $id = intval($_SESSION['id']);
            $sql = "SELECT id FROM alu_mat WHERE id_alu =  $id AND id_mat = $id_mat";
            $query = mysqli_query($bd, $sql);
            
            var_dump($query);
            $id_am = mysqli_fetch_assoc($query);
            var_dump($id_am);
            die();
            
            if ($_FILES['img']['name'] != '') {
                
                $tarea = contenido($_FILES['img']['tmp_name']);
                $g = guardar($_FILES['img']['name'], $tarea, $_FILES['img']['type'], $id_tar, $id_am, $bd);
                
            } elseif ($_FILES['arc']['name'] != '') {
                
                $tarea = contenido($_FILES['arc']['tmp_name']);
                $g = guardar($_FILES['arc']['name'], $tarea, $_FILES['arc']['type'], $id_tar, $id_am, $bd);
                
            } elseif ($_FILES['doc']['name'] != '') {
                
                $tarea = contenido($_FILES['doc']['tmp_name']);
                $g = guardar($_FILES['doc']['name'], $tarea, $_FILES['doc']['type'], $id_tar, $id_am, $bd);
                
            } 
            
        } else {
            
            echo '<script> alert("ERROR: no se ha encontrado un archivo para subir"); </script>';
            header("Refresh:1, URL=../principal.php");
            
        }
        
    } else {
        
        echo '<script> alert("ERROR: no se ha encontrado un archivo para subir"); </script>';
        header("Refresh:1, URL=../principal.php");
        
    }
    
} else {
    
    echo '<script> alert("ERROR: no se ha encontrado un archivo para subir"); </script>';
    header("Refresh:1, URL=../principal.php");
    
}

function contenido($contenido){
    
    $archivo = addslashes(file_get_contents($contenido));
    return $archivo;

}

function guardar($nombre, $tarea, $tipo, $id_tar, $id_am, $conexion){

    $guardar = "INSERT INTO tareas VALUES(null, '$nombre', '$tarea', '$tipo', $id_am, $id_tar)";
    $query = mysqli_query($conexion, $guardar);
    
    if ($query){

        echo '<script> alert("Se ha guardado CORRECTAMENTE tu tarea"); </script>';
        header("Refresh:1, URL=../index.php");
        
        } else {
                    
            echo '<script> alert("ERROR: a habido un problema al guardar tu tarea"); </script>';
            header("Refresh:1, URL=../index.php");
                
        }
    
}