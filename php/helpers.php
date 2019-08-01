<?php

//require_once 'conexion.php';

// sin uso *
function mostrarError($errores, $campo){
    $alerta = '';
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alert alert-danger'>".$errores[$campo].'</div>';
    }
    
    return $alerta;
}

// nuevo_usuario
function Roles($conexion){
    
    $sql = "SELECT * FROM rol ORDER BY id DESC";
    $rol = mysqli_query($conexion, $sql);
    
    $roles = array();
    if ($rol && mysqli_num_rows($rol) >= 1){
        $roles = $rol;
    }
    
    return $roles;
}

// pendientes
function Pendientes_Profes($conexion) {
    $sql = "SELECT * FROM usuarios WHERE id_rol = 2 AND estatus = 'espera'";
    $prof = mysqli_query($conexion, $sql);
    
    $profes = array();
    if ($prof && mysqli_num_rows($prof) >= 1){
        $profes = $prof;
    }
    
    return $profes;
}

// pendientes
function Pendientes_Adm($conexion) {
    $sql = "SELECT * FROM usuarios WHERE id_rol = 1 AND estatus = 'espera'";
    $adm = mysqli_query($conexion, $sql);
    
    $adms = array();
    if ($adm && mysqli_num_rows($adm) >= 1){
        $adms = $adm;
    }
    
    return $adms;
}

// pendientes
function Pendientes_Mat($conexion){
    $sql = "SELECT m.id, m.materia, u.nombre, u.apellido, u.id "
            . "FROM materias AS m INNER JOIN prof_mat AS pm ON pm.id_mat = m.id "
            . "INNER JOIN usuarios AS u ON u.id = pm.id_prof "
            . "WHERE m.estatus = 'espera'";
    $mat = mysqli_query($conexion, $sql);
    
    $materias = array();
    if ($mat && mysqli_num_rows($mat) >= 1){
        $materias = $mat;
    }
   
    return $materias;
}

// sidebar
function Conseguir_Cursos($conexion){
    $sql = "SELECT * FROM curso";
    $cur = mysqli_query($conexion, $sql);
    
    $cursos = array();
    if ($cur && mysqli_num_rows($cur) >= 1){
        $cursos = $cur;
    }
   
    return $cursos;
}

// nueva_materia
function Conseguir_Mod($conexion){
    $sql = "SELECT * FROM modulo";
    $mod = mysqli_query($conexion, $sql);
    
    $modulo = array();
    if ($mod && mysqli_num_rows($mod) >= 1){
        $modulo = $mod;
    }
   
    return $modulo;
}

// materia
function Conseguir_Modulos($conexion, $c_id){
    $sql = "SELECT * FROM modulo WHERE id_curso = $c_id";
    $mod = mysqli_query($conexion, $sql);
    
    $modulos = array();
    if ($mod && mysqli_num_rows($mod) >= 1){
        $modulos = $mod;
    }
   
    return $modulos;
}

// index
function Conseguir_Materias($conexion){
    $sql = "SELECT * FROM materias WHERE estatus = 'aceptado'";
    $mat = mysqli_query($conexion, $sql);
    
    $materias = array();
    if ($mat && mysqli_num_rows($mat) >= 1){
        $materias = $mat;
    }
   
    return $materias;
}

// nueva_materia
function Conseguir_profes($conexion){
    $sql = "SELECT u.id, u.nombre, u.apellido "
            . "FROM usuarios AS u INNER JOIN rol AS r ON u.id_rol = r.id "
            . "WHERE r.rol = 'prof' AND u.estatus = 'aceptado'";
    $prof = mysqli_query($conexion, $sql);
    
    $profes = array();
    if ($prof && mysqli_num_rows($prof) >= 1){
        $profes = $prof;
    }
    
    return $profes;
}

// materia
function Mostrar_Mat($conexion, $id){
    $sql = "SELECT m.*, u.nombre, u.apellido, u.id "
            . "FROM materias AS m INNER JOIN prof_mat AS pm ON pm.id_mat = m.id "
            . "INNER JOIN usuarios AS u ON u.id = pm.id_prof "
            . "WHERE m.id = $id";
    $mat = mysqli_query($conexion, $sql);
    
    $materia = array();
    if ($mat && mysqli_num_rows($mat) >= 1){
        $materia = mysqli_fetch_row($mat);
    }
    
    return $materia;
}

// php -> inscribirse
function Mod_Cur_Alu($conexion, $id_mat){
    $sql = "SELECT c.id, m.id "
            . "FROM materias AS ma INNER JOIN modulo AS m ON m.id = ma.id_modulo "
            . "INNER JOIN curso AS c ON c.id = m.id_curso WHERE ma.id = $id_mat";
    $ids = mysqli_query($conexion, $sql);
    
    $cur_mod = array();
    if (mysqli_num_rows($ids) == 1) {
        $cur_mod = mysqli_fetch_row($ids);
    }
    
    return $cur_mod;
}

// cursos
/*function Cursos_Usuario($conexion, $id){
    $sql = "SELECT * "
            . "FROM alu_mat AS am INNER JOIN materias AS m ON m.id = am.id_mat "
            . "WHERE am.id_alu = $id";
    
            
}*/