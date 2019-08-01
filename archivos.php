<?php require_once 'includes/cabecera.php'; ?>
    
    <div class="form-group container card mt-5 mb-5">
        
        <h2> Ingresa tu tarea </h2>
        
        <form>

            <button class="mb-3" value="Texto"> <span class="glyphicon glyphicon-text"> </span> </button> <button class="mb-3" value="Archivo"> <span class="glyphicon glyphicon-file"> </span> </button>
            <div class="custom-file mb-3">
                <input type="file" class="custom-input-file" id="customFile">
                <label class="custom-file-label" for="customFile">  </label>
            </div>

            <textarea name="textarea" class="form-control mb-3" rows="5" placeholder="Escribe aqui!!!"></textarea>

            <input type="submit" value="Enviar Tarea" class="mb-3">
        </form>
    </div>

</body>
</html>