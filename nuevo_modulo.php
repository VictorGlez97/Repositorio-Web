<?php require_once 'includes/cabecera.php'; ?>

<?php
    if (empty($_SESSION['nombre'])){
        header('Location:index.php');
    }
    
    if ($_SESSION['estatus'] == 'aceptado'){
        header('Location:index.php');
    }
    
    if ($_SESSION['rol'] != 1){
        header('Location:index.php');
    }
?>

<div class="container mx-auto mt-4">
    <button class="btn btn-outline-warning" id="modulo" onclick="modulo();"> Crear Modulo </button>
    <button class="btn btn-outline-warning" id="curso" onclick="curso();"> Crear Curso </button>
</div>

    <div class="container mx-auto mt-3 mb-5" id="creamod" style="width: 90%;">
        <div class="border border-info rounded">
            <div class="card card-header mx-auto">
                <h3> Crea un nuevo Curso </h3>
            </div>
            <div class="card-body">
                
                <form class="form-group container" method="POST" action="php/guarda_cm.php">
    
                    <label for="curso"> Nombre Curso: </label><br/>
                    <input type="text" class="form-control mb-4" name="curso"/>
                    
                    <label for="coo"> Coordinado del Curso: </label><br/>
                    <select class="form-control mb-4" name="coo">
                        
                        <?php 
                            $adms = Conseguir_Adm($bd); 
                            if (!empty($adms)):
                                while ($adm = mysqli_fetch_assoc($adms)):
                        ?>
                        
                        <option value="<?= $adm['id'] ?>"> <?= $adm['nombre'].' '.$adm['apellido'] ?> </option>    
                        
                        <?php
                                endwhile;
                            endif;
                        ?>
                        
                    </select>
                    
                    <input type="submit" class="btn btn-success left" name="enviar"/>
                    <input type="reset" class="btn btn-danger left" name="borrar"/>
                </form>
                
            </div>
        </div>
    </div>

    <div class="container mx-auto mt-3 mb-5" id="creacur" style="width: 90%;">
        <div class="border border-info rounded">
            <div class="card card-header mx-auto">
                <h3> Crea un nuevo Modulo </h3>
            </div>
            <div class="card-body">
                
                <form class="form-group container" method="POST" action="php/guarda_cm.php">
    
                    <label for="mod"> Nombre Modulo: </label><br/>
                    <input type="text" class="form-control mb-4" name="mod"/>
                    
                    <label for="cur"> Curso del Modulo: </label><br/>
                    <select class="form-control mb-4" name="cur">
                        
                        <?php 
                            $cursos = Conseguir_Cursos($bd); 
                            if (!empty($cursos)):
                                while ($curso = mysqli_fetch_assoc($cursos)):
                        ?>
                        
                        <option value="<?= $curso['id'] ?>"> <?= $curso['curso'] ?> </option>    
                        
                        <?php
                                endwhile;
                            endif;
                        ?>
                        
                    </select>
                    
                    <input type="submit" class="btn btn-success left" name="enviar"/>
                    <input type="reset" class="btn btn-danger left" name="borrar"/>
                </form>
                
            </div>
        </div>
    </div>
            
<script src="js/modulo.js"></script>

<?php require_once 'includes/pie.php'; ?>
