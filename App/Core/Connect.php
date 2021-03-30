<?php
    class Connect{
        // Atributos de la clase.
        private $driver;
        private $host;
        private $user;
        private $password;
        private $database;
        private $charset;

        // Métodos de la clase.
        public function __construct(){ // Constructor de la clase.
            $config = require_once 'Database/mysql.php';
            $this->driver = $config['driver'];
            $this->host = $config['host'];
            $this->user = $config['user'];
            $this->password = $config['password'];
            $this->database = $config['database'];
            $this->charset = $config['charset']; 
        }

        public function connection(){ // Método que conecta con la base de datos.
            try{ // Intenta la conexion.
                // PDO('mysql:host=localhost;dbname=abastecer','usuario','password');
                $connect = new PDO($this->driver.':host='.$this->host.';dbname='.$this->database,$this->user,$this->password); // Instancia de PDO (Base de datos).
                $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); // Atributos de la conexion (Manejo de Errores).
                $connect->exec('SET CHARACTER SET '.$this->charset); // Establece juego de caracteres de la base de datos.
            }
            catch(PDOException $err){ // Captura la excepción.
                echo "Linea de error: " . $err->getLine() . "<br>";
                echo "Código de error: " . $err->getCode() . "<br>";
                die("Error: " . $err->getMessage());
            }
            return $connect; // Finalmente, retorna la conexion.
        }
    }
?>