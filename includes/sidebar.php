<?php error_reporting(E_ALL ^ E_NOTICE); ?>

<div class="container-fluid mx-auto mt-4 mb-4 row">
    <div class="border border-info rounded" style="width: 20%;">
    <div class="list-group-flush panel card">
        <!--<a href="" class="list-group-item list-group-item-light nav-link"> Profesores </a>-->
        <?php if (empty($_SESSION['nombre'])){ ?>
        <a href="#mod" class="list-group-item list-group-item-light nav-link dropdown-item" data-toggle="collapse"> 
            Modulos 
        </a>
    
        <div class="collapse" id="mod">
            
            <?php $cur = Conseguir_Cursos($bd);
                  if (!empty($cur)):
                    while ($curso = mysqli_fetch_assoc($cur)):?>
            
                    <a href="ver_materias.php?mod=<?= $curso['id'] ?>" class="list-group-item nav-link"> 
                        <?= $curso['curso']; ?>
                    </a>
            
            <?php   endwhile;
                  endif; ?>
            
        </div>
        <?php } ?>
        
        <?php
            if ($_SESSION['rol'] == 3){
                $id = intval($_SESSION['id']);
                $mat = Materias_Usuario($bd, $id); 
                if (!empty($mat)){
            ?>
              
                <a href="#mod" class="list-group-item list-group-item-light nav-link dropdown-item" data-toggle="collapse"> Mis cursos </a>
                
                <div class="collapse" id="mod">
                    <?php                while ($materia = mysqli_fetch_assoc($mat)): ?>
                        <a href="curso.php?id_mat=<?= $materia['id'] ?>&mat=<?= $materia['materia'] ?>" class="list-group-item nav-link"> <?= $materia['materia'] ?> </a>
                    <?php                endwhile; ?>
                </div>
                
            
        <?php
                } elseif (empty ($m)){
        ?>        
            
                <h5> Por el momento no estas inscrito alguna materia </h5>
                <a href="ver_materias.php" class="btn btn-info brn-sm"> Ver Materias </a>
                
        <?php
                }
            }
        ?>
        
        <?php if ($_SESSION['rol'] == 2){ ?>
        <a href="#mod" class="list-group-item list-group-item-light nav-link dropdown-item" data-toggle="collapse"> 
            Acciones 
        </a>
        
        <div class="collapse" id="mod">
            
            <a href="nueva_tarea.php" class="list-group-item nav-link"> 
                Nueva Tarea
            </a>
            <a href="ver_tareas.php" class="list-group-item nav-link"> 
                Ver Tareas
            </a>
            <a href="#" class="list-group-item nav-link"> 
                Alumnos
            </a>
            
        </div>
        <?php } ?>
        
        <?php if ($_SESSION['rol'] == 1){ ?>
        <a href="#mod" class="list-group-item list-group-item-light nav-link dropdown-item" data-toggle="collapse"> 
            Acciones 
        </a>
        
        <div class="collapse" id="mod">
            
            <a href="nueva_tarea.php" class="list-group-item nav-link"> 
                Nueva Tarea
            </a>
            <a href="ver_tareas.php" class="list-group-item nav-link"> 
                Ver Tareas
            </a>
            <a href="#" class="list-group-item nav-link"> 
                Alumnos
            </a>
            <a href="#" class="list-group-item nav-link"> 
                Profesores
            </a>
            <a href="#" class="list-group-item nav-link"> 
                Coordinadoes / Adm
            </a>
            
        </div>
        <?php } ?>
        
    </div>
    </div>