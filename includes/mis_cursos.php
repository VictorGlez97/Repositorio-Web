
<span class="border border-info rounded" style="width: 20%;">
        <div class="list-group-flush panel card">
            <!--<a href="" class="list-group-item list-group-item-light nav-link"> Profesores </a>-->
            
            <?php 
                $id = intval($_SESSION['id']);
                $mat = Materias_Usuario($bd, $id); 
                if (!empty($mat)){
            ?>
              
                <a href="#mod" class="list-group-item list-group-item-light nav-link dropdown-item" data-toggle="collapse"> Mis cursos </a>
                
                <div class="collapse" id="mod">
                    <?php                while ($materia = mysqli_fetch_assoc($mat)): ?>
                        <a href="curso.php?id_m=<?= $materia['id'] ?>" class="list-group-item nav-link"> <?= $materia['materia'] ?> </a>
                    <?php                endwhile; ?>
                </div>
                
            
            <?php
                } elseif (empty ($m)){
            ?>        
            
                <h5> Por el momento no estas inscrito alguna materia </h5>
                <a href="" class="btn btn-info brn-sm"> Ver Materias </a>
                
            <?php
                }
            ?>
                
            
           
        </div>
    </span>
