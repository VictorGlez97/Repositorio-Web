    <span style="height:100%;width: 20%;">
        <div class="border border-info rounded">
            <div class="text-center">
                <br>
                <h6><?php echo date('Y-m-d'); ?></h6>
            </div>
            
            <?php
            if ($_SESSION['rol'] == 1):
                $t = Tareas_Pendientes($bd);
                if (!empty($t)){
                    while ($tarea = mysqli_fetch_assoc($t)){
            ?>
            
            <div class="card-body border border-success rounded m-1">
                <h5> <?php echo $tarea['tarea'] ?> </h5>
                <p> Fecha de entrega: </p><p style="color: tomato;"> <?= $tarea['f_fin'] ?>  </p>
                <a class="btn btn-info color-light btn-sm btn-block" href="obs_tarea.php?id_tar=<?= $tarea['id'] ?>"> Observar Tarea </a>
            </div>
            
            <?php    
                    }
            } elseif (empty ($t)) {
            ?>
            
            <p style="font-size: 13px; text-align: center; margin-top: 20%;"> Por el momento no hay Tareas </p>
            
            <?php
            }
            endif;
            
            if ($_SESSION['rol'] == 3):
                $t = Tareas_Alu($bd);
                if (!empty($t)){
                    while ($tarea = mysqli_fetch_assoc($t)){
            ?>
            
            <div class="card-body border border-success rounded m-1">
                <h5> <?php echo $tarea['tarea'] ?> </h5>
                <p> Fecha de entrega: </p><p style="color: tomato;"> <?= $tarea['f_fin'] ?>  </p>
                <a class="btn btn-info color-light btn-sm btn-block" href="obs_tarea.php?id_tar=<?= $tarea['id'] ?>"> Observar Tarea </a>
            </div>
            
            <?php    
                    }
            } elseif (empty ($t)) {
            ?>
            
            <p style="font-size: 13px; text-align: center; margin-top: 20%;"> Por el momento no hay Tareas </p>
            
            <?php
            }
            endif;?>
            
        </div>
        <br>
    </span>