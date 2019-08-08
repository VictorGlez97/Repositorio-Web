<?php require_once 'includes/cabecera.php'; ?>

<?php

    if (empty($_SESSION['nombre'])){
        header('Location: index.php');
    } elseif ($_SESSION['rol'] == 3) {
        header('Location: index.php');
    }
     
    if (isset($_GET)){
        if (isset($_GET['id'])){
            require_once 'includes/sidebar.php';
?>            
    
            

<?php             
            require_once 'includes/dia_tarea.php';
        } elseif (isset ($_GET['id_mat'])){
            require_once 'includes/sidebar.php';
?>            
     
    

<?php       
            require_once 'includes/dia_tarea.php';
        } else {
            header('Location: index.php');
        }
        
    }
?>


