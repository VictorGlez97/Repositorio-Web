<?php require_once 'includes/cabecera.php'; ?>

<?php 
    if (!isset($_GET['id_tar'])){
        header("Location:principal.php");
    } elseif (isset($_GET['id_tar'])) {
        $id_tar = intval($_GET['id_tar']);
    }
    $conf = Tarea($bd, $id_tar);
    $c = mysqli_fetch_assoc($conf);
    //echo $_SESSION['id'];
        //echo $c['img'];
        //echo $c['doc'];
        //echo $c['arc'];
    
?>

    <div class="container-fluid mx-auto mt-5" style="width: 90%;">
        <div class="border border-info rounded">
            <div class="card card-header mx-auto">
                <h3> Tarea: <?= $c['tarea'] ?></h3>
            </div>
            <div class="card-body ">
                
                <h5> <?= $c['descripcion'] ?></h5>
                
                <div class="form-group m-6 p-3 container">
                    <?php if ($c['img'] == 'si') { ?>
                        <button onclick="imagen()" class="btn btn-outline-info m-3"> Imagen </button>
                    <?php } ?>

                    <?php if ($c['doc'] == 'si') { ?>
                        <button onclick="documento()" class="btn btn-outline-info m-3"> Documento </button>
                    <?php } ?>

                    <?php if ($c['arc'] == 'si') { ?>
                        <button onclick="archivo()" class="btn btn-outline-info m-3"> Archivo </button>
                    <?php } ?>

                    <form id="form" action="php/subir_tarea.php" method="POST" enctype="multipart/form-data">

                        <?php //if ($c['doc'] == 'si') {?>
                        <div class="custom-file m-3" id="doc">
                            <input type="file" class="custom-file-input" name="doc" id="doc" lang="es" accept="application/vnd, application/pdf">
                            <label class="custom-file-label" for="doc" id="ldoc">Seleccionar Documento</label>
                        </div>
                        <?php //} ?>

                        <?php //if ($c['img'] == 'si') {?>
                        <div class="custom-file m-3" id="img">
                            <input type="file" class="custom-file-input" name="img" id="img" accept="image/*">
                            <label class="custom-file-label" for="img" id="limg">Seleccionar Imagen</label>
                        </div>
                        <?php //} ?>

                        <?php //if ($c['arc'] == 'si') {?>
                        <div class="custom-file m-3" id="arc">
                            <input type="file" class="custom-file-input" name="arc" id="arc" accept="application/rar">
                            <label class="custom-file-label" for="arc" id="larc">Seleccionar Archivo</label>
                        </div>
                        <?php //} ?>

                        <input type="hidden" name="id_tar" value="<?= $id_tar ?>"/>

                        <input type="submit" class="btn btn-success m-3" value="Enviar">
                        <input type="reset" class="btn btn-danger m-3" value="Reset">

                    </form>

                </div>
            </div>
        </div>
    </div>

<script src="js/tarea.js"></script>