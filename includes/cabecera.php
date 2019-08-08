<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    
    <!--<link rel="stylesheet" href="css/usuario.css">-->

    <script src="js/script.js"></script>

    <?php require_once 'includes/bootstrap.php'; ?>
    <?php require_once 'php/conexion.php'; ?>
    <?php require_once 'php/helpers.php'; ?>

    <title>Repositorio</title>
</head>
<body>

    <nav class="navbar navbar-dark bg-primary navbar-expand-sm">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav">
                <?php if (empty($_SESSION['nombre'])): ?>
                <li class="nav-item active"> <a class="nav-link" href="index.php"> Repositorio  </a></li>
                <?php endif; ?>
                <?php if (isset($_SESSION['nombre'])): ?>
                <li class="nav-item active"> <a class="nav-link" href="principal.php"> Repositorio  </a></li>
                
                
                    
                <?php if($_SESSION['rol'] == 1): ?>
                    <?php if($_SESSION['estatus'] == 'espera') :?>
                    <li><a class="nav-link disabled" href="#"> Agregar Materias </a></li>
                    <li><a class="nav-link disabled" href="#"> Pendientes </a></li>
                    <?php endif; ?>
                    <?php if($_SESSION['estatus'] != 'espera') :?>
                    <li><a class="nav-link" href="nueva_materia.php"> Agregar Materias </a></li>
                    <li><a class="nav-link" href="pendientes.php"> Pendientes </a></li>
                    <li><a class="nav-link" href="nuevo_modulo.php"> Agreagar Cursos/Modulos </a></li>
                    <?php endif; ?>
                <?php endif; ?>
                
                <?php if($_SESSION['rol'] == 2):?>
                    <?php if($_SESSION['estatus'] == 'espera'){?>
                    <li><a class="dropdown-item disabled" href="#"> Agregar Materias </a></li>
                    <li><a class="dropdown-item disabled" href="#"> Tareas </a></li>
                    <?php }elseif(!$_SESSION['estatus'] != 'espera'){?>
                    <li><a class="nav-link" href="nueva_materia.php"> Agregar Materias </a></li>
                    <li><a class="nav-link" href="pendientes.php"> Tareas </a></li>
                <?php } ?>
                <?php endif; ?>
                    
                <?php if($_SESSION['rol'] == 3):?>
                      <li><a class="nav-link" href="curso.php"> Cursos </a></li>
                <?php endif; ?>
                <?php endif; ?>
            </ul>            
        </div>
        
        <form class="form-inline">
            <?php if(isset($_SESSION['nombre'])) :?>
            <div class="btn-group">
                <div class="btn-group dropleft">
                  <button type="button" class="btn btn-outline-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropleft</span>
                  </button>
                    <?php if($_SESSION['rol'] == 1):?>
                      <div class="dropdown-menu">
                      <?php if($_SESSION['estatus'] != 'espera') :?>
                      <a class="dropdown-item" href="ver_usuario.php"> Ver Perfil </a>
                      <?php endif; ?>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item bg-danger" style="color: white;" href="php/cerrar_session.php"> Cerrar Session </a>
                    </div>
                    <?php endif; ?>
                    
                    <?php if($_SESSION['rol'] == 2):?>
                    <div class="dropdown-menu">
                      <?php if(!$_SESSION['estatus'] != 'espera'){?>
                      <a class="dropdown-item" href="ver_usuario.php"> Ver Perfil </a>
                      <?php } ?>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item bg-danger" style="color: white;" href="php/cerrar_session.php"> Cerrar Session </a>
                    </div>
                    <?php endif; ?>
                    
                    <?php if($_SESSION['rol'] == 3):?>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="ver_usuario.php"> Ver Perfil </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item bg-danger" style="color: white;" href="php/cerrar_session.php"> Cerrar Session </a>
                    </div>
                    <?php endif; ?>
                </div>
                <a class="btn btn-outline-warning" href="ver_usuario.php">
                  <?php echo $_SESSION['nombre'].' '.$_SESSION['apellido']; ?>
                </a>
            </div>
            <?php endif; ?>
            
            <?php if(!isset($_SESSION['nombre'])) :?>
            <button type="button" class="btn btn-outline-warning my-2 my-sm-0" data-toggle="modal" data-target="#log">
                <img src="img/usuario.png" width="16" height="16" alt="usuario"/>
            </button>
            <a class="btn btn-outline-warning ml-3" href="nuevo_usuario.php"> Registrarme </a>
            <?php endif; ?>
        </form>       
        
    </nav>
    
    <?php require_once 'includes/ingresa.php'; ?>
    