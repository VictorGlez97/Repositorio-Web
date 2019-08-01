<?php

    session_start();
    
    if (isset($_SESSION['nombre'])){
        session_destroy();
        echo "<script> alert('Cerrando Session...'); </script>";
        header("Refresh: 1, URL='../index.php'");
    } else {
        header('Location: ../index.php');
    }
