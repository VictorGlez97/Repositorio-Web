<?php require_once 'includes/cabecera.php'; ?>

<?php if (empty($_SESSION['nombre'])):
     header("Location:index.php");
      endif; ?>

<form class="form-group container m-6 mt-5" method="POST" action="php/guarda_materia.php" enctype="multipart/form-data">
    <h2> Nueva Materia </h2><hr>
    
    <label for="materia"> Nombre materia: </label><br/>
    <input type="text" class="form-control" name="materia"/><br/>
    
    <label for="objetivo"> Objetivo de la materia: </label><br/>
    <textarea name="obj" rows="5" class="form-control" name="obj" placeholder="Ingresa algo inspirador para que se unan alumnos a tu materia!!!"></textarea><br/>
    
    <div class="custom-file mb-3">
        <input type="file" class="custom-file-input" name="doc"><br/>
        <label class="custom-file-label" for="doc"> Ingresa un PDF o Word </label>
        <h6 style="color: #3867D6; font-size: 12px; margin-left: 2%;" class="mb-3"> * Este campo es opcional * </h6><br/>
    </div>
    
    <?php if ($_SESSION['rol'] == 1 ):?>
    <label for="prof"> Seleccione profesor para la materia: </label>
    <select class="form-control mb-3" name="prof">
        <?php 
            $p = Conseguir_profes($bd);
            if (!empty($p)):
                while ($profe = mysqli_fetch_assoc($p)):?>
                
                    <option value="<?= $profe['id'] ?>">
                        <?= $profe['nombre'] . ' ' . $profe['apellido']  ?>
                    </option>      
        
        <?php   
                endwhile;
            endif;
        ?>
    </select>
    <?php endif; ?>
    
    <label for="mod"> Seleccione el Modulo </label>
    <select class="form-control mb-3" name="mod">
        <?php 
            $m = Conseguir_Mod($bd);
            if (!empty($m)):
                while ($modulo = mysqli_fetch_assoc($m)):
        ?>
                
        <option value="<?= $modulo['id'] ?>">
            <?= $modulo['modulo'] ?>
        </option>
        
        <?php   endwhile;
            endif;
        ?>
    </select>

    <label for="clave"> Clave: </label>
    <input type="text" class="form-control" name="clave"/>
    <h6 style="color: #3867D6; font-size: 12px; margin-left: 2%;" class="mb-3"> * Este campo es opcional * </h6><br/>
    
    <input type="submit" class="btn btn-success" name="enviar"/>
    <input type="reset" class="btn btn-danger" name="borrar"/>
</form>


