<?php include_once 'includes/cabecera.php'; ?>
<?php if (empty($_SESSION['nombre'])){
        header("Location:index.php");
      } 
?>

<br>
<div class="container-fluid mx-auto row" style="width: 90%; margin-left:5%">
    <img src="img/usuario.png">&nbsp; &nbsp; &nbsp;<h1> <?= $_SESSION['nombre'].' '.$_SESSION['apellido'] ?> </h1>
</div>
<div class="container-fluid mx-auto mt-4 mb-4 row">
    
    <?php require_once 'includes/sidebar.php'; ?>
    
    <!-- // PRINCIPAL ALUMNOS -->
    <?php if ($_SESSION['rol'] == 3): ?>
    <div class="container-fluid mx-auto" style="width: 60%;">
        <div class="border border-info rounded">
            <div class="card card-header mx-auto">
                Bienvenido!
            </div>
            <br>
            <div class="row">
                <h3 class="offset-md-1"> Tareas pendientes </h3>
                <div class="notifyIcon">3</div>
            </div>
            <div class="card-body row">
                <div class="card card-body ml-3 mr-3 mb-3" style="width: 30%;">
                    <h5 class="card-title"> Programación Basicá </h5>
                    <p class="card-text text-justify" style="font-size: 15px;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean pellentesque elit eu leo iaculis, vel consectetur arcu imperdiet. </p>
                    <a href="" class="btn btn-info btn-sm"> Ver </a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    
    <!-- // PRINCIPAL PROFES -->
    <?php if ($_SESSION['rol'] == 2): ?>
    <div class="container-fluid mx-auto" style="width: 60%;">
        <div class="border border-info rounded">
            <div class="card card-header mx-auto">
                Bienvenido!
            </div>
            <br>
            <div class="row">
                <h3 class="offset-md-1"> Tus materias </h3>
            </div>
            <div class="card-body row">
                <?php 
                    $mat = Materias_Profe($bd, $_SESSION['id']);
                    if (!empty($mat)):
                        while ($materia = mysqli_fetch_assoc($mat)):
                ?>
                     
                <div class="card card-body ml-3 mr-3 mb-3 text-center" style="width: 20%;">
                    <h5> <?php echo $materia['materia']; ?> </h5>
                    <a href="nueva_tarea.php?id_mat=<?= $materia['id'] ?>" class="btn btn-primary btn-sm btn-block"> Nueva Tarea </a>
                    <a href="ver_tareas.php?mat=<?= $materia['id'] ?>" class="btn btn-primary btn-sm btn-block"> Tareas </a>
                    <a href="materia.php?id=<?= $materia['id'] ?>" class="btn btn-primary btn-sm btn-block"> Materia </a>
                    <a href="accion_mat.php?id_mat=<?= $materia['id'] ?>" class="btn btn-primary btn-sm btn-block"> Alumnos </a>
                </div>
                
                <?php
                        endwhile;
                    endif;
                ?>
            
            </div>
        </div>
    </div>
    <?php endif; ?>
    
    <!-- // PRINCIPAL ADM -->
    <?php if ($_SESSION['rol'] == 1): ?>
    <div class="container-fluid mx-auto" style="width: 60%;">
        <div class="border border-info rounded">
            <div class="card card-header mx-auto">
                Bienvenido!
            </div>
            <br>
                <?php 
                    $mat = Materias_Profe($bd, $_SESSION['id']);
                    if (!empty($mat)):
                ?>
            
            <div class="row">
                <h3 class="offset-md-1"> Tus materias </h3>
            </div>
            <div class="card-body row">
            
                <?php 
                        while ($materia = mysqli_fetch_assoc($mat)):
                ?>
                     
                <div class="card card-body ml-3 mr-3 mb-3" style="width: 20%;">
                    <h5> <?php echo $materia['materia']; ?> </h5>
                    <a href="accion_mat.php?id=<?= $materia['id'] ?>" class="btn btn-info btn-sm"> Ir </a>
                </div>
                
                <?php
                        endwhile;
                    endif;
                ?>
                
            <div class="row">
                <h3 class="offset-md-1"> Materias </h3>
            </div>
            <div class="card-body row">    
            
                <?php
                $id_cur = Adm_Curso($bd, $_SESSION['id']);
                $id = mysqli_fetch_assoc($id_cur);
                $id_c = intval($id['id_curso']);
                $materias = Mat_Mod_Cur($bd, $id_c);
                    if (!empty($materias)):
                        while ($mat = mysqli_fetch_assoc($materias)):
                ?>
                     
                <div class="card card-body ml-3 mr-3 mb-3" style="width: 30%;">
                    <h5> <?php echo $mat['materia']; ?> </h5>
                    <p class="card-text text-justify" style="font-size: 15px;"> <?= substr($mat['objetivo'], 0, 150).'...' ?> </p>
                    <a href="accion_mat.php?mat=<?= $mat['id'] ?>" class="btn btn-warning btn-sm"> Observar </a>
                </div>
                
                <?php
                        endwhile;
                    endif;
                ?>
                
            </div>
        </div>
    </div>
    <?php endif; ?>
    
    <?php require_once 'includes/dia_tarea.php'; ?>
    
</div>
