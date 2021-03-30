<?php
    session_start(); // Inicia la sesion
    require_once "Config/Globals.php"; 
    require_once "Core/BaseController.php";
    require_once "Core/FrontController.php";
    $front = new FrontController(); // Instancia el objeto del controladorn frontal.
    if(isset($_GET['controller'])) { // Si se le paso por la url un controlador, entonces...
        $objController = $front->loadController($_GET['controller']); // dentro de la variable, almacena el controlador
    } 
    else{ // Sino existe
        $objController = $front->loadController(DEFAULT_CONTROLLER); // pasa el controlador por defecto
    }
    $front->setAction($objController); // Y se lo pasa por parametro a la accion para que se ejecute.
?>