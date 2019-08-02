<?php include_once 'includes/cabecera.php'; ?>
<?php if (empty($_SESSION['nombre'])){
        header("Location:index.php");
      } 
?>

<br>
<div class="container-fluid mx-auto row" style="width: 90%; margin-left:5%">
    <img src="img/usuario.png">&nbsp; &nbsp; &nbsp;<h1> <?= $_SESSION['nombre'].' '.$_SESSION['apellido'] ?> </h1>
</div>
<div class="container-fluid mx-auto mt-4 mb-4 row">
    
    <?php require_once 'includes/mis_cursos.php'; ?>

    <div class="container-fluid mx-auto" style="width: 60%;">
        <div class="border border-info rounded">
            <div class="card card-header mx-auto">
                Bienvenido!
            </div>
            <br>
            <div class="row">
                <h3 class="offset-md-1"> notificaciones nuevas </h3>
                <div class="notifyIcon">3</div>
            </div>
            <div class="card-body row">
                <div class="card card-body ml-3 mr-3 mb-3" style="width: 30%;">
                    <h5 class="card-title"> Programación Basicá </h5>
                    <p class="card-text text-justify" style="font-size: 15px;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean pellentesque elit eu leo iaculis, vel consectetur arcu imperdiet. </p>
                    <a href="" class="btn btn-info btn-sm"> Ver </a>
                </div>
            </div>
        </div>
    </div>

    <?php require_once 'includes/dia_tarea.php'; ?>
    
</div>
</div>


<?php include_once 'includes/pie.php'; ?>