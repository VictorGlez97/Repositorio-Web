<?php require_once 'includes/cabecera.php'; ?>

<div class="container-fluid mx-auto row mt-3" style="width: 90%; margin-left:5%">
    <img src="img/usuario.png">&nbsp; &nbsp; &nbsp;<h1> <?= $_SESSION['nombre'].' '.$_SESSION['apellido'] ?> </h1>
</div>

<div class="container-fluid mx-auto mb-4 row">
    
    <?php require_once 'includes/sidebar.php'; ?>
    
    <div class="container-fluid mx-auto" style="width: 60%;">
        <form class="card border-info rounded" method="POST" action="ver_tareas.php">
            <div class="card card-header">
                <h5> Ver Tareas </h5>
            </div>
            <div class="mt-3 mb-3 container-fluid">
                <label> Selecciona la materia: </label>
                <select name="mat" class="form-control mb-3">
                    <?php 
                        $mat = Materias_Profe($bd, $_SESSION['id']);
                        if (!empty($mat)): 
                            while ($materia = mysqli_fetch_assoc($mat)):
                    ?>

                    <option value="<?= $materia['id'] ?>"> <?= $materia['materia'] ?> </option>

                    <?php
                            endwhile;
                        endif;
                    ?>
                </select>

                <input type="submit" class="btn btn-success btn-block" value="Ok"/>
            </div>
        </form>
    </div><br/>

<?php require_once 'includes/dia_tarea.php'; ?>
</div>
<?php
if (isset($_POST['mat']) || isset ($_GET['mat'])) {
    if (isset($_POST['mat'])){
        $id_mat = intval($_POST['mat']);
    } elseif (isset($_GET['mat'])){
        $id_mat = intval($_GET['mat']);
    }
    ?>

    <div class="container-fluid mx-auto" style="width: 59%;">
        <div class="border border-info rounded">
            <div class="card card-header mx-auto">
                Tareas Subidas
            </div>
            <br>
            <div class="card-body row">
                
                <?php 
                    $t = Tareas_mat($bd, $id_mat);
                    if (!empty($t)){
                        while ($tarea = mysqli_fetch_assoc($t)){
                ?>
                
                <div class="card card-body ml-3 mr-3 mb-3" style="width: 30%;">
                    <h5 class="card-title"> Tarea: <?= $tarea['tarea'] ?> </h5>
                    <p class="card-text text-justify" style="font-size: 15px;"> <?= substr($tarea['descripcion'], 0, 150) ?> </p>
                    <p class="card-text text-justify" style="font-size: 10px; margin-left: 80%;"> <?= $tarea['f_inicio'].' || '.$tarea['f_fin'] ?> </p>
                    <a href="obs_tarea.php?id_t=<?= $tarea['id'] ?>" class="btn btn-info btn-sm"> Ver </a>
                </div>
                
                <?php             
                        }
                    } elseif (empty($t)){
                ?>
                
                <br/> Por el momento no haz subido TAREAS a esta materia, deseas <a href="nueva_tarea.php?id_mat<?= $id_mat ?>"> SUBIR TAREA </a> ?
                
                <?php   
                    }
                ?>
                
            </div>
        </div>
    </div>

<?php } ?>
