<?php
    class Atencion extends EntidadBase{
        private $fecha;
        private $observacion;
        private $tipoAtencion;
        private $cedula;
        private $clap;
        private $idFecha;
        private $table;

        public function __construct(){
            parent::__construct();
            $this->table="atencion";
        }

        public function getIdfecha(){
            return $this->idFecha;
        }

        public function getCedula(){
            return $this->cedula;
        }

        public function getTipoAtencion(){
            return $this->tipoAtencion;
        }

        public function getObservacion(){
            return $this->observacion;
        }
        public function getFecha(){
            return $this->fecha;
        }
        public function getClap(){
            return $this->clap;
        }

        public function setIdFecha($idFecha){
            $this->idFecha=$idFecha;
        }

        public function setFecha($fecha){
            $this->fecha = $fecha;
        }

        public function setObservacion($observacion){
            $this->observacion = $observacion;
        }
        public function setTipoAtencion($tipoAtencion){
            $this->tipoAtencion = $tipoAtencion;
        }

        public function setCedula($cedula){
            $this->cedula = $cedula;
        }
        public function setClap($clap){
            $this->clap = $clap;
        }



        public function  countFilasAll(){
            //Retorna el numero de filas que tiene la tabla
            $sql="SELECT DISTINCT atencion.idAtencion,DATE_FORMAT(atencion.fechaAtencion,'%d/%m/%Y') AS fechaAtencion, clap.nombreClap , clap.parroquia FROM atencion INNER JOIN atencion_familia ON atencion_familia.idAtencion=atencion.idAtencion INNER JOIN grupofamiliar ON atencion_familia.idFamilia=grupofamiliar.idFamilia INNER JOIN clap ON grupofamiliar.idCLAP=clap.idClap";

            $result=$this->DB()->query($sql);
            /*En caso tal de que la consultas ocurra un error retorno 0 para que mi controlador lo iguale  a null*/
            if($result) {
                $numFila=$result->rowCount();
            }else{
                $numFila=0;
            }
            return $numFila;
        }


        public function countFilasByFecha($desde,$hasta){
            $sql="SELECT DISTINCT atencion.idAtencion,DATE_FORMAT(atencion.fechaAtencion,'%d/%m/%Y') AS fechaAtencion, clap.nombreClap , clap.parroquia FROM atencion INNER JOIN atencion_familia ON atencion_familia.idAtencion=atencion.idAtencion INNER JOIN grupofamiliar ON atencion_familia.idFamilia=grupofamiliar.idFamilia INNER JOIN clap ON grupofamiliar.idCLAP=clap.idClap WHERE atencion.fechaAtencion BETWEEN :desde AND :hasta";
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


        public function getAll($numRegistros,$inicioLimit){
            $sql="SELECT DISTINCT atencion.idAtencion,DATE_FORMAT(atencion.fechaAtencion,'%d/%m/%Y') AS fechaAtencion, clap.nombreClap , clap.parroquia FROM atencion INNER JOIN atencion_familia ON atencion_familia.idAtencion=atencion.idAtencion INNER JOIN grupofamiliar ON atencion_familia.idFamilia=grupofamiliar.idFamilia INNER JOIN clap ON grupofamiliar.idCLAP=clap.idClap ORDER  BY atencion.idAtencion DESC LIMIT $inicioLimit,$numRegistros ";
            $resulLimit=$this->DB()->query($sql);
            while ($row = $resulLimit->fetch(PDO::FETCH_OBJ)) {
                $resulSet[] = $row;
            }
            return $resulSet;
        }




        public function getAllByFechaAtencion($desde,$hasta,$numRegistros,$inicioLimit){
            $sql="SELECT DISTINCT atencion.idAtencion,DATE_FORMAT(atencion.fechaAtencion,'%d/%m/%Y') AS fechaAtencion, clap.nombreClap , clap.parroquia FROM atencion INNER JOIN atencion_familia ON atencion_familia.idAtencion=atencion.idAtencion INNER JOIN grupofamiliar ON atencion_familia.idFamilia=grupofamiliar.idFamilia INNER JOIN clap ON grupofamiliar.idCLAP=clap.idClap WHERE atencion.fechaAtencion BETWEEN :desde AND :hasta  ORDER BY atencion.fechaAtencion LIMIT $inicioLimit,$numRegistros";
            $resultado=$this->DB()->prepare($sql);

            $resultado->bindParam(":desde",$desde);
            $resultado->bindParam(":hasta",$hasta);

            $resultado->execute();

            while($row=$resultado->fetch(PDO::FETCH_OBJ)){
                    $resulSet[]=$row;
            }

            return $resulSet;
        }


        public function insert(){
            $sql="INSERT INTO $this->table (fechaAtencion,observacion,tipoAtencion)VALUES(:fecha,:observacion,:tipoAtencion)";


            $resultado=$this->DB()->prepare($sql);

            $save=$resultado->execute(array(":fecha"=>$this->fecha,":observacion"=>$this->observacion,":tipoAtencion"=>$this->tipoAtencion));

            if($save){
                $idFecha=$this->getIdFechaNow();

            }
            return $idFecha;
        }





        public function getAtencionById($idAtencion){
            $sql="SELECT  DATE_FORMAT(atencion.fechaAtencion,'%d/%m/%Y') AS fechaAtencion,atencion.tipoAtencion,atencion.observacion,clap.nombreClap,clap.idClap,clap.parroquia, count(atencion_familia.idAtencion) as cantidad  FROM atencion INNER JOIN atencion_familia on atencion.idAtencion = atencion_familia.idAtencion INNER JOIN grupofamiliar ON atencion_familia.idFamilia=grupofamiliar.idFamilia INNER JOIN clap on grupofamiliar.idClap = clap.idClap WHERE atencion_familia.idAtencion=:id";

            $resultado=$this->DB()->prepare($sql);
            $resultado->bindParam(":id",$idAtencion);
            $resultado->execute();
            $row=$resultado->fetch(PDO::FETCH_OBJ);
            return $row;

        }

        public function getAllFamiliaAtendidaById($idAtencion){
            $sql="SELECT  grupofamiliar.grupoFamiliar ,grupofamiliar.apellidoFamilia,grupofamiliar.numVivienda,grupofamiliar.numManzana,grupofamiliar.cantMercadosAsignados FROM atencion INNER JOIN atencion_familia on atencion.idAtencion = atencion_familia.idAtencion INNER JOIN grupofamiliar ON atencion_familia.idFamilia=grupofamiliar.idFamilia INNER JOIN clap on grupofamiliar.idClap = clap.idClap WHERE atencion_familia.idAtencion=:id";
            $result=$this->DB()->prepare($sql);
            $result->bindParam(":id",$idAtencion);
            $result->execute();

            while($row=$result->fetch(PDO::FETCH_OBJ)) {
                $resulSet[] = $row;
            }
            return  $resulSet;
        }




        public function insertPerson(){

            $sqlconsul="SELECT grupofamiliar.idFamilia, grupofamiliar.apellidoFamilia FROM grupofamiliar INNER JOIN miembrofamilia  ON grupofamiliar.idFamilia=miembrofamilia.idFamilia WHERE  miembrofamilia.cedulaIntegrante =:cedula AND grupofamiliar.idCLAP=:idClap";

            $resultado=$this->DB()->prepare($sqlconsul);
            $resultado->bindParam(":cedula",$this->cedula);
            $resultado->bindParam(":idClap",$this->clap);
            $resultado->execute();

            if($resultado->rowCount()>=1){


                $row=$resultado->fetch(PDO::FETCH_OBJ);

                $sqlInsert="INSERT INTO atencion_familia (idAtencion,idFamilia)VALUES($this->idFecha,$row->idFamilia)";
                $save=$this->DB()->query($sqlInsert);

            }else{
                $row=$this->findCLAP();
            }

            return $row;


        }

        public function getIdFechaNow(){//Devuelve la ultima fecha registrada por el sistema
            $sql="SELECT idAtencion FROM $this->table ORDER by idAtencion DESC LIMIT 1";
            $resultado=$this->DB()->query($sql);

            $row = $resultado->fetch(PDO::FETCH_OBJ);

            return $row;
        }

        public function findCLAP(){
            $sql="SELECT clap.nombreClap FROM clap WHERE idClap=(SELECT grupofamiliar.idCLAP FROM grupofamiliar INNER  JOIN miembrofamilia  ON grupofamiliar.idFamilia = miembrofamilia.idFamilia WHERE miembrofamilia.cedulaIntegrante=$this->cedula)";

            $resul=$this->DB()->query($sql);

            if($resul->rowCount()>=1){
                $row=$resul->fetch(PDO::FETCH_OBJ);
            }else{
                $row=null;
            }

            return $row;
        }

        public function comprobarAtencion(){
            $band=false;

            $sql="SELECT atencion.fechaAtencion FROM atencion INNER JOIN atencion_familia ON atencion_familia.idAtencion=atencion.idAtencion WHERE atencion_familia.idFamilia=(SELECT grupofamiliar.idFamilia FROM grupofamiliar INNER JOIN miembrofamilia ON  grupofamiliar.idFamilia=miembrofamilia.idFamilia WHERE  miembrofamilia.cedulaIntegrante=$this->cedula)ORDER BY atencion.idAtencion DESC LIMIT 1";
            $result=$this->DB()->query($sql);
            $row=$result->fetch(PDO::FETCH_ASSOC);


            //Tomo la fecha de la base de datos y le sumo 30 dias
            $nuevaFecha=strtotime(('+30 day'),strtotime($row["fechaAtencion"]));
            $fecha=date("Y/m/d",$nuevaFecha);


            if($this->fecha>=$fecha&&$this->fecha!=$row["fechaAtencion"]){
                $band=true;
            }else{
                $band=false;
            }

            return $band;
        }

        public function comprobarGrupoFamiliar(){
            $band=false;
            $sql="SELECT idAtencionFamilia FROM atencion_familia WHERE idFamilia=(SELECT grupofamiliar.idFamilia FROM grupofamiliar INNER JOIN miembrofamilia ON  grupofamiliar.idFamilia=miembrofamilia.idFamilia WHERE  miembrofamilia.cedulaIntegrante=$this->cedula)";
            $result=$this->DB()->query($sql);

            if($result->rowCount()>=1){
                $band=true;
            }else{
                $band=false;
            }
            return $band;
        }


        public function  notification(){
            $band=true;

            $fechaActual=date("Y/m/d");


            $sql = "SELECT atencion.idAtencion , max(atencion.fechaAtencion) as fechaAtencion,clap.nombreClap FROM atencion INNER JOIN atencion_familia ON atencion_familia.idAtencion=atencion.idAtencion INNER JOIN grupofamiliar ON  grupofamiliar.idFamilia=atencion_familia.idFamilia INNER JOIN clap on clap.idClap=grupofamiliar.idCLAP GROUP BY clap.nombreClap";

            $result=$this->DB()->query($sql);

            if($result){
                if($result->rowCount()>=1){
                    while($row=$result->fetch(PDO::FETCH_OBJ)){

                        $nuevaFecha=strtotime(('+30 day'),strtotime($row->fechaAtencion));
                        $fecha=date("Y/m/d",$nuevaFecha);

                      
                        if($fechaActual>=$fecha){
                            $resultSet[]=$row;
                            $band=false;
                        }
                    }
                }else{
                    $resultSet=null;
                }
            }
           if($band){
                $resultSet=null;
            }

            return $resultSet;
        }
    }
?>