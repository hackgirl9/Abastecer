<?php
    class Integrante extends EntidadBase{
        // Atributos
        private $idIntegrante;
        private $cedulaIntegrante;
        private $nombreIntegrante;
        private $apellidoIntegrante;
        private $sexoIntegrante;
        private $fechaNacimiento;
        private $telefonoIntegrante;
        private $emailIntegrante;
        private $rolPersona;
        private $codigoCarnetPatria;
        private $serialCarnetPatria;
        private $manzanero;
        private $idFamilia;
        private $table;

        // Métodos
        public function __construct(){
            $this->table = "miembrofamilia";
            parent::__construct();
        }

        // Getter
        public function getIdIntegrante(){
            return $this->idIntegrante;
        }

        public function getCedulaIntegrante(){
            return $this->cedulaIntegrante;
        }

        public function getNombreIntegrante(){
            return $this->nombreIntegrante;
        }

        public function getApellidoIntegrante(){
            return $this->apellidoIntegrante;
        }

        public function getSexoIntegrante(){
            return $this->sexoIntegrante;
        }

        public function getFechaNacimiento(){
            return $this->fechaNacimiento;
        }

        public function getTelefonoIntegrante(){
            return $this->telefonoIntegrante;
        }

        public function getEmailIntegrante(){
            return $this->emailIntegrante;
        }

        public function getRolPersona(){
            return $this->rolPersona;
        }

        public function getCodigoCarnetPatria(){
            return $this->codigoCarnetPatria;
        }

        public function getSerialCarnetPatria(){
            return $this->serialCarnetPatria;
        }

        public function getManzanero(){
            return $this->manzanero;
        }

        public function getIdFamilia(){
            return $this->idFamilia;
        }

        // Setter
        public function setIdIntegrante($idIntegrante){
            $this->idIntegrante = $idIntegrante;
        }

        public function setCedulaIntegrante($cedulaIntegrante){
            $this->cedulaIntegrante = $cedulaIntegrante;
        }

        public function setNombreIntegrante($nombreIntegrante){
            $this->nombreIntegrante = $nombreIntegrante;
        }

        public function setApellidoIntegrante($apellidoIntegrante){
            $this->apellidoIntegrante = $apellidoIntegrante;
        }

        public function setSexoIntegrante($sexoIntegrante){
            $this->sexoIntegrante = $sexoIntegrante;
        }

        public function setFechaNacimiento($fechaNacimiento){
            $this->fechaNacimiento = $fechaNacimiento;
        }

        public function setTelefonoIntegrante($telefonoIntegrante){
            $this->telefonoIntegrante = $telefonoIntegrante;
        }

        public function setEmailIntegrante($emailIntegrante){
            $this->emailIntegrante = $emailIntegrante;
        }

        public function setRolPersona($rolPersona){
            $this->rolPersona = $rolPersona;
        }

        public function setCodigoCarnetPatria($codigoCarnetPatria){
            $this->codigoCarnetPatria = $codigoCarnetPatria;
        }

        public function setSerialCarnetPatria($serialCarnetPatria){
            $this->serialCarnetPatria = $serialCarnetPatria;
        }

        public function setManzanero($manzanero){
            $this->manzanero = $manzanero;
        }

        public function setIdFamilia($idFamilia){
            $this->idFamilia = $idFamilia;
        }

        public function getIntegranteByCedula(){
            $sql = "SELECT  miembrofamilia.idIntegrante,
                            miembrofamilia.nombreIntegrante, 
                            miembrofamilia.apellidoIntegrante, 
                            miembrofamilia.cedulaIntegrante,
                            miembrofamilia.telefonoIntegrante  
                    FROM miembrofamilia 
                        INNER JOIN grupofamiliar ON 
                            miembrofamilia.idFamilia = grupofamiliar.idFamilia
                        INNER JOIN clap ON 
                            grupofamiliar.idCLAP = clap.idClap WHERE 
                            clap.idClap = (SELECT grupoFamiliar.idCLAP FROM grupofamiliar
                        INNER JOIN  miembrofamilia ON 
                            grupofamiliar.idFamilia = miembrofamilia.idFamilia WHERE 
                            miembrofamilia.cedulaIntegrante = '$this->cedulaIntegrante') AND 
                            miembrofamilia.cedulaIntegrante = '$this->cedulaIntegrante'
                    ";
            $query = $this->DB()->query($sql);
            if($query){ // Evalua la cansulta
                if($query->rowCount() != 0) { // Si existe al menos un registro...
                    while($row = $query->fetch(PDO::FETCH_OBJ)) { // Recorre un array (tabla) fila por fila.
                        $resultset = $row; // Llena el array con cada uno de los registros de la tabla.
                    }
                }
                else{ // Sino...
                    $resultset = null; // Almacena null
                }
            }
            return $resultset; // Finalmente retornla el arreglo con los elementos.
        }

        public function insert()
    {
        $query = "INSERT INTO 
            $this->tableIntegrante(cedulaIntegrante, 
                                   nombreIntegrante, 
                                   apellidoIntegrante, 
                                   sexoIntegrante, 
                                   fechaNacimiento, 
                                   telefonoIntegrante, 
                                   emailIntegrante, 
                                   rolPersona, 
                                   codigoCarnetPatria, 
                                   serialCarnetPatria, 
                                   manzanero, 
                                   idFamilia) 
                    VALUES (:cedulaIntegrante, 
                            :nombreIntegrante, 
                            :apellidoIntegrante, 
                            :sexoIntegrante, 
                            :fechaNacimiento, 
                            :telefonoIntegrante, 
                            :emailIntegrante, 
                            :rolPersona, 
                            :codigoCarnetPatria, 
                            :serialCarnetPatria, 
                            :manzanero, 
                            :idFamilia)"; // Consulta SQL

        $result = $this->DB()->prepare($query); // Prepara la consulta SQL.
            // Limpia los parametros

        $result->bindParam(':cedulaIntegrante', $this->cedulaIntegrante);
        $result->bindParam(':nombreIntegrante', $this->nombreIntegrante);
        $result->bindParam(':apellidoIntegrante', $this->apellidoIntegrante);
        $result->bindParam(':sexoIntegrante', $this->sexoIntegrante);
        $result->bindParam(':fechaNacimiento', $this->nacimientoIntegrante);
        $result->bindParam(':telefonoIntegrante', $this->telefonoIntegrante);
        $result->bindParam(':emailIntegrante', $this->emailIntegrante);
        $result->bindParam(':rolPersona', $this->rolIntegrante);
        $result->bindParam(':codigoCarnetPatria', $this->codigoIntegrante);
        $result->bindParam(':serialCarnetPatria', $this->serialIntegrante);
        $result->bindParam(':manzanero', $this->manzanero);
        $result->bindParam(':idFamilia', $this->familia);
        
        $save = $result->execute(); // Ejecuta la consulta - Retorna true ó false.
        return $save;

    }

    public function update()
    {
      $query =    "UPDATE $this->tableIntegrante SET 
                            cedulaIntegrante = :cedulaIntegrante, 
                            nombreIntegrante = :nombreIntegrante, 
                            apellidoIntegrante = :apellidoIntegrante, 
                            sexoIntegrante = :sexoIntegrante, 
                            fechaNacimiento = :fechaNacimiento, 
                            telefonoIntegrante = :telefonoIntegrante,
                            emailIntegrante = :emailIntegrante, 
                            rolPersona = :rolPersona, 
                            codigoCarnetPatria = :codigoCarnetPatria, 
                            serialCarnetPatria = :serialCarnetPatria, 
                            manzanero = :manzanero,
                            idFamilia = :idFamilia
                         
                        WHERE idIntegrante = $this->idIntegrante
                        "; // Consulta SQL
            $result = $this->DB()->prepare($query); // Prepara la consulta SQL.
            // Limpia los parametros
            $result->bindParam(':cedulaIntegrante', $this->cedulaIntegrante);
            $result->bindParam(':nombreIntegrante', $this->nombreIntegrante);
            $result->bindParam(':apellidoIntegrante', $this->apellidoIntegrante);
            $result->bindParam(':sexoIntegrante', $this->sexoIntegrante);
            $result->bindParam(':fechaNacimiento', $this->nacimientoIntegrante);
            $result->bindParam(':telefonoIntegrante', $this->telefonoIntegrante);
            $result->bindParam(':emailIntegrante', $this->emailIntegrante);
            $result->bindParam(':rolPersona', $this->rolIntegrante);
            $result->bindParam(':codigoCarnetPatria', $this->codigoIntegrante);
            $result->bindParam(':serialCarnetPatria', $this->serialIntegrante);
            $result->bindParam(':manzanero', $this->manzanero);
            $result->bindParam(':idFamilia', $this->familia);
        
            $save = $result->execute(); // Ejecuta la consulta - Retorna true ó false.
            return $save;
    }

    public function delete($id)
    {
        $sql=$this->DB()->query("DELETE FROM $this->tableIntegrante WHERE idIntegrante ='$id'");
            return $sql;
    }

    public function getById($id){
            $query = $this->DB()->query("SELECT miembrofamilia.idIntegrante,
                                                miembrofamilia.cedulaIntegrante,
                                                miembrofamilia.nombreIntegrante,
                                                miembrofamilia.apellidoIntegrante,
                                                miembrofamilia.sexoIntegrante,
                                                miembrofamilia.fechaNacimiento,
                                                miembrofamilia.telefonoIntegrante,
                                                miembrofamilia.emailIntegrante,
                                                miembrofamilia.rolPersona,
                                                miembrofamilia.manzanero,
                                                miembrofamilia.codigoCarnetPatria,
                                                miembrofamilia.serialCarnetPatria,
                                                miembrofamilia.manzanero,
                                                grupofamiliar.idFamilia,
                                                grupofamiliar.grupoFamiliar 
                                        FROM miembrofamilia INNER JOIN grupofamiliar on miembrofamilia.idFamilia = grupofamiliar.idFamilia  WHERE miembrofamilia.idIntegrante='$id'"); // Consulta SQL

        if($query)// Evalua la cansulta
            { 
                if($query->rowCount() != 0)// Si existe registro
                { 
                    while($row = $query->fetch(PDO::FETCH_OBJ)) // Recorre un array, fila por fila.
                    { 
                        $resultado[] = $row;  // Llena el array con los registros
                    }
                }
                else{ // 
                    $resultado = NULL; 
                }
            }
            return $resultado; // Retorna el arreglo o Null
    }

     //Método que accede a la última familia registrada
        public function ultimaFamilia(){
        $resul= $this->DB()->query("SELECT idFamilia FROM grupofamiliar ORDER BY idFamilia DESC LIMIT 1");
            if($row = $resul->fetch(PDO::FETCH_OBJ)){ 
                    $resulset = $row; 
                }
                return $resulset; 
        }



        public function compruebaCedula()
        {
            $band=true;

            $resul= $this->DB()->query ("SELECT * FROM miembrofamilia WHERE cedulaIntegrante = $this->cedulaIntegrante");
                if($resul->rowCount() >=1){

                    $band = false;
                }

            return $band;
        }
    }
?>