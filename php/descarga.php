<?php
    require_once 'conexion.php';
//var_dump($_FILES['arc']);
/*var_dump($_GET);
var_dump($_GET['arc']);
die();*/

if (isset($_GET['arc'])){
    $id = intval($_GET['arc']);
    
    $qry = "SELECT material, mat_tipo, mat_nombre FROM materias WHERE id = $id";
    $query = mysqli_query($bd, $qry);
    //var_dump($id);
    $archivo = mysqli_fetch_assoc($query);
    //var_dump($archivo);
    //die();
    
    $tipo = $archivo['mat_tipo'];
    $contenido = $archivo['material'];
    $nombre = $archivo['mat_nombre'];
    
    if ($tipo == 'application/msword'){
        $extension = 'doc';
    } elseif ($tipo == 'application/pdf') {
        $extencion = 'pdf';
    } elseif ($tipo == 'application/rar'){
        $extencion = 'rar'; 
    }

        header("Content-type: $tipo");
        header('Content-disposition: attachment; filename="'.$nombre.'"'); 
        echo $contenido; 
}

