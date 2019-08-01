
<div class="modal fade" id="log" tabindex="-1" aria-labelledby="logi" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="logi"> Acceder </h4>
                <button type="button" class="close ml-4" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form class="form-group" action="php/login.php" method="POST">
                <div class="modal-body">
                    <input type="text" class="form-control" name="usuario" placeholder="Correo ó Numero de Control"/><br/>
                    <input type="password" class="form-control" name="pass" placeholder="Contraseña"/> 
                </div>    
            
                <div class="modal-footer">
                    <p>  <a class="nav-link" href="nuevo_usuario.php">No tengo Cuenta</a></p>
                    <input type="submit" class="btn btn-success" name="login" value="Entrar"/>
                </div>
            </form>
            
        </div>
    </div>
</div>
