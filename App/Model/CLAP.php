<?php
    class CLAP extends EntidadBase{
        // Atributos
        private $idClap;
        private $codigoClap;
        private $codigoSala;
        private $nombreClap;
        private $rifClap;
        private $parroquia;
        private $emailClap;
        private $tlfClap;
        private $nombreComunidad;
        private $limiteNorteComunidad;
        private $limiteSurComunidad;
        private $limiteEsteComunidad;
        private $limiteOesteComunidad;
        private $nombreConsejoComunal;
        private $rifConsejoComunal;
        private $zonaSilencio;
        private $cantManzaneros;
        private $eje;
        private $revisadoEnlace;
        private $cantViviendas;
        private $cantFamilias;
        private $estado;
        private $idEnlace;
        private $idEmpresa;
        private $table;

        // Constructor 
        public function __construct(){
            $this->table = "clap";
            parent::__construct();
        }
        
        // Getters
        public function getIdClap(){
            return $this->idClap;
        }

        public function getCodigoClap(){
            return $this->codigoClap;
        }

        public function getCodigoSala(){
            return $this->codigoSala;
        }

        public function getNombreClap(){
            return $this->nombreClap;
        }

        public function getRifClap(){
            return $this->rifClap;
        }

        public function getParroquia(){
            return $this->parroquia;
        }

        public function getEmailClap(){
            return $this->emailClap;
        }

        public function getTlfClap(){
            return $this->tlfClap;
        }

        public function getNombreComunidad(){
            return $this->nombreComunidad;
        }

        public function getLimiteNorteComunidad(){
            return $this->limiteNorteComunidad;
        }

        public function getLimiteSurComunidad(){
            return $this->limiteSurComunidad;
        }

        public function getLimiteEsteComunidad(){
            return $this->limiteEsteComunidad;
        }

        public function getLimiteOesteComunidad(){
            return $this->limiteOesteComunidad;
        }

        public function getNombreConsejoComunal(){
            return $this->nombreConsejoComunal;
        }

        public function getRifConsejoComunal(){
            return $this->rifConsejoComunal;
        }

        public function getZonaSilencio(){
            return $this->zonaSilencio;
        }

        public function getCantManzaneros(){
            return $this->cantManzaneros;
        }

        public function getEje(){
            return $this->eje;
        }

        public function getRevisadoEnlace(){
            return $this->revisadoEnlace;
        }

        public function getCantViviendas(){
            return $this->cantViviendas;
        }

        public function getCantFamilias(){
            return $this->cantFamilias;
        }

        public function getEstado(){
            return $this->estado;
        }

        public function getIdEnlace(){
            return $this->idEnlace;
        }

        public function getIdEmpresa(){
            return $this->idEmpresa;
        }

        // Setters
        public function setIdClap($idClap){
            $this->idClap = $idClap;
        }

        public function setCodigoClap($codigoClap){
            $this->codigoClap = $codigoClap;
        }

        public function setCodigoSala($codigoSala){
            $this->codigoSala = $codigoSala;
        }

        public function setNombreClap($nombreClap){
            $this->nombreClap = $nombreClap;
        }

        public function setRifClap($rifClap){
            $this->rifClap = $rifClap;
        }

        public function setParroquia($parroquia){
            $this->parroquia = $parroquia;
        }

        public function setEmailClap($emailClap){
            $this->emailClap = $emailClap;
        }

        public function setTlfClap($tlfClap){
            $this->tlfClap = $tlfClap;
        }

        public function setNombreComunidad($nombreComunidad){
            $this->nombreComunidad = $nombreComunidad;
        }

        public function setLimiteNorteComunidad($limiteNorteComunidad){
            $this->limiteNorteComunidad = $limiteNorteComunidad;
        }

        public function setLimiteSurComunidad($limiteSurComunidad){
            $this->limiteSurComunidad = $limiteSurComunidad;
        }

        public function setLimiteEsteComunidad($limiteEsteComunidad){
            $this->limiteEsteComunidad = $limiteEsteComunidad;
        }

        public function setLimiteOesteComunidad($limiteOesteComunidad){
            $this->limiteOesteComunidad = $limiteOesteComunidad;
        }

        public function setNombreConsejoComunal($nombreConsejoComunal){
            $this->nombreConsejoComunal = $nombreConsejoComunal;
        }

        public function setRifConsejoComunal($rifConsejoComunal){
            $this->rifConsejoComunal = $rifConsejoComunal;
        }

        public function setZonaSilencio($zonaSilencio){
            $this->zonaSilencio = $zonaSilencio;
        }

        public function setCantManzaneros($cantManzaneros){
            $this->cantManzaneros = $cantManzaneros;
        }

        public function setEje($eje){
            $this->eje = $eje;
        }

        public function setRevisadoEnlace($revisadoEnlace){
            $this->revisadoEnlace = $revisadoEnlace;
        }

        public function setCantViviendas($cantViviendas){
            $this->cantViviendas = $cantViviendas;
        }

        public function setCantFamilias($cantFamilias){
            $this->cantFamilias = $cantFamilias;
        }

        public function setEstado($estado){
            $this->estado = $estado;
        }

        public function setIdEnlace($idEnlace){
            $this->idEnlace = $idEnlace;
        }

        public function setIdEmpresa($idEmpresa){
            $this->idEmpresa = $idEmpresa;
        }
        public function insert(){ // Inserta datos en la tabla.
            $query =    "INSERT INTO $this->table
                                (codigoClap,codigoSala,nombreClap,rifClap,parroquia,emailClap,tlfClap,nombreComunidad,
                                limiteNorteComunidad,limiteSurComunidad,limiteEsteComunidad,limiteOesteComunidad,nombreConsejoComunal,rifConsejoComunal,
                                zonaSilencio,cantManzaneros,eje,revisadoEnlace,cantViviendas,cantFamilias,estado,idEnlace,idEmpresa) 
                        VALUES (:codigoClap,:codigoSala,:nombreClap,:rifClap,:parroquia,:emailClap,:tlfClap,:nombreComunidad,
                                :limiteNorteComunidad,:limiteSurComunidad,:limiteEsteComunidad,:limiteOesteComunidad,:nombreConsejoComunal,:rifConsejoComunal,
                                :zonaSilencio,:cantManzaneros,:eje,:revisadoEnlace,:cantViviendas,:cantFamilias,:estado,:idEnlace,:idEmpresa)"; // Consulta SQL.
            $result = $this->DB()->prepare($query); // Prepara la consulta SQl.
            // Asocia los valores a los marcadores.
            $result->bindParam(':codigoClap', $this->codigoClap);
            $result->bindParam(':codigoSala', $this->codigoSala);
            $result->bindParam(':nombreClap', $this->nombreClap);
            $result->bindParam(':rifClap', $this->rifClap);
            $result->bindParam(':parroquia', $this->parroquia);
            $result->bindParam(':emailClap', $this->emailClap);
            $result->bindParam(':tlfClap', $this->tlfClap);
            $result->bindParam(':nombreComunidad', $this->nombreComunidad);
            $result->bindParam(':limiteNorteComunidad', $this->limiteNorteComunidad);
            $result->bindParam(':limiteSurComunidad', $this->limiteSurComunidad);
            $result->bindParam(':limiteEsteComunidad', $this->limiteEsteComunidad);
            $result->bindParam(':limiteOesteComunidad', $this->limiteOesteComunidad);
            $result->bindParam(':nombreConsejoComunal', $this->nombreConsejoComunal);
            $result->bindParam(':rifConsejoComunal', $this->rifConsejoComunal);
            $result->bindParam(':zonaSilencio', $this->zonaSilencio);
            $result->bindParam(':cantManzaneros', $this->cantManzaneros);
            $result->bindParam(':eje', $this->eje);
            $result->bindParam(':revisadoEnlace', $this->revisadoEnlace);
            $result->bindParam(':cantViviendas', $this->cantViviendas);
            $result->bindParam(':cantFamilias', $this->cantFamilias);
            $result->bindParam(':estado', $this->estado);
            $result->bindParam(':idEnlace', $this->idEnlace);
            $result->bindParam(':idEmpresa', $this->idEmpresa);            
            $save = $result->execute(); // Ejecuta la consulta - Retorna true ó false.
            return $save;
        }

        public function update(){ // Actualiza un registro en la tabla.
            $query = "UPDATE $this->table SET 
                        codigoClap = :codigoClap, codigoSala = :codigoSala, nombreClap = :nombreClap,
                        rifClap = :rifClap, parroquia = :parroquia, emailClap = :emailClap, tlfClap = :tlfClap,
                        nombreComunidad = :nombreComunidad, limiteNorteComunidad = :limiteNorteComunidad,
                        limiteSurComunidad = :limiteSurComunidad, limiteEsteComunidad = :limiteEsteComunidad,
                        limiteOesteComunidad = :limiteOesteComunidad, nombreConsejoComunal = :nombreConsejoComunal,
                        rifConsejoComunal = :rifConsejoComunal, zonaSilencio = :zonaSilencio,
                        cantManzaneros = :cantManzaneros, eje = :eje, revisadoEnlace = :revisadoEnlace,
                        cantViviendas = :cantViviendas, cantFamilias = :cantFamilias, estado = :estado,
                        idEmpresa = :idEmpresa WHERE idClap = :idClap"; // Consulta SQL.
            $result = $this->DB()->prepare($query); // Prepara la consulta SQl.
            // Asocia los valores a los marcadores.
            $result->bindParam(':idClap', $this->idClap);
            $result->bindParam(':codigoClap', $this->codigoClap);
            $result->bindParam(':codigoSala', $this->codigoSala);
            $result->bindParam(':nombreClap', $this->nombreClap);
            $result->bindParam(':rifClap', $this->rifClap);
            $result->bindParam(':parroquia', $this->parroquia);
            $result->bindParam(':emailClap', $this->emailClap);
            $result->bindParam(':tlfClap', $this->tlfClap);
            $result->bindParam(':nombreComunidad', $this->nombreComunidad);
            $result->bindParam(':limiteNorteComunidad', $this->limiteNorteComunidad);
            $result->bindParam(':limiteSurComunidad', $this->limiteSurComunidad);
            $result->bindParam(':limiteEsteComunidad', $this->limiteEsteComunidad);
            $result->bindParam(':limiteOesteComunidad', $this->limiteOesteComunidad);
            $result->bindParam(':nombreConsejoComunal', $this->nombreConsejoComunal);
            $result->bindParam(':rifConsejoComunal', $this->rifConsejoComunal);
            $result->bindParam(':zonaSilencio', $this->zonaSilencio);
            $result->bindParam(':cantManzaneros', $this->cantManzaneros);
            $result->bindParam(':eje', $this->eje);
            $result->bindParam(':revisadoEnlace', $this->revisadoEnlace);
            $result->bindParam(':cantViviendas', $this->cantViviendas);
            $result->bindParam(':cantFamilias', $this->cantFamilias);
            $result->bindParam(':estado', $this->estado);
            // $result->bindParam(':idEnlace', $this->idEnlace);
            $result->bindParam(':idEmpresa', $this->idEmpresa);  
            $update = $result->execute(); // Ejecuta la consulta SQL.
            return $update;
        }

        public function delete($id){ // Elimina un registro en la tabla.
            $sql = "DELETE FROM $this->table WHERE idClap = '$id'"; // Consulta SQL
            $query = $this->DB()->query($sql); // Ejecuta la consulta
            return $query; // Y finalmente, lo retorna.
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

        public function countAllRowsByParroquia(){
            $sql = "SELECT * FROM $this->table WHERE parroquia = '$this->parroquia'"; // Consulta SQL
            $query = $this->DB()->query($sql); // Ejecuta la consulta SQL directamente.
            if($query){ // Si se realizó la consulta...
                $rows = $query->rowCount(); // Obtiene el numero de registros.
            }
            else{
                $rows = 0;
            }
            return $rows;
        }

        public function getAll($totalRegisters, $startLimit){ // Obtiene todos los registros de la tabla.
            $sql = "SELECT * FROM $this->table AS c
                        INNER JOIN empresa_distribuidora AS e ON c.idEmpresa = e.idEmpresa 
                        ORDER BY idClap ASC LIMIT $startLimit,$totalRegisters"; // Consulta SQL
            $query = $this->DB()->query($sql); // Realiza la consulta SQL.
            while($row = $query->fetch(PDO::FETCH_OBJ)) { // Recorre un array (tabla) fila por fila.
                $resultset[] = $row; // Llena el array con cada uno de los registros de la tabla.
            }
            return $resultset; // Finalmente retornla el arreglo con los elementos.
        }

        public function getById($id){ // Obtiene un registro por el id. 
            $sql = "SELECT * FROM $this->table AS c 
                        INNER JOIN empresa_distribuidora AS e ON c.idEmpresa = e.idEmpresa
                        INNER JOIN enlace_politico AS ep ON c.idEnlace = ep.idEnlace
                        WHERE idClap = '$id'"; // Consulta SQL
            $query = $this->DB()->query($sql); // Realiza la consulta SQL
            if($row = $query->fetch(PDO::FETCH_OBJ)){ // Si el objeto existe en la tabla
                $register = $row; // Lo almacena en $register
            }
            return $register; // Y finalmente, lo retorna.
        }

        public function getClapsByParroquia($parroquia,$totalRegisters, $startLimit){
            $sql = "SELECT * FROM $this->table AS c 
                        INNER JOIN empresa_distribuidora AS e ON c.idEmpresa = e.idEmpresa
                        WHERE parroquia = '$parroquia'
                        ORDER BY idClap ASC LIMIT $startLimit,$totalRegisters"; // Consulta SQL
            $query = $this->DB()->query($sql); // Realiza la consulta SQL
            while($row = $query->fetch(PDO::FETCH_OBJ)){ // Recorre la tabla fila por fila.
                $resultSet[] = $row; // Almacena los registros en un array
            }
            return $resultSet; // Finalmente retorna los valores.
        }

        public function getAllClapsByParroquia(){
            $sql = "SELECT * FROM $this->table AS c 
                        INNER JOIN empresa_distribuidora AS e ON c.idEmpresa = e.idEmpresa
                        WHERE parroquia = '$this->parroquia'"; // Consulta SQL
            $query = $this->DB()->query($sql); // Realiza la consulta SQL
            if($query){
                if($query->rowCount() != 0){
                    while($row = $query->fetch(PDO::FETCH_OBJ)){ // Recorre la tabla fila por fila.
                        $resultSet[] = $row; // Almacena los registros en un array
                    }
                }
                else{
                    $resultSet = null;
                }
            }
            return $resultSet; // Finalmente retorna los valores.
        }

        public function getByParroquia(){
            $sql = "SELECT * FROM $this->table AS c
                        INNER JOIN empresa_distribuidora AS e ON c.idEmpresa = e.idEmpresa 
                        WHERE parroquia = $this->parroquia"; // Consulta SQL
            $query = $this->DB()->query($sql); // Realiza la consulta SQL.
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

        public function suspenderClap(){
            $sql = "UPDATE $this->table SET estado = 0 WHERE idClap = $this->idClap"; // Consulta SQL
            $query = $this->DB()->prepare($sql); // Prepara la consulta
            $result = $query->execute(); // Ejecuta la consulta.
            return $result;
        }

        public function admitirClap(){
            $sql = "UPDATE $this->table SET estado = 1 WHERE idClap = $this->idClap"; // Consulta SQL
            $query = $this->DB()->prepare($sql); // Prepara la consulta
            $result = $query->execute(); // Ejecuta la consulta.
            return $result;
        }

        public function getFamiliasByClap($id){
            $sql = "SELECT * FROM grupofamiliar 
                        INNER JOIN clap ON clap.idClap = grupoFamiliar.idCLAP 
                        WHERE clap.idClap = $id";
            $query = $this->DB()->query($sql); // Realiza la consulta SQL
            if($query){
                if($query->rowCount() != 0){
                    while($row = $query->fetch(PDO::FETCH_OBJ)){ // Recorre la tabla fila por fila.
                        $resultSet[] = $row; // Almacena los registros en un array
                    }
                }
                else{
                    $resultSet = null;
                }
            }
            return $resultSet; // Finalmente retorna los valores.
        }

        /* -------------------- PRUEBAS -------------------- */
        public function getAll_2(){
            $sql = "SELECT * FROM $this->table AS c 
                        INNER JOIN empresa_distribuidora AS e ON c.idEmpresa = e.idEmpresa 
                        ORDER BY idClap ASC"; // Consulta SQL
            $query = $this->DB()->query($sql); // Realiza la consulta SQL.
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