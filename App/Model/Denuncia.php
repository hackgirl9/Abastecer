<?php
    class Denuncia extends EntidadBase{
        private $IdDenuncia,$nControl,$FechaDenuncia, $Observacion,$cedulaIntegrante,$StatusDenuncia,$IdIntegrante,$table,$table1;

        public function __construct(){
            $this->table = "denuncias";
            $this->table1="miembrofamilia";
            parent::__construct();
        }

        //GETTER DEL MODULO
        public function getIdDenuncia(){
            return $this->IdDenuncia;
        }
        
        public function getnControl(){
            return $this->nControl;
        }

        public function getFechaDenuncia(){
            return $this->FechaDenuncia;
        }

        public function getObservacion(){
            return $this->Observacion;
        }

        public function getStatusDenuncia(){
            return $this->sStatusDenuncia;
        }
        
        public function getIdIntegrante(){
            return $this->IdIntegrante;
        }

        public function getCedulaIntegrante(){
            return $this->cedulaIntegrante;
        }
    // SETTER DEL MODULO
    // 
        public function setCedulaIntegrante($cedulaIntegrante){
            $this->cedulaIntegrante=$cedulaIntegrante;
        }

        public function setIdDenuncia($IdDenuncia){
            $this->IdDenuncia=$IdDenuncia;
        }

        public function setnControl($nControl){
            $this->nControl=$nControl;
        }

        public function setFechaDenuncia($FechaDenuncia){
            $this->FechaDenuncia=$FechaDenuncia;
        }

        public function setFechaDenuncia2($FechaDenuncia2){
            $this->FechaDenuncia2=$FechaDenuncia2;
        }

        public function setObservacion($Observacion){
            $this->Observacion=$Observacion;
        }

        public function setStatusDenuncia($StatusDenuncia){
            $this->StatusDenuncia=$StatusDenuncia;
        }

        public function setIdintegrante($IdIntegrante){
            $this->Idintegrante=$IdIntegrante;
        }

        public function getID(){
        	            
            $sql="SELECT * from miembrofamilia INNER JOIN grupofamiliar on miembrofamilia.idFamilia=grupofamiliar.idFamilia INNER JOIN clap on grupofamiliar.idCLAP=CLAP.idCLAP WHERE cedulaIntegrante = $this->cedulaIntegrante";
            $query = $this->DB()->query($sql);
            if($row = $query->fetch(PDO::FETCH_OBJ)){ // Si el objeto existe en la tabla
                $register[]= $row; // Lo almacena en $register
            }

            return $register; // Finalmente retornla el arreglo con los elementos.
        }

        public function insert(){

           $sql = "INSERT INTO 
                        $this->table(nControl,fechaDenuncia,motivo,statusDenuncia,idIntegrante) 
                        VALUES (
                            :nControl,:fechaDenuncia,:motivo,:statusDenuncia,:idIntegrante
                        )"; // Consulta SQL
            $result = $this->DB()->prepare($sql); // Prepara la consulta SQL.
            // Limpia los parametros

            $result->bindParam(":nControl", $this->nControl);
            $result->bindParam(":fechaDenuncia",$this->FechaDenuncia);
            $result->bindParam(":motivo",$this->Observacion);
            $result->bindParam(":statusDenuncia",$this->StatusDenuncia);
            $result->bindParam(":idIntegrante",$this->Idintegrante);

        	$save = $result->execute(); // Ejecuta la consulta - Retorna true ó false.*/
        	return $save;
    	}


        public function  countFilasAll(){
            //Retorna el numero de filas que tiene la tabla
            $sql="SELECT DISTINCT denuncias.idDenuncia,DATE_FORMAT(denuncias.fechaDenuncia,'%d/%m/%Y') AS fechaDenuncia, denuncias.nControl, denuncias.statusDenuncia,miembrofamilia.cedulaIntegrante FROM denuncias INNER JOIN miembrofamilia on denuncias.idIntegrante=miembrofamilia.idIntegrante";

            $result=$this->DB()->query($sql);
            /*En caso tal de que la consultas ocurra un error retorno 0 para que mi controlador lo iguale  a null*/
            if($result) {
                $numFila=$result->rowCount();
            }else{
                $numFila=0;
            }
            return $numFila;
        }

        public function countNcontrol($nOficio){
            //Retorna el numero de filas que tiene la tabla
            $sql="SELECT DISTINCT denuncias.nControl FROM denuncias WHERE nControl='$nOficio'";

            $result=$this->DB()->prepare($sql);

            $save=$result->execute();
            /*En caso tal de que la consultas ocurra un error retorno 0 para que mi controlador lo iguale  a null*/
         
            return $save;
        }


        public function countFilasByFecha($desde,$hasta){
            $sql="SELECT DISTINCT denuncias.idDenuncia,DATE_FORMAT(denuncias.fechaDenuncia,'%d/%m/%Y') AS fechaDenuncia, denuncias.nControl, denuncias.statusDenuncia,miembrofamilia.cedulaIntegrante FROM denuncias INNER JOIN miembrofamilia on denuncias.idIntegrante=miembrofamilia.idIntegrante WHERE fechaDenuncia BETWEEN :desde AND :hasta";
            $result=$this->DB()->prepare($sql);

            $result->bindParam(":desde",$desde);
            $result->bindParam(":hasta",$hasta);

            $result->execute();

            if($result) {
            $numFilas=$result->rowCount();
            }else{
                $numFilas=0;
            }

            return $numFilas;
        }



        public function getAllByFechaDenuncia($desde,$hasta,$numRegistros,$inicioLimit){
            $sql="SELECT DISTINCT denuncias.idDenuncia,DATE_FORMAT(denuncias.fechaDenuncia,'%d/%m/%Y') AS fechaDenuncia, denuncias.nControl, denuncias.statusDenuncia,miembrofamilia.cedulaIntegrante FROM denuncias INNER JOIN miembrofamilia on denuncias.idIntegrante=miembrofamilia.idIntegrante WHERE fechaDenuncia BETWEEN :desde AND :hasta LIMIT $inicioLimit,$numRegistros";
            $resultado=$this->DB()->prepare($sql);

            $resultado->bindParam(":desde",$desde);
            $resultado->bindParam(":hasta",$hasta);

            $resultado->execute();

            while($row=$resultado->fetch(PDO::FETCH_OBJ)){
                    $resulSet[]=$row;
            }

            return $resulSet;
        }


           public function getAll($numRegistros,$inicioLimit){
            $sql="SELECT DISTINCT * from denuncias_view ORDER BY denuncias_view.idDenuncia DESC LIMIT $inicioLimit,$numRegistros ";
            $resulLimit=$this->DB()->query($sql);
            while ($row = $resulLimit->fetch(PDO::FETCH_OBJ)) {
                $resulSet[] = $row;
            }
            return $resulSet;
        }


    	public function muestraCompleta(){//FUNCION DE CONSULTA LA CUAL POSEE LOS INNER JOIN PARA HACER CONSULTAS MULTITABLAS
        	$sql=$this->DB()->query("SELECT * FROM denuncias_all_view");

        	if ($sql) { // Evalua la cansulta
            	if ($sql->rowCount() != 0) { // Si existe al menos un registro...
                	while ($row = $sql->fetch(PDO::FETCH_OBJ)) { // Recorre un array (tabla) fila por fila.
                    	$resultset[] = $row; // Llena el array con cada uno de los registros de la tabla.
                	}
            	} else { // Sino...
                	$resultset = null; // Almacena null
            	}
        	}
        	return $resultset; // Finalmente retornla el arreglo con los elementos.

    	}
    

    	public function delete($id){
        	$sql=$this->DB()->query("DELETE FROM $this->table WHERE idDenuncia ='$id'");
        	return $sql;
    	}


    	public function update(){
        	$query = "UPDATE $this->table SET fechaDenuncia = :fechaDenuncia,motivo = :motivo WHERE idDenuncia = :idDenuncia"; // Consulta SQL
        	$result = $this->DB()->prepare($query); // Prepara la consulta SQL.
            // Limpia los parametros
        	$result->bindParam(':idDenuncia', $this->IdDenuncia);
        	$result->bindParam(':fechaDenuncia', $this->FechaDenuncia);
        	$result->bindParam(':motivo', $this->Observacion);
        	$save = $result->execute(); // Ejecuta la consulta - Retorna true ó false.
        	return $save;
    	}

    	public function getById($id){
        	$query = $this->DB()->query("SELECT DISTINCT denuncias.nControl, denuncias.fechaDenuncia,denuncias.motivo, miembrofamilia.cedulaIntegrante, miembrofamilia.telefonoIntegrante,miembrofamilia.emailIntegrante,clap.parroquia,clap.nombreClap FROM denuncias INNER JOIN miembrofamilia ON denuncias.idIntegrante=miembrofamilia.idIntegrante INNER JOIN grupofamiliar ON miembrofamilia.idFamilia=grupofamiliar.idFamilia INNER JOIN clap ON grupofamiliar.idCLAP= clap.idClap WHERE idDenuncia = '$id'"); // Consulta SQL
        	if ($row = $query->fetch(PDO::FETCH_OBJ)) { // Si el objeto existe en la tabla
            	$resultset = $row; // Lo almacena en $register
        	}
        	return $resultset; // Y finalmente, lo retorna.
    	}

        public function buscar(){

            $sql=$this->DB()->query("SELECT * from $this->table INNER JOIN $this->table1 ON $this->table.idIntegrante=$this->table1.idIntegrante WHERE nControl = $this->nControl");
            
        	if ($sql) { // Evalua la cansulta
            	if ($sql->rowCount() != 0) {
            	 // Si existe al menos un registro...
                	while ($row = $sql->fetch(PDO::FETCH_OBJ)) { 
                	// Recorre un array (tabla) fila por fila.
                    $resultset[] = $row; 
                    // Llena el array con cada uno de los registros de la tabla.
                	}
            	} else { // Sino...
                $resultset = null; // Almacena null
            	}
        	}
        	return $resultset;
        }

        public function atender(){
            $query = "UPDATE $this->table SET statusDenuncia = :statusDenuncia WHERE idDenuncia = :idDenuncia"; // Consulta SQL
            $result = $this->DB()->prepare($query); // Prepara la consulta SQL.
            // Limpia los parametros
            $result->bindParam(':idDenuncia', $this->IdDenuncia);
            $result->bindParam(':statusDenuncia', $this->StatusDenuncia);
            $save = $result->execute(); // Ejecuta la consulta - Retorna true ó false.
            return $save;
        }

               
    
   
}

    
?>