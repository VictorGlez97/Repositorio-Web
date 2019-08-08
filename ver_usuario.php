<?php 
require_once 'includes/cabecera.php';

if (!isset($_SESSION['nombre'])){
    header("Location:index.php");
}

if (isset($_GET['id_us'])){
    $id_us = intval($_GET['id_us']);
} else {
    $id_us = $_SESSION['id'];
}
?>
<?php
//var_dump($id_us);

$us = Usuario($bd, $id_us);
//var_dump()
if (!empty($us)):
    $usuario = mysqli_fetch_assoc($us);
?>
  
    <div class="container-fluid mx-auto mt-5 mb-5" style="width: 90%;">
        <div class="border border-info rounded">
            <div class="card card-header mx-auto">
                <?php if ($usuario['id_rol'] == 3): echo ' Alumno '; $rol = 'Alumno'; endif; ?>
                <?php if ($usuario['id_rol'] == 2): echo ' Profesor '; $rol = 'Profesor'; endif; ?>
                <?php if ($usuario['id_rol'] == 1): echo ' Administrador '; $rol = 'Administrador'; endif; ?>
            </div>
            <div class="card-body p-4 ml-4">
                <h5 class="card-title"> <?= $usuario['nombre'].' '.$usuario['apellido'] ?> </h5><br/>
                <h6>Numero de Control: <?= $usuario['ncontrol'] ?></h6><br/>
                <h6>Correo: <?= $usuario['correo'] ?> </h6><br/>
                <h6>Rol: <?= $rol ?> </h6><br/>
                <h6>Estatus: <?= $usuario['estatus'] ?></h6><br/>
                
                <?php 
                if ($usuario['id_rol'] == 3):
                    $m_u = Materias_Usuario($bd, $id_us);
                    if (!empty($m_u)):
                        echo '<h6>Materias: </h6>';
                        while ($mat_us = mysqli_fetch_assoc($m_u)):
                ?>
                        
                <a href="curso.php?id_mat=<?= $mat_us['id'] ?>&mat=<?= $mat_us['materia'] ?>"> <?= $mat_us['materia'] ?> </a><br/><br/><br/>
                
                <?php   endwhile;
                    endif;
                    if (empty($m_u)):
                ?>
                
                Todavia no estas inscrito a una materia? <a href="ver_materias.php"> INSCIBETE A UNA MATERIA </a>
                
                <?php
                    endif;
                ?>
                <?php endif; ?>
                
                <?php if (!isset($_GET) || isset($_SESSION['id'])):?>
                    <a href="editar_usuario.php?id_us=<?= $usuario['id'] ?>" class="btn btn-warning ml-5"> Editar Usuario </a><br/>
                <?php endif; ?>
                <?php if ($_SESSION['rol'] == 1):?>
                    <a href="editar_usuario.php?id_us=<?= $usuario['id'] ?>" class="btn btn-warning ml-5"> Editar Usuario </a><br/>
                <?php endif; ?> 
            </div>
            
        </div>
    </div>

<?php endif; ?>
