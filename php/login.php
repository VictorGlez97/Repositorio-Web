<?php

    //INICIAMOS LA SESION Y LA CONEXION A LA BD
    include_once 'conexion.php';
    
    //var_dump($_POST);
    
    // VERIFICAMOS QUE LLEGUEN DATOS POR EL METODO POST
    if (isset($_POST)){
      
      // GUARDAMOS DATOS QUE NOS LLEGARON POR VARIABLES
        // CON UN POCO DE SEGURIDAD PARA QUE NO PUEDAN ACCEDER A LA BD FACILMENTE
      $conc = isset($_POST['usuario']) ? mysqli_real_escape_string($bd, $_POST['usuario']) : FALSE;
      $pass = isset($_POST['pass']) ? mysqli_real_escape_string($bd, $_POST['pass']) : FALSE;
      
      //    CONVERTIMOS EL CAMPO DE USUARIO EN STRING
      $c = (string)$conc;
      //var_dump(trim($c));
      //var_dump(strlen(trim($c)));
      //var_dump(strlen($conc));
      //die();
      
      //    AQUI VERIFICAMOS SI NUESTRA VARIABLE USUARIO ES UN # DE CONTROL
      if (strlen(trim($c)) == 8){
          
          //echo 'estoy aqui';
          //die();
          
          //    BUSCAMOS DATOS CON LA CONDICION DE QUE ESTE EL # DE CONTROL
          $query = "SELECT * FROM usuarios WHERE ncontrol = '$c'";
          $sql = mysqli_query($bd, $query);
          
          //    VERIFICAMOS QUE EXISTA EL # DE CONTROL 
          if (mysqli_num_rows($sql) === 1){
              $user = mysqli_fetch_assoc($sql);
              
              //    VERIFICAMOS LA CONTRASEÑA
              $verifica_pass = password_verify($pass, $user['pass']);
              //var_dump($verifica_pass);
              //var_dump($user);
              //die();
              
              if ($verifica_pass){
                  //    GUARDAMOS LOS DATOS EN VARIABLES DE $_SESSION
                  session_start();
                  $_SESSION['id'] = $user['id'];
                  $_SESSION['nombre'] = $user['nombre'];
                  $_SESSION['apellido'] = $user['apellido'];
                  $_SESSION['control'] = $user['ncontrol'];
                  $_SESSION['rol'] = $user['id_rol'];
                  
                  if($_SESSION['estatus'] != $user['estatus']){
                      unset($_SESSION['estatus']);
                      $_SESSION['estatus'] = $user['estatus'];
                  }
                  
                  echo "<script> alert('Haz ingresado correctamente'); </script>";
                  header("Refresh: 1,URL='../index.php'");
                  
              } else {
                  echo "<script> alert('ERROR: CONTRASEÑA INCORRECTA NC'); </script>";
                  header("Refresh: 1,URL='../index.php'");
                  
              }
          } else {
                echo "<script> alert('ERROR: NC INCORRECTA'); </script>";
                header("Refresh: 1,URL='../index.php'");     
          }
        
        //  ACA VERIFICAMOS EN CASO DE NO SER # DE CONTROL, QUE SEA UN CORREO ELECTRONICO
      } else if (strlen(trim($c)) >= 9){
          
          $query = "SELECT * FROM usuarios WHERE correo = '$c'";
          $sql = mysqli_query($bd, $query);
          
          if (mysqli_num_rows($sql) === 1){
              $user = mysqli_fetch_assoc($sql);
              
              $verifica_pass = password_verify($pass, $user['pass']);
              if ($verifica_pass){
                  session_start();
                  $_SESSION['id'] = $user['id'];
                  $_SESSION['nombre'] = $user['nombre'];
                  $_SESSION['apellido'] = $user['apellido'];
                  $_SESSION['control'] = $user['ncontrol'];
                  $_SESSION['rol'] = $user['id_rol'];
                  $_SESSION['estatus'] = $user['estatus'];
                  
                  //var_dump($user['estatus']);
                  
                  /*if($_SESSION['estatus'] != $user['estatus']){
                      unset($_SESSION['estatus']);
                      $_SESSION['estatus'] = $user['estatus'];
                  }*/
                  
                  echo "<script> alert('HAZ INGRESADO CORRECTAMENTE'); </script>";
                  header("Refresh: 1,URL='../index.php'");
                  
              } else {
                  echo "<script> alert('ERROR: CONTRASEÑA INCORRECTA C'); </script>";
                  header("Refresh: 1,URL='../index.php'");
              }
          } else {
                echo "<script> alert('ERROR: CORREO NO ENCONTRADO'); </script>";
                header("Refresh: 1,URL='../index.php'");
              
          }
          
      } else {
            echo "<script> alert('ERROR: DATOS NO ENCONTRADOS'); </script>";
            header("Refresh: 1,URL='../index.php'");
      }
        
    } else {
        echo "<script> alert('ERROR: NO SE HA PODIDO INGRESAR CORRECTAMENTE'); </script>";
        header("Refresh: 1,URL='../index.php'");
    }
    
    //$password_segura = password_hash($pass, PASSWORD_BCRYPT, ['cost'=>4]);
    
    