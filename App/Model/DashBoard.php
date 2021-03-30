<?php
class DashBoard extends EntidadBase{

    public function __construct(){
        parent::__construct();
    }




    public function countCLAP(){
        $sql="SELECT idClap FROM clap";

        $result=$this->DB()->query($sql);

        $numRow=$result->rowCount();

        return $numRow;
    }



    public function countAtenciones(){
        $sql="SELECT  atencion.idAtencion  FROM atencion INNER JOIN atencion_familia ON atencion_familia.idAtencion=atencion.idAtencion INNER JOIN grupofamiliar ON atencion_familia.idFamilia=grupofamiliar.idFamilia INNER JOIN clap ON grupofamiliar.idCLAP=clap.idClap";

        $result=$this->DB()->query($sql);

        $numRow=$result->rowCount();

        return $numRow;
    }


    public function countfamiliasBene(){
        $sql="SELECT idFamilia FROM atencion_familia";

        $result=$this->DB()->query($sql);

        $numRow=$result->rowCount();

        return $numRow;

    }


    public function  countBolsasEntregadas(){
        $sql="SELECT SUM(grupofamiliar.cantMercadosAsignados)as cantidad  FROM atencion_familia INNER  JOIN grupofamiliar on grupofamiliar.idFamilia=atencion_familia.idFamilia";

        $result=$this->DB()->query($sql);
        if($row=$result->fetch(PDO::FETCH_ASSOC)){
                if($row['cantidad']!=null){
                    $numBolsas=$row['cantidad'];

                }else{
                    $numBolsas=0;
                }

        }


        return $numBolsas;
    }




    public function allDenuncias(){
        $sql="SELECT * FROM denuncias_all_view WHERE  statusDenuncia='En Proceso' LIMIT 4";

        $result=$this->DB()->query($sql);
        if($result){
            if($result->rowCount()>=1){
                while($row=$result->fetch(PDO::FETCH_OBJ)){
                    $resultSet[]=$row;
                }
            }else{
                $resultSet=null;
            }
        }

        return $resultSet;
    }


    public function allSolicitud(){
        $sql="SELECT solicitud.idSolicitud,solicitud.nOficio,solicitud.fechaSolicitud,miembrofamilia.nombreIntegrante,miembrofamilia.apellidoIntegrante ,solicitud.statusSolicitud FROM solicitud INNER  JOIN miembrofamilia on miembrofamilia.idIntegrante=solicitud.idIntegrante WHERE solicitud.statusSolicitud='proceso' LIMIT 4";
        $result=$this->DB()->query($sql);
        if($result){
            if($result->rowCount()>=1){
                while($row=$result->fetch(PDO::FETCH_OBJ)){
                    $resultSet[]=$row;
                }
            }else{
                $resultSet=null;
            }
        }

        return $resultSet;
    }



}



?>