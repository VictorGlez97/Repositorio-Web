<?php 
    require_once 'includes/cabecera.php'; 
    $num = intval($_GET['mat']);
?>

<?php $materia = Mostrar_Mat($bd, $num);?>

<div class="container mx-auto mt-5" style="width: 90%;">
        <div class="border border-info rounded">
            <div class="card card-header mx-auto">
                <h4> <?= $materia[1] ?> </h4>
            </div>
            <div class="card-body ml-5">
                <h5> <n> Profesor: </n> <?= $materia[7].' '.$materia[8]  ?> </h5>
            </div>
        </div>
    
</div>



