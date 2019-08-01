<?php include_once 'includes/cabecera.php'; ?>

<?php require_once 'includes/sidebar.php'; ?>
    
    <div class="container-fluid mx-auto" style="width: 80%;">
        <div class="border border-info rounded">
            <div class="card card-header mx-auto">
                Cursos recientemente agregados
            </div>
            <div class="card-body row">
                
                <?php $mat = Conseguir_Materias($bd); ?>
                
                <?php if (!empty($mat)):
                        while ($materia = mysqli_fetch_assoc($mat)):?>

                <div class="card card-body ml-3 mr-3 mb-3" style="width: 30%;">
                    <h5 class="card-title"> <?= $materia['materia'] ?> </h5>
                    <p class="card-text text-justify" style="font-size: 15px;"> <?= substr($materia['objetivo'], 0, 200).'...';; ?> </p>
                    <a href="materia.php?mat=<?= $materia['id'] ?>" class="btn btn-success btn-sm"> Ver </a>
                </div>
                
                <?php   endwhile;
                      endif; ?>
                
            </div>
        </div>
    </div>
</div>


<?php include_once 'includes/pie.php'; ?>
            
       