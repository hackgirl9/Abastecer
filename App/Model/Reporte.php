<?php 
    class Reporte extends EntidadBase{
        public function __construct(){
            parent::__construct();
        }

        public function getClaps(){
            $sql = "SELECT * FROM clap AS c 
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

        public function getClapById($id){
            
        }


        public function getAtenciones(){
            $query=$this->DB()->query("SELECT DISTINCT atencion.idAtencion,DATE_FORMAT(atencion.fechaAtencion,'%d/%m/%Y') AS fechaAtencion, clap.nombreClap , clap.parroquia FROM atencion INNER JOIN atencion_familia ON atencion_familia.idAtencion=atencion.idAtencion INNER JOIN grupofamiliar ON atencion_familia.idFamilia=grupofamiliar.idFamilia INNER JOIN clap ON grupofamiliar.idCLAP=clap.idClap ORDER  BY atencion.idAtencion DESC");

            if($query) {
                if ($query->rowCount() != 0) {
                    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                        $resulSet[] = $row;
                    }
                } else {
                    $resulSet= null;
                }
            }
            return $resulSet;
        }

        public function getSolitud(){
            $sql = "SELECT * FROM solicitud 
                        INNER JOIN miembrofamilia ON solicitud.idIntegrante = miembrofamilia.idIntegrante INNER JOIN grupofamiliar ON miembrofamilia.idFamilia= grupofamiliar.idFamilia INNER JOIN clap ON grupofamiliar.idClap=clap.idClap"; // Consulta SQL
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

        public function getFiltrarSolicitud($parroquia){
            $sql = "SELECT * FROM solicitud 
                        INNER JOIN miembrofamilia ON solicitud.idIntegrante = miembrofamilia.idIntegrante INNER JOIN grupofamiliar ON miembrofamilia.idFamilia= grupofamiliar.idFamilia INNER JOIN clap ON grupofamiliar.idClap=clap.idClap WHERE clap.parroquia = '$parroquia'"; // Consulta SQL
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


        public function getDenuncias(){
            $sql = "SELECT * FROM denuncias_all_view";
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

           public function getDenunciasFiltrado($fecha1,$fecha2){
            $sql = "SELECT * FROM denuncias_all_view WHERE fechaDenuncia BETWEEN '$fecha1' AND '$fecha2' ";
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