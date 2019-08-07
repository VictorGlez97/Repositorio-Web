<?php require_once 'includes/cabecera.php'; ?>

<?php 
    if (empty($_SESSION['nombre'])){
        header("Location:index.php");
    } elseif ($_SESSION['rol'] == 3) {
        header("Location:index.php");
    }
      
      ?>

<div class="container mx-auto mt-5 mb-3" style="width: 90%;">
        <div class="border border-info rounded">
            <div class="card card-header mx-auto">
                <h3> Nueva Tarea </h3>
            </div>
            <div class="card-body">
                
                <?php if (!isset($_POST['id_mat']) or !isset($_GET['id_mat'])){ ?>
                <form class="form-group" method="POST" action="nueva_tarea.php">
                    
                    <?php 
                        $mat = Materias_Profe($bd, $_SESSION['id']);
                        if (!empty($mat)){
                    ?>
                    <select name="id_mat" class="form-control mb-3"> 
                    <?php
                        while ($materia = mysqli_fetch_assoc($mat)){
                    ?>
                    
                        <option value="<?= $materia['id'] ?>">
                            <?= $materia['materia'] ?>
                        </option>
                    
                    <?php
                        }?>
                    </select>
                    <input type="submit" title="Ok" class="btn btn-success btn-block"/>
                    <?php    
                        } elseif (empty($mat)){
                            echo '<br/> No tienes materias, para poder crear tareas necesitas una Materia, <a href="nueva_materia.php"> CREA UNA MATERIA </a>';   
                        }
                    ?>
                        
                </form>
                <?php } ?>
                
                <?php if (isset($_POST['id_mat']) || isset($_GET['id_mat'])) {
                    if (isset($_POST['id_mat'])){
                        $id_mat = intval($_POST['id_mat']);
                    } elseif (isset ($_GET['id_mat'])){
                        $id_mat = intval($_GET['id_mat']);
                    }
                    
                    $uni = Unidades_mat($bd, $id_mat);
                    ?>
                <form class="form-group container" method="POST" action="php/guarda_tarea.php" enctype="multipart/form-data">
        
                    
                    <labe for='tarea'> Tarea: </labe>
                    <input type="text" name="tarea" class="form-control"/>
                    
                    <label for="desc"> Descripcion tarea: </label><br/>
                    <textarea rows="5" class="form-control" name="desc" placeholder="Ingresa una descripcion para la nueva tarea!!!"></textarea>
                    <h6 style="color: #3867D6; font-size: 12px; margin-left: 2%;" class="mb-3"> * Este campo es opcional * </h6><br/>
                    
                    <label> ¿Que acepta esta tarea? </label><br/>
                    <div class="form-check">
                        <input type="checkbox" name="img" value="img" class="form-check-input">
                        <label for="img" class="form-check-label"> Imagen</label><br/>
                        <input type="checkbox" name="arc" value="arc" class="form-check-input">
                        <label for="arc" class="form-check-label"> Archivo </label><br/>
                        <input type="checkbox" name="doc" value="doc" class="form-check-input">
                        <label for="doc" class="form-check-label"> Documentos </label><br/>
                    </div><br/>
                    
                    <label for="id_uni"> Selecciona la unidad de esta Tarea </label>
                    <?php if(!empty($uni)):?>
                    <select name="id_uni" class="form-control">
                           <?php while ($unidad = mysqli_fetch_assoc($uni)): ?>
                    <option value="<?= $unidad['id'] ?>"> <?= $unidad['numero'].' '.$unidad['unidad'] ?></option>
                    <?php
                            endwhile;
                    endif; ?>
                    </select><br/>
                    
                    <label for="mat"> Material de apoyo: </label><br/>
                    <div class="custom-file mb-3 mt-3" id="arc">
                        <input type="file" class="custom-file-input" name="mat" id="arc">
                        <label class="custom-file-label" for="img" id="limg">Seleccionar Imagen</label>
                        <h6 style="color: #3867D6; font-size: 12px; margin-left: 2%;" class="mb-3"> * Este campo es opcional * </h6>
                    </div>
                    
                    <label for="f_i"> Inicio: </label>
                    <input type="date" name="f_i" class="form-control" style="width:50%"/><br/>
                    
                    <label for="f_f" > Finalización: </label>
                    <input type="date" name="f_f" class="form-control" style="width:50%"/><br/>
                    
                    <input type="hidden" name="id_mat" value="<?= $id_mat ?>"/>
                    
                    <input type="submit" class="btn btn-success" name="enviar"/>
                    <input type="reset" class="btn btn-danger" name="borrar"/>
                </form>
                <?php } ?>
                
            </div>
        </div>
</div>