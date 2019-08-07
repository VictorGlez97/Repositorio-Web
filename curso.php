<?php include_once 'includes/cabecera.php'; ?>

<?php if (!isset($_GET)){
     header("Location:index.php");
} ?>

<br>
<div class="container-fluid mx-auto row" style="width: 90%; margin-left:5%">
    <img src="img/usuario.png">&nbsp; &nbsp; &nbsp;<h1> <?= $_SESSION['nombre'].' '.$_SESSION['apellido'] ?> </h1>
</div>
<div class="container-fluid mx-auto mt-4 mb-4 row">
    
    <?php require_once 'includes/sidebar.php'; ?>

    <div class="container-fluid mx-auto" style="width: 60%;">
        <div class="border border-info rounded">
            <div class="card card-header mx-auto">
                <?= $_GET["mat"] ?>
            </div>
            <br>
            <?php
            $id_mat = intval($_GET['id_mat']);
            $uni = Conseguir_unidades($bd, $id_mat);
            if (!empty($uni)){
                while ($unidad = mysqli_fetch_assoc($uni)){
            ?>
                <div class="row">
                    <h3 class="offset-md-1"> <?= $unidad['numero'].' '.$unidad['unidad'] ?> </h3>
                </div>
            
                <?php
                    $id_uni = $unidad['id']; 
                    $tar = Tareas_Unidad($bd, $id_uni);
                    if (!empty($tar)){
                        while ($tarea = mysqli_fetch_assoc($tar)){
                ?>
                     
                <div class="card-body row">
                    <div class="card card-body ml-3 mr-3 mb-3" style="width: 30%;">
                        <h5 class="card-title"> Tarea: <?= ' '.$tarea['tarea'] ?> </h5>
                        <p class="card-text text-justify" style="font-size: 15px;"> <?= $tarea['descripcion'] ?> </p>
                        <p class="card-text text-justify" style="font-size: 10px; margin-left: 80%;"> <?= $tarea['f_inicio'].' || '.$tarea['f_fin'] ?> </p>
                        <a href="obs_tarea.php?id_tar=<?= $tarea['id'] ?>" class="btn btn-info btn-sm"> Ir </a>
                    </div>
                </div>
            
                <?php
                        }
                    }
                    $_SESSION['id_mat'] = $id_mat;
                ?>
            
            <?php
                }
            }
            ?>
        </div>
    </div>

    <?php require_once 'includes/dia_tarea.php'; ?>
    
</div>
</div>


<?php include_once 'includes/pie.php'; ?>