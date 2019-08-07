<?php require_once 'includes/cabecera.php';?>

<?php if (empty($_SESSION['curso']) && !isset($_POST['cur']) && empty($_GET)): ?>
<form class="container card border-info rounded mt-5" method="POST" action="ver_materias.php">
    <div class="mt-3 mb-3 container-fluid" style="width: 90%;">
        <label> Ingresa un Curso q te interese: </label>
        <select name="cur" class="form-control mb-3">
            <?php 
                $cur = Conseguir_Cursos($bd);
                if (!empty($cur)):
                    while ($curso = mysqli_fetch_assoc($cur)):
            ?>

            <option value="<?= $curso['id'] ?>"> <?= $curso['curso'] ?> </option>

            <?php
                    endwhile;
                endif;
            ?>
        </select>
        
        <input type="submit" class="btn btn-success btn-block" value="Ok"/>
    </div>
</form>
<?php endif; ?>

<?php if (isset($_POST['cur'])): ?>
    
    <div class="container-fluid mx-auto mt-5" style="width: 90%;">
        <div class="border border-info rounded">
            <div class="card card-header mx-auto">
                Modulos de 
            </div>
            <div class="card-body row">
                
                <?php 
                    $id_cur = intval($_POST['cur']);
                    $mod = Conseguir_Modulos($bd, $id_cur);
                    if (!empty($mod)):
                        while ($modulo = mysqli_fetch_assoc($mod)):
                ?>
                
                <div class="card card-body ml-3 mr-3 mb-3" style="width: 30%;">
                    <h5 class="card-title"> <?= $modulo['modulo'] ?> </h5>
                    <a href="ver_materias.php?mod=<?= $modulo['id'] ?>" class="btn btn-success btn-block btn-sm"> Ver Materias </a>
                </div>

                <?php        
                        endwhile;
                    endif;
                ?>
                
            </div>
        </div>
    </div>
      
<?php endif; ?>

<?php if (!empty($_GET)): ?>
    <div class="container-fluid mx-auto mt-5" style="width: 90%;">
        <div class="border border-info rounded">
            <div class="card card-header mx-auto">
                Materias
            </div>
            <div class="card-body row">
                
                <?php $mat = Mat_Modulo($bd, $_GET['mod']); ?>
                
                <?php if (!empty($mat)):
                        while ($materia = mysqli_fetch_assoc($mat)):?>

                <div class="card card-body ml-3 mr-3 mb-3" style="width: 30%;">
                    <h5 class="card-title"> <?= $materia['materia'] ?> </h5>
                    <p class="card-text text-justify" style="font-size: 15px;"> <?= substr($materia['objetivo'], 0, 200).'...';; ?> </p>
                    <a href="materia.php?mat=<?= $materia['id'] ?>&mod=<?= $_GET['mod'] ?>" class="btn btn-success btn-sm"> Ver </a>
                </div>
                
                <?php   endwhile;
                      endif; ?>
                
            </div>
        </div>
    </div>
<?php endif; ?>


<!-- // POR EL MOMENTO NO SIRVE, FALTA AGREGAR $_SESSION['ROL'] A LA HORA DE INGRESAR -->
<?php if (!empty($_SESSION['curso'])): ?>
    <div class="container-fluid mx-auto mt-5 mb-5" style="width: 90%;">
        <div class="border border-info rounded">
            <div class="card card-header mx-auto">
                Modulos que te pueden interesar <?php $_SESSION['nombre'].' '.$_SESSION['apellido'] ?> 
            </div>
            <div class="card-body row">
                
                <?php 
                    $mod = Conseguir_Modulos($bd, $_SESSION['curso']);
                    if (!empty($mod)):
                        while ($modulo = mysqli_fetch_assoc($mod)):
                ?>
                
                <div class="card card-body ml-3 mr-3 mb-3" style="width: 30%;">
                    <h5 class="card-title"> <?= $modulo['modulo'] ?> </h5>
                    <a href="modulo.php?mod=<?= $modulo['id'] ?>" class="btn btn-success btn-block btn-sm"> Ver Materias </a>
                </div>

                <?php        
                        endwhile;
                    endif;
                ?>
                
            </div>
        </div>
    </div>
    
    <div class="container-fluid mx-auto" style="width: 90%;">
        <div class="border border-info rounded">
            <div class="card card-header mx-auto">
                Materias que te pueden interesar <?= $_SESSION['nombre'].' '.$_SESSION['apellido'] ?>
            </div>
            <div class="card-body row">
                
                <?php $mat = Mat_Modulo($bd, $_SESSION['curso']); ?>
                
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

<?php endif; ?>