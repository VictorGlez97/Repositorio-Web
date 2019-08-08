<?php
require_once 'includes/cabecera.php';

if (empty($_SESSION['nombre'])){
    header("Location:index.php");
}

if ($_GET['id_us']):
    $us = intval($_GET['id_us']);
    $user = Usuario($bd, $us);
    
    if (!empty($user)):
        $usuario = mysqli_fetch_assoc($user);
?>
        
    <div class="container-fluid mx-auto mt-5 mb-5" style="width: 90%;">
        <div class="border border-info rounded">
            <div class="card card-header mx-auto">
                <h5> <?= $usuario['nombre'].' '.$usuario['apellido'] ?> </h5>
            </div>
            <div class="card-body p-4 ml-4 mt-3 mb-3 border border-primary rounded" style="width: 90%;">
                <form class="" method="POST" action="php/actualiza_us.php">
                    <label for="nombre"> Nombre </label><br/>
                    <input type="text" class="form-control" name="nombre" value="<?= $usuario['nombre'] ?>"/><br/>
                    
                    <label for="apellido"> Apellido </label><br/>
                    <input type="text" class="form-control" name="apellido" value="<?= $usuario['apellido'] ?>"/><br/>
                    
                    <label for="ncontrol"> Correo </label><br/>
                    <input type="text" class="form-control" name="ncontrol" value="<?= $usuario['ncontrol'] ?>"/><br/>
                    
                    <label for="correo"> Correo </label><br/>
                    <input type="email" class="form-control" name="correo" value="<?= $usuario['correo'] ?>"/><br/>
                    
                    <input type="hidden" name="id_us" value="<?= $us ?>"/>
                    
                    <input type="submit" class="btn btn-success btn-sm btn-block" name="enviar"/>
                </form>
            </div>
            
            <?php if ($us == $_SESSION['id']): ?>
            <button class="btn btn-warning ml-5 mb-3" onclick="boton()"> Cambiar contraseña </button>
            <?php endif; ?>
            
            <div class="card-body p-2 ml-4 mb-3 border border-warning rounded" id="contra" style="width: 40%;">
                <form class="card-body p-4 mb-3" method="POST" action="php/actualizar_us.php">
                    <label for="pass"> Contraseña </label><br/>
                    <input type="password" class="form-control" name="pass"/><br/>
                    
                    <label for="pass2"> Repite la contraseña </label><br/>
                    <input type="password" class="form-control" name="pass2"/><br/>
                    
                    <input type="submit" name="ok" class="btn btn-info btn-sm btn-block"/>
                </form>
            </div>
        </div>
    </div>
                
        
    <?php endif; ?>

<script src="js/editar.js"></script>
    
    
    
    
    
<?php endif; ?>

,