<?php require_once 'includes/cabecera.php'; ?>

<div class="form-group m-6 p-3 container">
    
    <h3> Tarea </h3><hr>
    
    <button onclick="imagen()" class="btn btn-outline-info m-3"> Imagen </button>
    <button onclick="archivo()" class="btn btn-outline-info m-3"> Archivo </button>
    <button onclick="documento()" class="btn btn-outline-info m-3"> Documento </button>
    <button onclick="texto()" class="btn btn-outline-info m-3"> Texto </button>
    
    <form id="form" action="php/subir_tarea.php" method="POST" enctype="multipart/form-data">
    <!--<div class="form-group">
        <div class="input-group image-preview">
            <input placeholder="" type="text" class="form-control carga-archivo-filename" disabled="disabled">
            <span class="input-group-btn"> 
                <div class="btn btn-default carga-archivo-input"> 
                    <span class="glyphicon glyphicon-folder-open"></span>
                    <span class="carga-archivo-input-title">Seleccionar archivo</span>
                    <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview" />
                </div>
            </span>
        </div>
    </div>-->
        
        <div class="custom-file m-3" id="img">
            <input type="file" class="custom-file-input" name="img" id="img" accept="image/*">
            <label class="custom-file-label" for="img" id="limg">Seleccionar Imagen</label>
        </div>
        
        <div class="custom-file m-3" id="arc">
            <input type="file" class="custom-file-input" name="arc" id="arc" accept="application/rar">
            <label class="custom-file-label" for="arc" id="larc">Seleccionar Archivo</label>
        </div>
        
        <div class="custom-file m-3" id="doc">
            <input type="file" class="custom-file-input" name="doc" id="doc" lang="es" accept="application/vnd, application/pdf">
            <label class="custom-file-label" for="doc" id="ldoc">Seleccionar Documento</label>
        </div>
        
        <textarea name="texto" id="tex" class="form-control m-3" rows="5" placeholder="Escribe tu tarea aqui!!!"></textarea>
    
        <input type="submit" class="btn btn-success m-3" value="Enviar">
        <input type="reset" class="btn btn-danger m-3" value="Reset">
    
    </form>
    
</div>
    
<script src="js/tarea.js"></script>