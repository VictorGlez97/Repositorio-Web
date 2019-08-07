<?php
    
//var_dump($_POST);

//echo "<script> alert('REGISTRATE!!!'); </script>";
    // CONECTAMOS CON LA BD
    include_once 'conexion.php';
    
    // PRUEBAS DE CONEXION
    /*if($bd){
        echo 'conectado';
    } else {
        echo 'desconectado';
    }*/
    
    if(isset($_POST)){
        
        // RECOGER LOS VALORES DEL FORMULARIO
        //      ALGUNOS CON MAS SEGURIDAD QUE OTROS EN CASO DE QUERER SAQUEAR LA BD
        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($bd, $_POST['nombre']) : false;
        $apellido = isset($_POST['apellidos']) ? mysqli_real_escape_string($bd, $_POST['apellidos']) : false;
        $email = isset($_POST['email']) ? mysqli_real_escape_string($bd, trim($_POST['email'])) : false;
        $ncontrol = isset($_POST['ncontrol']) ? mysqli_real_escape_string($bd, trim($_POST['ncontrol'])) : false;
        $contraseña = isset($_POST['pass']) ? mysqli_real_escape_string($bd, $_POST['pass']) : false;
        $contraseña_dos = isset($_POST['pass2']) ? mysqli_real_escape_string($bd, $_POST['pass2']) : false;
        
        //      ESTOS DATOS MAS SEGUROS QUE LOS DE ARRIBA 
        $rol = intval($_POST['rol']);
        
        if (isset($_POST['curso'])) {
            $admc = intval($_POST['curso']);
        } else {
            $admc = 'no';
        }
        
        /*var_dump($admc);
        die();*/
        
        // ARRAY QUE INTERCEPTA ERRORES
        $errores = array();
        
        //var_dump(is_numeric($nombre));
        //var_dump(is_numeric($apellido));
        //var_dump($correo);
        //var_dump($rol);
        
        // VALIDAMOS LOS DATOS PARA MAYOR SEGURIDAD DE LA BD
        // DATO DEL NOMBRE
        if(!empty($nombre) && !preg_match("/[0-9]/", $nombre)){
            $nombre_validado = true;
        } else {
            $nombre_validado = false;
            $errores['nombre'] = "El NOMBRE ingresado no es valido";
        }
        
        // DATO DEL APELLIDO
        if(!empty($apellido) && !preg_match("/[0-9]/", $apellido)){
            $apellido_validado = true;
        } else {
            $apellido_validado = false;
            $errores['apellido'] = "El APELLIDO ingresado no es valido";
        }
        
        // DATO DEL NUMERO DE CONTROL
        if(!empty($ncontrol) && is_numeric($ncontrol)){
            $ncontro_validado = true;
        } else {
            $ncontro_validado = false;
            $errores['ncontrol'] = "El NUMERO DE CONTROL ingresado no es valido";
        }
        
        // DATO DEL CORREO
        if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_valido = true;
        } else {
            $email_valido = false;
            $errores['email'] = 'El CORREO ingresado no es valido';
        }
        
        // DATO DE LA CONTRASEÑA
        if(!empty($contraseña)){
            $contra_validada = true;
        } else if($contraseña == $contraseña_dos){
            $contra_validada = false;
            $errores['contrseña'] = 'La CONTRASEÑAS no son las mismas';
        } else {
            $contra_validada = false;
            $errores['contrseña'] = 'La CONTRASEÑA ingresada no es valida';
        }
        
        if(!empty($rol)){
            if($rol == 1 || $rol == 2){
                $estatus = 'espera';
            } else {
                $estatus = 'aceptado';
            }
            
        } else {
            $rol_validado = false;
            $errores['rol'] = 'El ROL ingresado no es valido';
        }
        
        //var_dump(count($errores));
        //var_dump($errores);
        //die();
        
        //var_dump($errores);
        // VERIFICAMOS SI HAY ERRORES
        if(count($errores) == 0){
            
            // ENCRIPTAMOS LA CONTRASEÑA
            $password_segura = password_hash($contraseña, PASSWORD_BCRYPT, ['cost'=>4]);
            //var_dump($password_segura);
            
            // INSERTAMOS NUEVOS USUARIOS
            $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellido', '$ncontrol', '$email', '$password_segura', $rol, '$estatus')";
            $guardar = mysqli_query($bd, $sql);
            
            $us = "SELECT id FROM usuarios WHERE nombre = '$nombre' AND apellido = '$apellido' AND ncontrol = '$ncontrol' AND correo = '$email'";
            $id_u = mysqli_query($bd, $us);
            
            /*var_dump($id_u);
            die();*/
            
            // VERIFICAMOS SI SE GUARDO EL USUARIO
            if($guardar && $id_u){
                
                $id_us = mysqli_fetch_assoc($id_u);
                $id = intval($id_us['id']);
                var_dump($id);
                var_dump($rol);
                //die();
                
                if($rol == 1 || $rol == 2){
                    
                    if ($rol == 1) {
                    
                        admin_curso($bd, $admc, $nombre, $apellido, $ncontrol, $rol, $estatus);
                    
                    } elseif ($rol == 2) {
                        sesion($id, $nombre, $apellido, $ncontrol, $rol, $estatus);
                        
                        echo "<script> alert('Por el momento te haz REGISTRADO, solo debes esperar a que algun ADM o CORDINADOR te CONFIRME TU REGISTRO para que se puedan ACTIVAR ACCIONES'); </script>";
                        header("Refresh: 1,URL='../principal.php'");
                    } else {
                        echo "<script> alert('ERROR'); </script>";
                        header("Refresh: 1,URL='../index.php'");
                    }
                    
                } elseif ($rol == 3){
                    var_dump($rol);
                    //die();
                    sesion($id, $nombre, $apellido, $ncontrol, $rol, $estatus);

                    echo "<script> alert('TE HAZ REGISTRADO CORRECTAMENTE!!!'); </script>";
                    header("Refresh: 1,URL='../principal.php'");
                }
                
            } else {
                echo "<script> alert('ERROR AL REGISTRARTE!!!'); </script>";
                header("Refresh: 1,URL='../nuevo_usuario.php'");
                
            }
            
        } else {
            echo "<script> alert('ERROR AL REGISTRARTE!!!'); </script>";
            header("Refresh: 1,URL='../nuevo_usuario.php'");
            
        }
        
         
    } else {
        echo "<script> alert('ERROR: NO TE HAZ PODIDO REGISTRAR!!!'); </script>";
        header("Refresh: 1,URL='../nuevo_usuario.php'");
    }
    
    function admin_curso($conexion, $admc, $nombre, $apellido, $ncontrol, $rol, $estatus){
        
        $nc = intval($ncontrol);
        
        $sql = "SELECT * FROM usuarios WHERE nombre = '$nombre' AND apellido = '$apellido' AND ncontrol = $nc";
        $us = mysqli_query($conexion, $sql);
        
        if(mysqli_num_rows($us) >= 1){
            $user = mysqli_fetch_assoc($us);
            $id = intval($user['id']);
            
            $query = "INSERT INTO adm_curso VALUES(null, $id, $admc)";
            $adm_cur = mysqli_query($conexion, $query);
            
            /*var_dump($adm_cur);
            var_dump($query);
            die();*/
            
            if ($adm_cur){
                echo "<script> alert('Por el momento te haz REGISTRADO, solo debes esperar a que algun ADM o CORDINADOR te CONFIRME TU REGISTRO para que se puedan ACTIVAR ACCIONES'); </script>";
                header("Refresh: 1,URL='../principal.php'");
                
                sesion($nombre, $apellido, $ncontrol, $rol, $estatus);
                
            } else {
                echo "<script> alert('ERROR: NO TE HAZ PODIDO REGISTRAR!!!'); </script>";
                header("Refresh: 1,URL='../nuevo_usuario.php'");
            }
        } else{
            echo "<script> alert('ERROR: NO TE HAZ PODIDO REGISTRAR!!!'); </script>";
            header("Refresh: 1,URL='../nuevo_usuario.php'");
        }
        
    }
    
    function sesion($id, $nombre, $apellido, $ncontrol, $rol, $estatus){
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['nombre'] = $nombre;
        $_SESSION['apellido'] = $apellido;
        $_SESSION['ncontrol'] = $ncontrol;
        $_SESSION['rol'] = intval($rol);
        $_SESSION['estatus'] = $estatus;
    }