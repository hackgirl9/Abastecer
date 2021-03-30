<?php
    class getCLAP extends  EntidadBase {
        private $parroquia;
        private $table;


        public function __construct(){
            parent::__construct();
            $this->table="clap";
        }


        public function getParroquia(){
            return $this->parroquia;
        }
        public function setParroquia($parroquia){
            $this->parroquia=$parroquia;
        }


        public function getAllClapById(){
        $sql="SELECT idClap,nombreClap FROM $this->table WHERE parroquia='$this->parroquia'";

        $resultado=$this->DB()->query($sql);

        if($resultado->rowCount()>=1){
            while($row = $resultado->fetch(PDO::FETCH_OBJ)){ // Recorre un array (tabla) fila por fila.
                $resultset[] = $row;
            }
        }else{

            $resultset[]=null;
        }

        return $resultset;
        }
    }


?>