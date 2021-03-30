<?php
    class Cargo extends EntidadBase{
        // Atributos
        private $idCargo;
        private $nombreCargo;
        private $table;

        // Métodos
        public function __construct(){
            $this->table = "cargo_clap";
            parent::__construct();
        }

        // Getters & Setters
        public function getIdCargo(){
            return $this->idCargo;
        }

        public function getNombreCargo(){
            return $this->nombreCargo;
        }

        public function setIdCargo($idCargo){
            $this->idCargo = $idCargo;
        }

        public function setNombreCargo($nombreCargo){
            $this->nombreCargo = $nombreCargo;
        }

        public function insert(){ // Inserta datos en la tabla.
            $query = "INSERT INTO $this->table(cargoRol) VALUES (:cargoRol)"; // Consulta SQL
            $result = $this->DB()->prepare($query); // Prepara la consulta SQL
            $result->bindParam(':cargoRol',$this->nombreCargo); 
            $save = $result->execute(); // Ejecuta la consulta SQL.
            return $save; // Retorna la consulta.
        }

        public function getAll($totalRegisters,$startLimit){ // Obtiene los registros de una tabla.
            $sql = "SELECT * FROM $this->table ORDER BY idCargo ASC LIMIT $startLimit,$totalRegisters";
            $query = $this->DB()->query($sql); // Consulta SQL.
            if($query){ // Evalua la cansulta
                if($query->rowCount() != 0) { // Si existe al menos un registro...
                    while($row = $query->fetch(PDO::FETCH_OBJ)) { // Recorre un array (tabla) fila por fila.
                        $resultset[] = $row; // Llena el array con cada uno de los registros de la tabla.
                    }
                }
                else{ // Sino...
                    $resultset = null; // Almacena null
                }
            }
            return $resultset; // Finalmente retornla el arreglo con los elementos.
        }

        public function getAllCargos(){
            $sql = "SELECT * FROM $this->table";
            $query = $this->DB()->query($sql);
            if($query){ // Evalua la cansulta
                if($query->rowCount() != 0) { // Si existe al menos un registro...
                    while($row = $query->fetch(PDO::FETCH_OBJ)) { // Recorre un array (tabla) fila por fila.
                        $resultset[] = $row; // Llena el array con cada uno de los registros de la tabla.
                    }
                }
                else{ // Sino...
                    $resultset[] = null; // Almacena null
                }
            }
            return $resultset; // Finalmente retornla el arreglo con los elementos.
        }

        public function countAllRows(){ // Cuenta la cantidad de registros de una tabla.
            $sql = "SELECT * FROM $this->table"; // Consulta SQL
            $query = $this->DB()->query($sql); // Ejecuta la consulta SQL directamente.
            if($query){ // Si se realizó la consulta...
                $rows = $query->rowCount(); // Obtiene el numero de registros.
            }
            else{
                $rows = 0;
            }
            return $rows;
        }

        /* ------------------ COPIA Y PRUEBAS ----------------------- */

        public function getAll_2(){
            $sql = "SELECT * FROM $this->table ORDER BY idCargo ASC";
            $query = $this->DB()->query($sql); // Consulta SQL.
            if($query){ // Evalua la cansulta
                if($query->rowCount() != 0) { // Si existe al menos un registro...
                    while($row = $query->fetch(PDO::FETCH_OBJ)) { // Recorre un array (tabla) fila por fila.
                        $resultset[] = $row; // Llena el array con cada uno de los registros de la tabla.
                    }
                }
                else{ // Sino...
                    $resultset = null; // Almacena null
                }
            }
            return $resultset; // Finalmente retornla el arreglo con los elementos.
        }
    }
?>