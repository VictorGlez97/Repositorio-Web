<?php require_once 'includes/cabecera.php'; ?>

    <div class="container-fluid border border-info rounded  mt-5" style="width: 80%; height: 100%;">
        <div class="mx-auto">
            <h2 class="text-primary"> Registrate </h2>
            <hr>
        </div>
        
        <form class="form-group row mb-3" action="php/registro.php" method="POST" name="formul">
            <div class="float-rigth ml-4 mr-5" style="width: 45%;">
                <label for="nombre"> Nombre </label><br/>
                <input type="text" class="form-control" name="nombre"><br/>

                <label for="apellidos"> Apellidos </label><br/>
                <input type="text" class="form-control" name="apellidos"><br/>
                
                <label for="ncontrol"> Numero de Control </label><br/>
                <input type="text" class="form-control" name="ncontrol"><br/>
                
                <label for="email"> Correo </label><br/>
                <input type="email" class="form-control" name="email"><br/>
            </div>
            
            <div class="float-left mb-4" style="width: 45%;">       
                <label for="rol"> Rol </label><br/>
                <select name="rol" class="form-control" onchange="dimepropiedad();">          
                    <?php 
                        $roles = Roles($bd);
                        if (!empty($roles)) :
                            while ($rol = mysqli_fetch_assoc($roles)) :
                    ?>
                    <option value="<?= $rol['id'] ?>">
                        <?= $rol['rol'] ?>
                    </option>
                    <?php 
                            endwhile;
                        endif;
                    ?>
                </select><br/>
                
                <label for="curso" id="ac"> Selecciona el Curso que Administras </label>
                <select name="curso" id="admc" class="form-control mb-4">
                    <?php 
                        $c = Conseguir_Cursos($bd);
                        if (!empty($c)):
                            while ($curso = mysqli_fetch_assoc($c)):
                    ?>
                            
                    <option value="<?= $curso['id'] ?>"> <?= $curso['curso'] ?> </option>
                    
                    <?php   endwhile;
                        endif;
                    ?>
                </select>
                
                <label for="pass"> Contraseña </label><br/>
                <input type="password" class="form-control" name="pass"><br/>
                
                <label for="pass2"> Favor de repetir la Contraseña </label><br/>
                <input type="password" class="form-control" name="pass2">                
            </div>
            
            <input type="submit" src="php/registro.php" class="btn btn-success mb-3 ml-4" style="width: 95%;" name="Enviar"/>
        </form>
    </div>

<!--</div>-->

<script src="js/usuario.js"></script>