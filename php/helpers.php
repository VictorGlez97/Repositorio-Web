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
// nuevo_modulo
// var_materias
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
// ver_materias
function Conseguir_Modulos($conexion, $c_id){
    $sql = "SELECT * FROM modulo WHERE id_curso = $c_id";
    $mod = mysqli_query($conexion, $sql);
    
    $modulos = array();
    if ($mod && mysqli_num_rows($mod) >= 1){
        $modulos = $mod;
    }
   
    return $modulos;
}

function Conseguir_Modulo($conexion, $id){
    $sql = "SELECT * FROM modulo WHERE id = $id";
    $mod = mysqli_query($conexion, $sql);
    
    $modulos = array();
    if ($mod && mysqli_num_rows($mod) == 1){
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
            . "WHERE (r.rol = 'prof' OR r.rol = 'adm') AND u.estatus = 'aceptado'";
    $prof = mysqli_query($conexion, $sql);
    
    $profes = array();
    if ($prof && mysqli_num_rows($prof) >= 1){
        $profes = $prof;
    }
    
    return $profes;
}

// materia
function Mostrar_Mat($conexion, $id){
    $sql = "SELECT m.id, m.materia, m.objetivo, m.material, m.mat_nombre, m.id_modulo, u.nombre, u.apellido "
            . "FROM materias AS m INNER JOIN prof_mat AS pm ON pm.id_mat = m.id "
            . "INNER JOIN usuarios AS u ON u.id = pm.id_prof "
            . "WHERE m.id = $id";
    $mat = mysqli_query($conexion, $sql);
    
    $materia = array();
    if ($mat && mysqli_num_rows($mat) >= 1){
        $materia = $mat;
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

// includes -> mis_cursos
// ver_usuarios
function Materias_Usuario($conexion, $id){
    $sql = "SELECT m.id, m.materia "
            . "FROM alu_mat AS am INNER JOIN materias AS m ON m.id = am.id_mat "
            . "WHERE am.id_alu = $id";
    $query = mysqli_query($conexion, $sql);
    
    $materias = array();
    if (mysqli_num_rows($query) >= 1){
        $materias = $query;
    } 
    
    return $materias;
}

// nuevo_modulo
function Conseguir_Adm($conexion){
    $sql = "SELECT * FROM usuarios WHERE id_rol = 1 AND estatus = 'aceptado'";
    $query = mysqli_query($conexion, $sql);
    
    $adms = array();
    if (mysqli_num_rows($query) >= 1){
        $adms = $query;
    }
    
    return $adms;
}

// ver_materias
function Mat_Modulo ($conexion, $id_mod){
    $sql = "SELECT m.* FROM materias AS m INNER JOIN modulo AS mo ON mo.id = m.id_modulo WHERE m.estatus = 'aceptado' AND mo.id = $id_mod";
    $mat = mysqli_query($conexion, $sql);
    
    $materias = array();
    if ($mat && mysqli_num_rows($mat) >= 1){
        $materias = $mat;
    }
   
    return $materias;
}

// principal --------------- adm
function Mat_Mod_Cur ($conexion, $id_cur){
    $sql = "SELECT m.* "
            . "FROM materias AS m INNER JOIN modulo AS mo ON mo.id = m.id_modulo "
            . "INNER JOIN curso AS c ON c.id = mo.id_curso "
            . "WHERE m.estatus = 'aceptado' AND c.id = $id_cur"; 
    $mat = mysqli_query($conexion, $sql);
    
    $materias = array();
    if ($mat && mysqli_num_rows($mat) >= 1){
        $materias = $mat;
    }
   
    return $materias;
}

function Adm_Curso ($conexion, $id){
    $sql = "SELECT id, id_curso FROM adm_curso WHERE id_adm = $id";
    $ids = mysqli_query($conexion, $sql);
    
    
    $ides = array();
    if ($ids && mysqli_num_rows($ids) == 1){
        $ides = $ids;
    }
    
    return $ides;
}

// ver_usuario
function Usuario ($conexion, $id_us){
    $sql = "SELECT * FROM usuarios WHERE id = $id_us";
    $us = mysqli_query($conexion, $sql);
    
    $usuario = array();
    if ($us && mysqli_num_rows($us)){
        $usuario = $us;
    }
    
    return $usuario;
}

// principal ------------ prof o adm 
// ver_tareas
function Materias_Profe ($conexion, $id_p){
    $sql = "SELECT m.id, m.materia "
            . "FROM materias AS m "
            . "INNER JOIN prof_mat AS pm ON m.id = pm.id_mat "
            . "WHERE pm.id_prof = $id_p";
    $mat = mysqli_query($conexion, $sql);
    
    $materias = array();
    if ($mat && mysqli_num_rows($mat)){
        $materias = $mat;
    }
    
    return $materias;
}

// nueva_tarea
function Unidades_mat($conexion, $id_mat){
    $sql = "SELECT * FROM unidades WHERE id_mat = $id_mat";
    $uni = mysqli_query($conexion, $sql);
    
    $unidades = array();
    if ($uni && mysqli_num_rows($uni) >= 1){
        $unidades = $uni;
    }
    
    return $unidades;
}

// ver_tareas
function Tareas_mat($conexion, $id_mat){
    $sql = "SELECT ct.id, ct.tarea, ct.descripcion, ct.f_inicio, ct.f_fin, u.numero, u.unidad "
            . "FROM conf_tarea AS ct INNER JOIN unidades AS u ON u.id = ct.id_unidad "
            . "WHERE ct.id_mat = $id_mat";
    $tar = mysqli_query($conexion, $sql);
    
    $tareas = array();
    if ($tar && mysqli_num_rows($tar) >= 1){
        $tareas = $tar;
    }
    
    return $tareas;
}

// curso
function Conseguir_unidades($conexion, $id_mat){
    $sql = "SELECT m.materia, u.id, u.numero, u.unidad "
            . "FROM unidades AS u INNER JOIN materias AS m ON m.id = u.id_mat "
            . "WHERE m.id = $id_mat";
    $uni = mysqli_query($conexion, $sql);
    
    $unidades = array();
    if ($uni && mysqli_num_rows($uni) >= 1){
        $unidades = $uni;
    }
    
    return $unidades;
}

function Tareas_Unidad($conexion, $id_uni){
    $sql = "SELECT id, tarea, descripcion, f_inicio, f_fin "
            . "FROM conf_tarea WHERE id_unidad = $id_uni";
    $tar = mysqli_query($conexion, $sql);
    
    $tareas = array();
    if ($tar && mysqli_num_rows($tar) >= 1){
        $tareas = $tar;
    }
    
    return $tareas;
}

// obs_tarea
function Tarea($conexion, $id){
    $sql = "SELECT * FROM conf_tarea WHERE id = $id";
    $tar = mysqli_query($conexion, $sql);
    
    $tarea = array();
    if ($tar && mysqli_num_rows($tar) == 1){
        $tarea = $tar;
    }
    
    return $tarea;
}

// dia_tarea
function Tareas_Pendientes($conexion){
    $dia_hoy = date('Y-m-d');
    $sql = "SELECT * FROM `conf_tarea` WHERE f_inicio = '$dia_hoy'";
    $tar = mysqli_query($conexion, $sql);
    
    $tareas = array();
    if ($tar && mysqli_num_rows($tar) >= 1){
        $tareas = $tar;
    }
    
    return $tareas;
}

// dia_tarea
function Tareas_Alu($conexion, $id_alu){
    $dia_hoy = date('Y-m-d');
    $sql = "SELECT cf.* "
            . "FROM conf_tarea AS cf INNER JOIN alu_mat AS am ON am.id_mat = cf.id_mat "
            . "WHERE am.id_alu = $id_alu AND cf.f_inicio = '$dia_hoy'";
    $tar = mysqli_query($conexion, $sql);
    
    $tareas = array();
    if ($tar && mysqli_num_rows($tar)){
        $tareas = $tar;
    }
    
    return $tareas;
}

















