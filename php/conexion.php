<?php

    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "repositorio";
    $port = "3308";

    $bd = mysqli_connect($host, $user, $password, $database, $port);
    mysqli_query($bd, "SET NAMES 'utf8'");
    
    /*if($bd){
        echo 'Se ha conectao correctamente a la BD';
    } else {
        echo 'No se ha podido conectar a la BD';
    }*/

