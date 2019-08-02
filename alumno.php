<?php include_once 'includes/cabecera.php'; ?>

<style>
    .as {
        color: black;
    }

    .as:hover {
        background-color: dimgrey;
        color: white;
        text-decoration: none;
    }

    .btnVer {
        background-color: rgb(33, 136, 56);
        color: white;
        border-radius: 4px;
        width: 100%;
        padding: 4px;
        text-align: center;
    }

    .btnVer:hover {
        background-color: transparent;
        border-radius: 4px;
        padding: 2px;
        border: 2px solid rgb(33, 136, 56);
        color: rgb(33, 136, 56)
    }

    .notifyIcon {
        border-radius: 50%;
        height: 20px;
        width: 20px;
        color: white;
        background-color: rgb(33, 136, 56);
        text-align: center;

    }
</style>
<br>
<div class="container-fluid mx-auto row" style="width: 90%; margin-left:5%">
    <img src="img/usuario.png">&nbsp; &nbsp; &nbsp;<h1> <?= $_SESSION['nombre'].' '.$_SESSION['apellido'] ?> </h1>
</div>
<div class="container-fluid mx-auto mt-4 mb-4 row">
    <span class="border border-warning rounded" style="width: 20%;">
        <div class="list-group-flush panel card">
            <!--<a href="" class="list-group-item list-group-item-light nav-link"> Profesores </a>-->
            <a href="#mod" class="list-group-item list-group-item-light nav-link dropdown-item" data-toggle="collapse"> Mis cursos </a>

            <div class="collapse" id="mod">
                <a href="#" class="list-group-item as"> Programacion Basica </a>
                <a href="#" class="list-group-item as"> Orientada a objetos </a>
                <a href="#" class="list-group-item as"> Estructura de datos </a>
                <a href="#" class="list-group-item as"> Programacion web </a>
                <a href="#" class="list-group-item as"> Programacion web en java </a>
            </div>
        </div>
    </span>


    <div class="container-fluid mx-auto" style="width: 60%;">
        <div class="border border-warning rounded">
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
                    <h5 class="card-title"> Programación Basicá</h5>
                    <p class="card-text text-justify" style="font-size: 15px;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean pellentesque elit eu leo iaculis, vel consectetur arcu imperdiet. </p>
                    <a href="" class="btnVer"> Ver </a>
                </div>
            </div>
            <div class="card-body row">
                <div class="card card-body ml-3 mr-3 mb-3" style="width: 30%;">
                    <h5 class="card-title"> Programación web </h5>
                    <p class="card-text text-justify" style="font-size: 15px;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean pellentesque elit eu leo iaculis, vel consectetur arcu imperdiet. </p>
                    <a href="" class="btnVer"> Ver </a>
                </div>
            </div>
            <div class="card-body row">
                <div class="card card-body ml-3 mr-3 mb-3" style="width: 30%;">
                    <h5 class="card-title"> Programación orientada a objetos </h5>
                    <p class="card-text text-justify" style="font-size: 15px;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean pellentesque elit eu leo iaculis, vel consectetur arcu imperdiet. </p>
                    <a href="" class="btnVer"> Ver </a>
                </div>
            </div>
        </div>
    </div>

    <span  style="height:100%;width: 20%;">
       <div class="border border-warning rounded">
       <div class="text-center">
           <br>
            <h6>USUARIOS EN LINEA</h6>
            <p>(ultimos 5 minutos: 1)</p>
            
        </div>
       </div>
       <br>
       <div class="border border-warning rounded">
       <div class="text-center">
           <br>
            <h6>CALENDARIO</h6>
            <?php require_once 'includes/calendar.php'; ?>
            
        </div>
       </div>
    </span>
    
</div>
</div>


<?php include_once 'includes/pie.php'; ?>