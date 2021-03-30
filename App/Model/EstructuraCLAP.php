<?php
    class EstructuraCLAP extends EntidadBase{
        // Atributos 
        private $idEstructura;
        private $idCargo;
        private $idClap;
        private $idIntegrante;
        private $statusRol;
        private $fechaEleccion;
        private $table;
        
        // Métodos
        public function __construct(){ // Constructor de la clase.
            $this->table = "rol_clap";
            parent::__construct();
        }
        
        // Getters & Setters
        public function getIdEstructura(){
            return $this->idEstructura;
        }
        
        public function getIdCargo(){
            return $this->idCargo;
        }

        public function getIdClap(){
            return $this->idClap;
        }
        
        public function getIdIntegrante(){
            return $this->idIntegrante;
        }

        public function getFechaEleccion(){
            return $this->fechaEleccion;
        }
        
        public function getStatusRol(){
            return $this->statusRol;
        }

        public function setIdEstructura($idEstructura){
            $this->idEstructura = $idEstructura;
        }

        public function setIdCargo($idCargo){
            $this->idCargo = $idCargo;
        }
        
        public function setIdClap($idClap){
            $this->idClap = $idClap;
        }

        public function setIdIntegrante($idIntegrante){
            $this->idIntegrante = $idIntegrante;
        }

        public function setFechaEleccion($fechaEleccion){
            $this->fechaEleccion = $fechaEleccion;
        }

        public function setStatusRol($statusRol){
            $this->statusRol = $statusRol;
        }

        public function insert(){
            $query = "INSERT INTO $this->table 
                    (statusRol,fechaEleccion,idCargo,idIntegrante,idClap) 
                    VALUES (:statusRol,:fechaEleccion,:idCargo,:idIntegrante,:idClap)"; // Consulta SQL
            $result = $this->DB()->prepare($query); // Prepara la consulta.
            $result->bindParam(":statusRol",$this->statusRol);
            $result->bindParam(":fechaEleccion",$this->fechaEleccion);
            $result->bindParam(":idCargo",$this->idCargo);
            $result->bindParam(":idIntegrante",$this->idIntegrante);
            $result->bindParam(":idClap",$this->idClap);
            $save = $result->execute();
            return $save; 
        }

        public function getClapsByParroquia(){
            $sql = "SELECT idClap, nombreClap FROM clap WHERE parroquia = '$this->parroquia'"; // Consulta SQL
            $query = $this->DB()->query($sql);
            if($query){
                if($query->rowCount() != 0){
                    while($row = $query->fetch(PDO::FETCH_OBJ)){
                        $resultSet[] = $row;
                    }
                }
                else{
                    $resultSet = null;
                }
            }
            return $resultSet;
        }

        public function getMiembrosByClap(){
            $sql = "SELECT miembrofamilia.nombreIntegrante, miembrofamilia.apellidoIntegrante,
                    cargo_clap.cargoRol, clap.nombreClap, rol_clap.statusRol, rol_clap.idRol 
                    FROM rol_clap 
                        INNER JOIN miembrofamilia ON rol_clap.idIntegrante = miembrofamilia.idIntegrante 
	                    INNER JOIN grupofamiliar ON grupofamiliar.idFamilia = miembrofamilia.idFamilia 
	                    INNER JOIN clap ON grupofamiliar.idCLAP = clap.idClap 
	                    INNER JOIN cargo_clap ON cargo_clap.idCargo = rol_clap.idCargo 
                        WHERE clap.idClap = $this->idClap";
            $query = $this->DB()->query($sql);
            if($query){
                if($query->rowCount() != 0){
                    while($row = $query->fetch(PDO::FETCH_OBJ)){
                        $resultSet[] = $row;
                    }
                }
                else{
                    $resultSet = null;
                }
            }
            return $resultSet;
        }

        public function delete($id){
            $sql = "DELETE FROM $this->table WHERE idRol = $id";
            $query = $this->DB()->query($sql); // Ejecuta la consulta
            return $query; // Y finalmente, lo retorna.
        }
    }
?>