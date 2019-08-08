<?php 
    require_once 'includes/cabecera.php'; 
    $num = intval($_GET['mat']);
    //$mod = intval($_GET['mod']);
    error_reporting(E_ALL ^ E_NOTICE);
?>

<?php 
    $mat = Mostrar_Mat($bd, $num);
    $materia = mysqli_fetch_assoc($mat);
?>

<div class="container mx-auto mt-5" style="width: 90%;">
        <div class="border border-info rounded">
            <div class="card card-header mx-auto">
                <h4> <?= $materia['materia'] ?> </h4>
            </div>
            <div class="card-body ml-5">
            
                <?php $m = Conseguir_Modulo($bd, intval($materia['id_modulo']));  $modulo = mysqli_fetch_assoc($m);?>
                <h5 class=""> Modulo: <b><?= $modulo['modulo']; ?></b></h5>
                
                <h5 class="mt-4"> Profesor: <b><?= $materia['nombre'].' '.$materia['apellido']  ?></b> </h5>
                
                <h5 class="mt-4">Objetivo Materia:</h5>
                <p class="text-justify"> <?= $materia['objetivo']; ?> </p>
            
                <?php if(!empty($materia['material'])):?>
                <h5> Material: </h5>
                <a href="php/descarga.php?arc=<?= $materia['id'] ?>"> Descarga el Material </a><br/><br/>
                <?php endif;?>
                
                <?php if (!empty($_SESSION['nombre'])) {?>
                <?php if ($_SESSION['rol'] == 3){ ?>
                <form class="mt-4 form-group" method="POST" action="php/inscribirse.php">
                    <?php
                    if (!empty($materia['material'])):
                        echo '<label for="clave"> Ingresa la clave: </label>'
                           . '<input type="text" name="clave"/>';
                    endif;
                    ?>
                    <input type="hidden" name="id_mat" value="<?= $materia['id'] ?>"/>
                    <input type="submit" class="btn btn-info btn-sm" style="margin-top: -5px;" value="Inscribirme"/>
                </form>
                <?php } elseif ($_SESSION['rol'] == 2 || $_SESSION['rol'] == 1) {?>
                <a href="ver_tareas.php?mat=<?= $_GET['mat'] ?>" class="btn btn-primary"> Ver Tareas </a>
                <?php }
                
                } elseif (empty ($_SESSION['nombre'])) { ?>
                <h6 class="mt-5"> Podrias entrar a este curso, solo tienes que <a href="nuevo_usuario.php" class="link"> REGISTRARTE </a> </h6>
                <?php } ?>
                

                
            </div>
        </div>
</div>



