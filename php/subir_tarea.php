<?php

require_once 'conexion.php';

//var_dump($_POST);
var_dump($_FILES);
die();

if (!empty($_POST)) {
    
    if ($_POST['texto'] != '') {
        
        //echo 'se escribio algo';
        $nombre_txt = 'Tarea'.'.txt';
        
        //if ($doc = fopen($nombre_txt, "a")) {
        /*if ($doc = fopen($nombre_txt, "a")) {
            
            if (fwrite($doc, $_POST['texto'])) {
                
                //$_FILES['archivo'] = fopen($nombre_txt, "a");
                $_FILES['archivo'] = $_POST['texto'];
                var_dump($_FILES['archivo']);
                
                $directorio = opendir(".");
                while ($archivo = readdir($directorio)) {//obtenemos un archivo y luego otro sucesivamente
                    if (is_dir($archivo) || $archivo == $nombre_txt)//verificamos si es o no un directorio
                    {
                        //$tarea[] = file_get_contents($archivo);
                        //var_dump($tarea);
                        var_dump(file($archivo));
                        var_dump($doc);
                    } 
                }
                
                //var_dump($_FILES['archivo']);
                
                /*fclose($doc);
                var_dump($doc);
                var_dump($nombre_txt);
                var_dump($_FILES['archivo']);
                var_dump($_FILES['archivo2']);
                
                echo $doc.'<br/>';
                echo $nombre_txt;*/
                
                //$sql = 'INSERT INTO tareas VALUES(null, ' $_FILES["archivo2"] ', "txt")';
                //$query = mysqli_query($bd, $sql);
                
                /*if ($query) {
                    
                    echo 'guardado correctamente';
                    
                } else {
                    
                    echo 'ERROR';
                
                }*/
                
            /*} else {    
                
                
            }
            
        } else {
            
            
            
        }*/
        
        //unlink($nombre_txt);
        
        guardar($nombre_txt, $_POST['texto'], 'text/plain', $bd);
        
    } elseif (!empty($_FILES)) {
    
        //echo 'a lo mejor se subio un archivo/imagen';
        if ($_FILES['img']['name'] != '' || $_FILES['arc']['name'] != '' || $_FILES['doc']['name'] != '') {
            
            //echo 'correcto hay algo en archivo';
            //var_dump($_FILES);
            
            if ($_FILES['img']['name'] != '') {
                
                $tarea = contenido($_FILES['img']['tmp_name']);
                $g = guardar($_FILES['img']['name'], $tarea, $_FILES['img']['type'], $bd);
                
            } elseif ($_FILES['arc']['name'] != '') {
                
                $tarea = contenido($_FILES['arc']['tmp_name']);
                $g = guardar($_FILES['arc']['name'], $tarea, $_FILES['arc']['type'], $bd);
                
            } elseif ($_FILES['doc']['name'] != '') {
                
                $tarea = contenido($_FILES['doc']['tmp_name']);
                $g = guardar($_FILES['doc']['name'], $tarea, $_FILES['doc']['type'], $bd);
                
            } else {
                
            }
            
        } else {
            
            //echo 'no hay nada';
            
        }
        
    }
    
} else {
    
    
    
}

function contenido($contenido){
    
    $archivo = addslashes(file_get_contents($contenido));
    return $archivo;

}

function guardar($nombre, $tarea, $tipo, $conexion){

    $guardar = "INSERT INTO tareas VALUES(null, '$nombre', '$tarea', '$tipo', '1')";
    $query = mysqli_query($conexion, $guardar);
    
    if ($query){

        echo '<script> alert("Se ha guardado CORRECTAMENTE tu tarea"); </script>';
        header("Refresh:1, URL=../index.php");
        
        } else {
                    
            echo '<script> alert("ERROR: a habido un problema al guardar tu tarea"); </script>';
            header("Refresh:1, URL=../index.php");
                
        }
    
}