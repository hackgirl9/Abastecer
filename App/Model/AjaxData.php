<?php
    class AjaxData extends EntidadBase{
        // Atributos
        private $parroquia;
        private $fechaInicial;
        private $fechaLimite;

        public function __construct(){
            parent::__construct();
        }

        // Getters & Setters
        public function getParroquia(){
            return $this->parroquia;
        }

        public function getFechaInicial(){
            return $this->fechaInicial;
        }

        public function getFechaLimite(){
            return $this->fechaLimite;
        }

        public function setParroquia($parroquia){
            $this->parroquia = $parroquia;
        }
        
        public function setFechaInicial($fechaInicial){
            $this->fechaInicial = $fechaInicial;
        }

        public function setFechaLimite($fechaLimite){
            $this->fechaLimite = $fechaLimite;
        }

        public function getClapsByParroquia(){
            $sql = "SELECT idClap,nombreClap FROM clap WHERE parroquia ='$this->parroquia'";
            $query = $this->DB()->query($sql);
            if($query->rowCount() >= 1){
                while($row = $query->fetch(PDO::FETCH_OBJ)){
                    $resultSet[] = $row;
                }
            }
            else{
                $resultSet[] = null;
            }
            return $resultSet;
        }
    }
?>