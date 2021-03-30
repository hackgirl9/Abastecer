<?php
    class Enlace extends EntidadBase{
        // Atributos
        private $idEnlace;
        private $nombreEnlace;
        private $apelldoEnlace;
        private $parroquiaEncargado;
        private $table;

        // Métodos
        public function __construct(){
            $this->table = "enlace_politico"; 
            parent::__construct();
        }

        // Getters & Setters
        public function getIdEnlace(){
            return $this->idEnlace;
        }

        public function getNombreEnlace(){
            return $this->nombreEnlace;
        }

        public function getApellidoEnlace(){
            return $this->apellidoEnlace;
        }

        public function getParroquiaEncargado(){
            return $this->parroquiaEncargado;
        }

        public function setIdEnlace($idEnlace){
            $this->idEnlace = $idEnlace;
        }
        
        public function setNombreEnlace($nombreEnlace){
            $this->nombreEnlace = $nombreEnlace;
        }

        public function setApellidoEnlace($apellidoEnlace){
            $this->apellidoEnlace =$apellidoEnlace;
        }

        public function setParroquiaEncargado($parroquiaEncargado){
            $this->parroquiaEncargado = $parroquiaEncargado;
        }

        public function insert(){ // Inserta datos en la tabla.
            $query =    "INSERT INTO $this->table(nombreEnlace,apellidoEnlace,parroquiaEncargado) 
                        VALUES (:nombreEnlace,:apellidoEnlace,:parroquiaEncargado)"; // Consulta SQL
            $result = $this->DB()->prepare($query); //Prepara la consulta SQL.
            // Asocia los valores a los marcadores.
            $result->bindParam(':nombreEnlace',$this->nombreEnlace);
            $result->bindParam(':apellidoEnlace',$this->apellidoEnlace);
            $result->bindParam(':parroquiaEncargado',$this->parroquiaEncargado);
            $save = $result->execute(); // Ejecuta la consulta - Retorna true ó false.
            return $save;
                        
        }

        public function delete($id){ // Elimina un registro de la tabla.
            $query = $this->DB()->query("DELETE FROM $this->table WHERE idEnlace = '$id'"); // Consulta SQL.
            return $query; // Retorna la operacion.
        }

        public function getAll($totalRegisters,$startLimit){ // Obtiene los registros de la tabla.
            $query = $this->DB()->query("SELECT * FROM $this->table ORDER BY idEnlace ASC LIMIT $startLimit,$totalRegisters"); // Consulta SQL.
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

        public function getEnlaceByParroquia(){
            // $sql = "SELECT idEnlace FROM '$this->table' WHERE parroquiaEncargado = 'Juan de Villegas'";
            $sql = "SELECT idEnlace FROM $this->table WHERE parroquiaEncargado = '$this->parroquiaEncargado'";
            $query = $this->DB()->query($sql); // Realiza la consulta SQL
            if($query){
                if($query->rowCount() != 0){
                    while($row = $query->fetch(PDO::FETCH_OBJ)) { // Si el objeto existe en la tabla
                        $register = $row; // Lo almacena en $register
                    }
                }
                else{
                    $register = null;
                }
            }
            return $register; // Y finalmente, lo retorna.
        }
        
        
        /* ------------------- PRUEBAS --------------------- */
        
        public function getAll_2(){
            $query = $this->DB()->query("SELECT * FROM $this->table ORDER BY idEnlace ASC"); // Consulta SQL.
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