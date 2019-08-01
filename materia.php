<?php 
    require_once 'includes/cabecera.php'; 
    $num = intval($_GET['mat']);
?>

<?php 
    $materia = Mostrar_Mat($bd, $num);
?>

<div class="container mx-auto mt-5" style="width: 90%;">
        <div class="border border-info rounded">
            <div class="card card-header mx-auto">
                <h4> <?= $materia[1] ?> </h4>
            </div>
            <div class="card-body ml-5">
            
                <?php $m = Conseguir_Modulos($bd, $materia[6]);       $modulo = mysqli_fetch_row($m);?>
                <h5 class=""> Modulo: <b><?= $modulo[1]; ?></b></h5>
                
                <h5 class="mt-4"> Profesor: <b><?= $materia[7].' '.$materia[8]  ?></b> </h5>
                
                <h5 class="mt-4">Objetivo Materia:</h5>
                <p class="text-justify"> <?= $materia[2]; ?> </p>
            
                <?php if(!empty($materia[3])):?>
                <h5> Material: </h5>
                <a href="" download="<?=$materia[1]?>"> Descarga el Material </a>
                <?php endif;?>
                
                <?php if ($_SESSION['rol'] == 3): ?>
                <form class="mt-4 form-group" method="POST" action="php/inscribirse.php">
                    <?php
                    if (!empty($materia[4])):
                        echo '<label for="clave"> Ingresa la clave: </label>'
                           . '<input type="text" name="clave"/>';
                    endif;
                    ?>
                    <input type="hidden" name="id_mat" value="<?= $materia[0] ?>"/>
                    <input type="submit" class="btn btn-info btn-sm" style="margin-top: -5px;" value="Inscribirme"/>
                </form>
                <?php endif; ?>
                
            </div>
        </div>
</div>



