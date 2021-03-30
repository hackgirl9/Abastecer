<?php
    class FrontController{
        public function loadController($controller){ // Metodo que se encarga de cargar un controlador.
            $controller = ucwords($controller)."Controller"; // Transforma en Mayuscula la inicial de la palabra.
            $filePathController = "Controller/".$controller.".php"; // Obtiene la ruta del controlador.
            if(!is_file($filePathController)){ // Si no existe la ruta del archivo.
                $filePathController = "Controller/".ucwords(DEFAULT_CONTROLLER)."Controller.php"; // Crea la ruta para el controlador.
            }
            require_once($filePathController); // Incluye el archivo
            $objController = new $controller(); // // Instancia el controlador.
            return $objController; // Retorna el objeto del controlador.
        }

        public function loadAction($objController,$action){ // Carga la accion. Recibe el objeto del controlador y la acción.
            $_action = $action; // Crea la variable para la acción
            $objController->$_action(); // Utiliza la acción.
        }

        public function setAction($objController){ // Establece el la accion del controlador
            if(isset($_GET['action']) && method_exists($objController, $_GET['action'])){ // Si se ha definido por la url la acción y existe la accion de ese controlador.
                $this->loadAction($objController, $_GET['action']); // Entonces, carga la acción del controlador especificado.
            } 
            else{ // Sino...
                $this->loadAction($objController, DEFAULT_ACTION); // Carga la accion por defecto del controlador.
            }
        }

        public function getFriendlyURL(){ // Funcion que se encaraga de crear una url amigable

        }

        
    }
?>