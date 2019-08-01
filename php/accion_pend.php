<?php

    //var_dump($_GET);
    require_once 'conexion.php';

    if (isset($_GET)){
        
        if (isset($_GET['aa'])) {
            
            //echo 'estoy aceptando un administrador';
            $id = $_GET['aa'];
            $estatus = 'a';
            
            accion($bd, $estatus, $id);
            
        } elseif (isset ($_GET['an'])) {
        
            //echo 'estoy negando un administrador';
            $id = $_GET['an'];
            $estatus = 'n';
            
            accion($bd, $estatus, $id);
        
        } elseif (isset ($_GET['pa'])) {
        
            //echo 'estoy aceptando un profesor';
            $id = $_GET['pa'];
            $estatus = 'a';
            
            accion($bd, $estatus, $id);
            
        } elseif (isset ($_GET['pn'])) {
            
            //echo 'estoy negando a un profesor';
            $id = $_GET['pn'];
            $estatus = 'n';
            
            accion($bd, $estatus, $id);
            
        } elseif (isset ($_GET['ma'])) {
            
            $id = $_GET['ma'];
            $estatus = 'a';
            
            accion_mat($bd, $estatus, $id);
            
        } elseif (isset ($_GET['mn'])) {
            
            $id = $_GET['mn'];
            $estatus = 'n';
            
            accion_mat($bd, $estatus, $id);
            
        }
        
    }
    
    function accion($conexion, $estatus, $id){
        
        if ($estatus == 'a') {
        
            $acc = "UPDATE usuarios SET estatus = 'aceptado' WHERE id = $id";
            
        } elseif ($estatus == 'n') {
        
            $acc = "UPDATE usuarios SET estatus = 'negado' WHERE id = $id";
            
        }
        
        $sql = mysqli_query($conexion, $acc);
        
        if ($sql) {
        
            echo '<script> alert("Los cambios se han hecho CORRECTAMENTE"); </script>';
            header("Refresh:1, URL=../pendientes.php");
            
        } else {
            
            echo '<script> alert("ERROR: No se pudieron hacer los cambios"); </script>';
            header("Refresh:1, URL=../pendientes.php");
            
        }
    }
    
    function accion_mat($conexion, $estatus, $id){
        if ($estatus == 'a') {
        
            $acc = "UPDATE materias SET estatus = 'aceptado' WHERE id = $id";
            
        } elseif ($estatus == 'n') {
        
            $acc = "UPDATE materias SET estatus = 'negado' WHERE id = $id";
            
        }
        
        $sql = mysqli_query($conexion, $acc);
        
        if ($sql) {
        
            echo '<script> alert("Los cambios se han hecho CORRECTAMENTE"); </script>';
            header("Refresh:1, URL=../pendientes.php");
            
        } else {
            
            echo '<script> alert("ERROR: No se pudieron hacer los cambios"); </script>';
            header("Refresh:1, URL=../pendientes.php");
            
        }
    }