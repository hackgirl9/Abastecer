<?php
    class Solicitud extends EntidadBase{
    
        private $idSolicitud;
        private $nOficio;
        private $fechaSolicitud;
        private $beneficioSolicitud;
        private $estatusSolicitud;
        private $idIntegrante;
        private $cedula;
        
        public function __construct(){
            $this->table = "solicitud";
            $this->table1 ="miembrofamila";
            parent::__construct();
        }
        public function getidSolicitud(){
            return $this->idSolicitud;
        }   
        public function getnOficio(){
            return $this->nOficio;
        }
        public function getfechaSolicitud(){
            return $this->idSolicitud;
        }
        public function getbeneficioSolicitud(){
            return $this->beneficioSolicitud;
        }
        public function getestatusSolicitud(){
            return $this->statusSolicitud;
        }
        public function getidIntegrante(){
            return $this->idIntegrante;
        }
        public function getcedula(){
            return $this->cedula;
        }
        public function setidSolicitud($idSolicitud){
        $this->idSolicitud = $idSolicitud;
        }
        public function setnOficio($nOficio) {
            $this->nOficio = $nOficio;
        }
        public function setfechaSolicitud($fechaSolicitud){
            $this->fechaSolicitud = $fechaSolicitud;
        }
        public function setbeneficioSolicitud($beneficioSolicitud){
            $this->beneficioSolicitud = $beneficioSolicitud;
        }
        public function setStatusSolicitud($estatusSolicitud){
        $this->estatusSolicitud = $estatusSolicitud;
        }
        public function setIdIntegrante($idIntegrante){
            $this->idIntegrante = $idIntegrante;
        }
        public function setcedula($cedula){
            $this->cedula = $cedula;
        }

        public function insert(){
            $query =    "INSERT INTO 
                        $this->table(nOficio,fechaSolicitud,beneficioSolicitud,statusSolicitud,idIntegrante) 
                        VALUES ( :nOficio,:fechaSolicitud,:beneficioSolicitud,:statusSolicitud,:IdIntegrantes)"; 
            $result = $this->DB()->prepare($query);
            
            $result->bindParam(':nOficio', $this->nOficio);
            $result->bindParam(':fechaSolicitud',$this->fechaSolicitud);
            $result->bindParam(':beneficioSolicitud',$this->beneficioSolicitud);
            $result->bindParam(':statusSolicitud',$this->estatusSolicitud);
            $result->bindParam(':IdIntegrantes',$this->idIntegrante);
            $save = $result->execute();
            return $save;
        }
              public function getAll($a,$b){
            $query = $this->DB()->query("SELECT * FROM solicitud INNER JOIN miembrofamilia ON 
              solicitud.idIntegrante=miembrofamilia.idIntegrante");
            if($query){
                if($query->rowCount() != 0){
                    while($row = $query->fetch(PDO::FETCH_OBJ)){
                        $resultset[] = $row;
                    }
                }
                else{
                    $resultset = null;
                }
            }
                 return $resultset;
             }

         public function getById(int $id){
                 $query = $this->DB()->query("SELECT * FROM $this->table WHERE idSolicitud = '$id'"); 
                 if($row = $query->fetch(PDO::FETCH_OBJ))
                    { 
                     $register = $row; 
                    }
            return $register;
            }
                public function delete($id){ 
                     $query=$this->DB()->query("DELETE FROM $this->table WHERE idSolicitud ='$id'");
                     return $query;//retorno
                }
                 public function update(){
                        $query="UPDATE $this->table SET fechaSolicitud=:fechaSolicitud,beneficioSolicitud=:beneficioSolicitud 
                        WHERE idSolicitud=:idSolicitud"; 

                        $result=$this->DB()->prepare($query);
                         $result->bindParam(':idSolicitud',$this->idSolicitud);
                         $result->bindParam(':fechaSolicitud',$this->fechaSolicitud);
                         $result->bindParam(':beneficioSolicitud',$this->beneficioSolicitud);
                         
                            $update = $result->execute();
                            return $update;
                    }
                    public function getID(){
        	            
                        $sql="SELECT * from miembrofamilia INNER JOIN grupofamiliar on miembrofamilia.idFamilia=grupofamiliar.idFamilia 
                        INNER JOIN clap on grupofamiliar.idCLAP=CLAP.idCLAP 
                        WHERE cedulaIntegrante = $this->idIntegrante";
                        $query = $this->DB()->query($sql);
                        if($row = $query->fetch(PDO::FETCH_OBJ)){
                            $register[]= $row; 
                        }

                        return $register;
                    }
                    
                    public function updateData(){
                        $query="UPDATE $this->table SET 
                        nControl=:noficios, fechaSolicitud=fechaSolicitud,beneficioSolicitud=:beneficioSolicitud,status=:status 
                        WHERE idSolicitud=:idSolicitud";
                        $result=$this->DB()->prepare($query);
                        
                         $result->bindParam(':idSolicitud',$this->idSolicitud);
                         $result->bindParam(':nOficio',$this->nOficio);
                         $result->bindParam(':fechaSolicitud',$this->fechaSolicitud);
                         $result->bindParam(':beneficioSolicitud',$this->beneficioSolicitud);
                         $result->bindParam(':statusSolicitud',$this->statusSolicitud);

                            $update = $result->execute();
                            return $update;

                                }
                   public function busqueda(){
                            $query = $this->DB()->query("SELECT * FROM $this->table  INNER JOIN miembrofamilia ON 
                            solicitud.idIntegrante=miembrofamilia.idIntegrante WHERE nOficio = $this->nOficio"); 
                            if($row = $query->fetch(PDO::FETCH_OBJ)){ 
                                $register[] = $row; 
                               }
                            return $register;
                    }
                    public function atender(){
                        echo $this->estatusSolicitud;
                        $query="UPDATE $this->table SET 
                        statusSolicitud=:statusSolicitud 
                        WHERE idSolicitud=:idSolicitud";
                        $result=$this->DB()->prepare($query);
                         $result->bindParam(':statusSolicitud',$this->estatusSolicitud);
                         $result->bindParam(':idSolicitud',$this->idSolicitud);
                        $atender = $result->execute();
                            return $atender;

                    }
                    

                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    /*public function busqueda(){
                        $sql=$this->DB()->query("SELECT * FROM $this->table 
                        WHERE nOficio = $this->nOficio");
                        if ($sql) {
                            if ($sql->rowCount() != 0) {
                                while ($row = $sql->fetch(PDO::FETCH_OBJ)) { 
                                $resultset[] = $row; }
                            } else {
                            $resultset = null;}
                        }return $resultset;
                    }*/
                    
}?>