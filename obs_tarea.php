<?php require_once 'includes/cabecera.php';?>

<?php 
if (!isset($_GET)){
     header("Location: index.php");
} elseif (isset ($_GET['id_tar'])){
    $id_tar = intval($_GET['id_tar']);
}

//var_dump($id_tar);
?>

    <div class="container-fluid mx-auto row mt-3" style="width: 90%; margin-left:5%">
    <img src="img/usuario.png">&nbsp; &nbsp; &nbsp;<h1> <?= $_SESSION['nombre'].' '.$_SESSION['apellido'] ?> </h1>
</div>

<div class="container-fluid mx-auto mb-4 row">
    <?php require_once 'includes/sidebar.php'; ?>
    
    <div class="container-fluid mx-auto" style="width: 60%;">
        <div class="card border-info rounded">

            <?php 
                $t = Tarea($bd, $id_tar);
                if (!empty($t)): 
                    while ($tarea = mysqli_fetch_assoc($t)):
            ?>

            <div class="card card-header">
                <h5> <?= $tarea['tarea'] ?> </h5>
            </div>
            <div class="card-body container-fluid">
                <p> <?= $tarea['descripcion'] ?> </p>
                <a href="#"> Descargar </a>
                <p> fecha de inicio: <?= $tarea['f_inicio'] ?> </p>
                <p> fecha de vencimiento: <?= $tarea['f_fin'] ?> </p>
                
                <?php if ($_SESSION['rol'] == 3){ ?>
                <a href="tareas.php?id_tar=<?= $tarea['id'] ?>" class="btn btn-primary"> Ir / Entregar </a>
                <?php } elseif ($_SESSION['rol'] != 3){ ?>
                <a href="est_tarea.php?id_tar=<?= $tarea['id'] ?>"> Ver </a>
                <?php } ?>
            
            </div>
            
            <?php
                    endwhile;
                endif;
            ?>
            
        </div>
        
    </div><br/>
    <?php require_once 'includes/dia_tarea.php'; ?>
</div>

