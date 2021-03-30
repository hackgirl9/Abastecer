<?php
    class Router{ // Se encarga del enrutamiento de las vistas.
        public function url($controller = DEFAULT_CONTROLLER, $action = DEFAULT_ACTION){ // Recibe el controlador y la acción.
            $urlString = "index.php?controller=$controller&action=$action"; // Crea la url.
            return $urlString; // Retorna la url.
        }

        public function setDateDay($date){ // Método que se encarga de sumarle 30 dias a una fecha actual e indicar la próxima atencion a una comunidad.
            $newDate = DateTime::createFromFormat('d/m/Y',$date); // Crea la fecha desde un formato.
            $newDate = $newDate->format('Y/m/d'); // Transforma la fecha al nuevo formato.
            $nextDate = strtotime(('+30 day'),strtotime($newDate)); // Calcula la fecha agregando 30 dias.
            $dateFormat = date('d/m/Y',$nextDate); // Crea la proxima fecha con el formato.
            return $dateFormat;
        }


    }
?>