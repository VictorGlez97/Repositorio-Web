<?php
    require_once 'conexion.php';
    session_start();
    //var_dump($_POST);
    
    if(empty($_SESSION['nombre'])){
        header("Location:../index.php");
    }
    
    if($_SESSION['estatus'] = 'aceptado'){
        header("Location:../index.php");
    }
    
    if($_SESSION['rol'] != 1){
        header("Location:../index.php");
    }
    
    if(isset($_POST)){
        
        if(isset($_POST['curso'])){
            
            $curso = $_POST['curso'];
            $id_coordinador = intval($_POST['coo']);
            
            nuevo_curso($bd, $curso, $id_coordinador);
            
        } elseif(isset ($_POST['mod'])) {
        
            $modulo = $_POST['mod'];
            $id_curso = intval($_POST['cur']);
            
            nuevo_modulo($bd, $modulo, $id_curso);
            
        }
        
    }

    function nuevo_curso($conexion, $curso, $id_coordinador){
        $cur = "INSERT INTO curso VALUES(null, '$curso')";
        $query = mysqli_query($conexion, $cur);
        
        if ($query){
            
            $sql = "SELECT id FROM curso WHERE curso = '$curso'";
            $id = mysqli_query($conexion, $sql);
            
            if (mysqli_num_rows($id) == 1){
                $id_cur = mysqli_fetch_assoc($id);
                $id_curso = intval($id_cur['id']);
                //var_dump($id_curso);
                /*var_dump($id_cur);
                var_dump($id_cur['id']);*/
                //var_dump($id_curso);
                //die();
                
                $adm_cur = "INSERT INTO adm_curso VALUES(null, $id_coordinador, $id_curso)";
                $a_c = mysqli_query($conexion, $adm_cur);
                
                if ($a_c){
                
                    echo '<script> alert("FELICIDADES: se ha agregado un Curso"); </script>';
                    header("Refresh:1,URL=../index.php");
                    
                } else {
                    
                    echo '<script> alert("ERROR: no se pudo guardar el Modulo"); </script>';
                    header("Refresh:1,URL=../nuevo_modulo.php");
                    
                }
                
            } else {
                
                echo '<script> alert("ERROR: no se pudo guardar el Modulo"); </script>';
                header("Refresh:1,URL=../nuevo_modulo.php");
      
            }
            
        } else {
            
            echo '<script> alert("ERROR: no se pudo guardar el Modulo"); </script>';
            header("Refresh:1,URL=../nuevo_modulo.php");
            
        }
        
    }
    
    function nuevo_modulo($conexion, $modulo, $id_curso){
        $mod = "INSERT INTO modulo VALUES(null, '$modulo', $id_curso)";
        $query = mysqli_query($conexion, $mod);
        
        if($query){
            echo '<script> alert("FELICIDADES: se ha agregado un Modulo"); </script>';
            header("Refresh:1,URL=../index.php");
        } else {
            echo '<script> alert("ERROR: no se pudo guardar el Modulo"); </script>';
            header("Refresh:1,URL=../nuevo_modulo.php");
        }
    }