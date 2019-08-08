<?php
    require_once 'conexion.php';
    session_start();

    /*var_dump($_SESSION);
    var_dump(empty($_SESSION['nombre']));*/

    if (empty($_SESSION['nombre'])) {
        header("Location: ../index.php");
    } else {

        if (isset($_POST)) {
            
            $materia = isset($_POST['materia']) ? mysqli_real_escape_string($bd, $_POST['materia']) : false;
            $obj = isset($_POST['obj']) ? mysqli_real_escape_string($bd, $_POST['obj']) : false;
            $mod = $_POST['mod'];
            $clave = $_POST['clave'];
            
            // EN EL CASO DE SELECCIONAR UN PROFE
            if(isset($_POST['prof'])) {
                /*var_dump($_POST);
                echo 'estoy aqui';
                die();*/
                $prof = $_POST['prof'];
                $estatus = 'aceptado';
            } else {
                // EN CASO DE SER EL PROFE 
                $prof = 'no';
                $estatus = 'espera';
            }
            
            if ($clave == '') {
                $clave = '';
            } elseif ($clave != '') {
                $clave = password_hash($clave, PASSWORD_BCRYPT, ['cost'=>4]);
            }
            
            if ($materia == '') {
                echo '<script> alert("ERROR: La materia debe de tener un nombre"); </script>';
                header("Refresh:1, URL=../nueva_materia.php");    
            }
            
            if ($_FILES['doc']['name'] != '') {
                
                $archivo = $_FILES['doc']['tmp_name'];  
                $tam = $_FILES['doc']['size']; 
                $tipo    = $_FILES['doc']['type']; 
                $nombre  = $_FILES['doc']['name']; 
                
                $fp = fopen($archivo, "rb"); 
                $contenido = fread($fp, $tam); 
                $contenido = addslashes($contenido); 
                fclose($fp);  
                //var_dump($contenido);
                //die();
                
                $material = addslashes(file_get_contents($_FILES['doc']['tmp_name']));
                guardar($materia, $obj, $contenido, $tipo, $nombre, $prof, $clave, $estatus, $mod, $bd);
                
            } else {
                guardar($materia, $obj, false, false, false, $prof, $clave, $estatus, $mod, $bd);
            }
            
        }
    }
        
        function guardar($materia, $obj, $material, $tipo, $nombre, $prof, $clave, $estatus, $mod, $conexion) {
            
                if ($material != false) {
                    $sql = "INSERT INTO materias VALUES (null, '$materia', '$obj', '$material', '$tipo', '$nombre', '$clave', '$estatus', $mod)";
                } else {
                    $sql = "INSERT INTO materias VALUES (null, '$materia', '$obj', null, null, null, '$clave', '$estatus', $mod)";
                }

                $guarda = mysqli_query($conexion, $sql);
                
                /*var_dump($sql);
                var_dump($guarda);
                die();*/

                if ($guarda) {
                    
                    if ($prof == 'no'){
                        guarda_prof($conexion, $materia, $obj, 'no');
                    } elseif ($prof != 'no'){
                        /*echo 'estoy aqui';
                        var_dump($prof);
                        die();*/
                        guarda_prof($conexion, $materia, $obj, $prof);
                    } 
                    
                } else {
                    
                    echo 'estoy aqui';
                    echo '<script> alert("ERROR: no se ha podido guardar la materia"); </script>';
                    //header("Refresh:1, URL=../nueva_materia.php");
                }
        }
        
        function guarda_prof($conexion, $materia, $obj, $prof){
            
            $num = "SELECT id FROM materias WHERE materia = '$materia' AND objetivo = '$obj'";
            $ver_id = mysqli_query($conexion, $num);

            if ($ver_id) {
                $id = mysqli_fetch_assoc($ver_id);
                $id_m = intval($id['id']);
                
                if ($prof == 'no'){
                    
                    $id_p = $_SESSION['id'];
                    /*var_dump($id_m);
                    var_dump($id_p);
                    die();*/

                    $sql = "INSERT INTO prof_mat VALUES(null, '$id_p', '$id_m')";
                    
                } elseif ($prof != 'no') {
                    
                    $id_p = intval($prof);
                    $sql = "INSERT INTO prof_mat VALUES(null, '$id_p', '$id_m')";
                    
                }
                
                $query = mysqli_query($conexion, $sql);
                
                if ($query) {
                    
                    echo '<script> alert("Se ha guardado la materia, espera a que se Autorice por un ADM"); </script>';
                    header("Refresh:1, URL=../index.php");
                    
                } else {
                    echo '<script> alert("ERROR: no se ha podido guardar la materia"); </script>';
                    header("Refresh:1, URL=../nueva_materia.php");
                }
            }
            
        }