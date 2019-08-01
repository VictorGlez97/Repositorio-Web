<div class="container-fluid mx-auto mt-4 mb-4 row">
    <span class="border border-info rounded" style="width: 20%;">
    <div class="list-group-flush panel card">
        <!--<a href="" class="list-group-item list-group-item-light nav-link"> Profesores </a>-->
        <a href="#mod" class="list-group-item list-group-item-light nav-link dropdown-item" data-toggle="collapse"> 
            Modulos 
        </a>
    
        <div class="collapse" id="mod">
            
            <?php $cur = Conseguir_Cursos($bd);
                  if (!empty($cur)):
                    while ($curso = mysqli_fetch_assoc($cur)):?>
            
                    <a href="curso.php?id=<?= $curso['id'] ?>" class="list-group-item color-info nav-link" data-toggle="collapse"> 
                        <?= $curso['curso']; ?>
                    </a>
            
            <?php   endwhile;
                  endif; ?>
            
        </div>
    </div>
    </span>