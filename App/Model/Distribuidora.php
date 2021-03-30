<?php
    class Distribuidora extends EntidadBase{
        // Atributos
        private $idEmpresa;
        private $nombreEmpresa;
        private $rifEmpresa;
        private $emailEmpresa;
        private $tlfEmpresa;
        private $table;

        // Métodos
        public function __construct(){
            $this->table = "empresa_distribuidora"; 
            parent::__construct();
        }

        // Getters & Setters
        public function getIdEmpresa(){
            return $this->idEmpresa;
        }

        public function getNombreEmpresa(){
            return $this->nombreEmpresa;
        }

        public function getRifEmpresa(){
            return $this->rifEmpresa;
        }

        public function getEmailEmpresa(){
            return $this->emailEmpresa;
        }

        public function getTlfEmpresa(){
            return $this->tlfEmpresa;
        }

        public function setIdEmpresa($idEmpresa){
            $this->idEmpresa = $idEmpresa;
        }
        
        public function setNombreEmpresa($nombreEmpresa){
            $this->nombreEmpresa = $nombreEmpresa;
        }

        public function setRifEmpresa($rifEmpresa){
            $this->rifEmpresa =$rifEmpresa;
        }

        public function setEmailEmpresa($emailEmpresa){
            $this->emailEmpresa = $emailEmpresa;
        }

        public function setTlfEmpresa($tlfEmpresa){
            $this->tlfEmpresa = $tlfEmpresa;
        }

        public function insert(){ // Inserta datos en la tabla.
            $query =    "INSERT INTO $this->table(nombreEmpresa,rifEmpresa,emailEmpresa,tlfEmpresa) 
                        VALUES (:nombreEmpresa,:rifEmpresa,:emailEmpresa,:tlfEmpresa)"; // Consulta SQL
            $result = $this->DB()->prepare($query); //Prepara la consulta SQL.
            // Asocia los valores a los marcadores
            $result->bindParam(':nombreEmpresa',$this->nombreEmpresa);
            $result->bindParam(':rifEmpresa',$this->rifEmpresa);
            $result->bindParam(':emailEmpresa',$this->emailEmpresa);
            $result->bindParam(':tlfEmpresa',$this->tlfEmpresa);
            $save = $result->execute(); // Ejecuta la consulta - Retorna true ó false.
            return $save;
                        
        }

        public function delete($id){ // Elimina un registro de la tabla
            $query = $this->DB()->query("DELETE FROM $this->table WHERE idEmpresa = '$id'"); // Consulta SQL.
            return $query; // Retorna la operacion.
        }

        public function getAll($totalRegisters,$startLimit){ // Obtiene los registros de la tabla.
            $query = $this->DB()->prepare("SELECT * FROM $this->table ORDER BY idEmpresa ASC LIMIT $startLimit,$totalRegisters"); // Consulta SQL.
            $query->execute();
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

        public function getAllEmpresas(){
            $sql = "SELECT idEmpresa,nombreEmpresa FROM $this->table";
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

        /* ----------------------- PRUEBAS -------------------------- */
        public function getAll_2(){
            $query = $this->DB()->prepare("SELECT * FROM $this->table ORDER BY idEmpresa ASC"); // Consulta SQL.
            $query->execute();
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