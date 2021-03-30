<?php
    require_once "BaseModel.php"; // Incluye la interface
    class EntidadBase implements BaseModel{
        // Atributos de la clase.
        private $connect;
        private $database;

        // Métodos de la clase.
        public function __construct(){ // Constuctor de la clase
            require_once "Connect.php"; // Incluye el archivo de la conexion.
            $this->connect = new Connect(); // Intancia del objeto Conexion.
            $this->database = $this->connect->connection(); // Objeto conecta con la base de datos.
        }

        public function getConnect(){ // Retorna la conexion con la base de datos.
            return $this->connect;
        }

        public function DB(){ // Retorna la base de datos.
            return $this->database;
        }

        public function insert(){
            
        }

        public function update(){

        }

        public function delete($id){

        }

        public function getAll($numRegistros,$inicioLimit){ // Retorna todos los elementos de la tabla
            
        }
    }
?>