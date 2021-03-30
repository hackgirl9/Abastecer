<?php
   	 class Familia extends EntidadBase{
       
        //Datos de la Familia
        private $idFamilia;
        private $grupoFamilia;
        private $apellidoFamilia;
        private $direccionFamilia;
        private $viviendaFamilia;
        private $manzanaFamilia;
        private $mercadosFamilia;
        private $clapFamilia;
        //Otros Datos
        private $tableFamilia;

       public function __construct(){// Constructor de la clase.
            $this->tableFamilia = "grupofamiliar";
            parent::__construct();// Ejecuta el constructor del padre.
        }
    
        // Getters & Setters

            //Getters de la Familia

        public function getIdFamilia(){
        return $this->idFamilia;
        }
        public function getGrupoFamilia(){
        return $this->grupoFamilia;
        }
        public function getApellidoFamilia(){
        return $this->apellidoFamilia;
        }
        public function getDireccionFamilia(){
        return $this->direccionFamilia;
        }
        public function getViviendaFamilia(){
        return $this->viviendaFamilia;
        }
        public function getManzanaFamilia(){
        return $this->manzanaFamilia;
        }
        public function getMercadosFamilia(){
        return $this->mercadosFamilia;
        }
        public function getClapFamilia(){
        return $this->clapFamilia;
        }
        
            
        
            //Setters de la Familia

        public function setIdFamilia($idFamilia){
        $this->idFamilia = $idFamilia;
        }
        public function setGrupoFamilia($grupoFamilia){
        $this->grupoFamilia= $grupoFamilia;
        }
        public function setApellidoFamilia($apellidoFamilia){
        $this->apellidoFamilia= $apellidoFamilia;
        }
        public function setDireccionFamilia($direccionFamilia){
        $this->direccionFamilia= $direccionFamilia;
        }
        public function setViviendaFamilia($viviendaFamilia){
        $this->viviendaFamilia = $viviendaFamilia;
        }
        public function setManzanaFamilia($manzanaFamilia){
        $this->manzanaFamilia= $manzanaFamilia;
        }
        public function setMercadosFamilia($mercadosFamilia){
        $this->mercadosFamilia= $mercadosFamilia;
        }
        public function setClapFamilia($clapFamilia){
        $this->clapFamilia= $clapFamilia;
        }
        
        
        //Métodos para Insertar en la base de datos

    public function insert(){
        $query = "INSERT INTO 
            $this->tableFamilia(grupoFamiliar,
                                apellidoFamilia,
                                direccionFamilia,
                                numVivienda,
                                numManzana,
                                cantMercadosAsignados, 
                                idClap) 
                        VALUES (:grupoFamiliar,
                                :apellidoFamilia, 
                                :direccionFamilia, 
                                :numVivienda,
                                :numManzana, 
                                :cantMercadosAsignados,
                                :idClap
                                )"; // Consulta SQL
        $result = $this->DB()->prepare($query); // Prepara la consulta SQL.
           

         // Limpia los parametros
        $result->bindParam(':grupoFamiliar', $this->grupoFamilia);
        $result->bindParam(':apellidoFamilia', $this->apellidoFamilia);
        $result->bindParam(':direccionFamilia', $this->direccionFamilia);
        $result->bindParam(':numVivienda', $this->viviendaFamilia);
        $result->bindParam(':numManzana', $this->manzanaFamilia);
        $result->bindParam(':cantMercadosAsignados', $this->mercadosFamilia);
        $result->bindParam(':idClap', $this->clapFamilia);

        $save = $result->execute(); // Ejecuta la consulta - Retorna true ó false.
        return $save;
    }


    public function update()
    {
       $query = "UPDATE $this->tableFamilia SET 
                        grupoFamiliar = :grupoFamiliar,
                        apellidoFamilia = :apellidoFamilia,
                        direccionFamilia = :direccionFamilia,
                        numVivienda = :numVivienda,
                        numManzana = :numManzana,
                        cantMercadosAsignados = :cantMercadosAsignados,
                        idClap = :idClap
                        WHERE idFamilia = $this->idFamilia
                        "; // Consulta SQL
            $result = $this->DB()->prepare($query); // Prepara la consulta SQL.
            
            // Limpia los parametros
            $result->bindParam(':grupoFamiliar', $this->grupoFamilia);
            $result->bindParam(':apellidoFamilia', $this->apellidoFamilia);
            $result->bindParam(':direccionFamilia', $this->direccionFamilia);
            $result->bindParam(':numVivienda', $this->viviendaFamilia);
            $result->bindParam(':numManzana', $this->manzanaFamilia);
            $result->bindParam(':cantMercadosAsignados', $this->mercadosFamilia);
            $result->bindParam(':idClap', $this->clapFamilia);

            $save = $result->execute(); // Ejecuta la consulta - Retorna boleano
            return $save; 
    }

    public function delete($id)
    {
        $sql=$this->DB()->query("DELETE FROM $this->tableFamilia WHERE idFamilia ='$id'");
            return $sql;
    }

    public function traerTodo()
    {
        $query = $this->DB()->query("SELECT grupofamiliar.idFamilia,
                                            grupofamiliar.grupoFamiliar,
                                            grupofamiliar.apellidoFamilia,
                                            grupofamiliar.direccionFamilia,
                                            clap.nombreClap 
                                    FROM grupofamiliar INNER JOIN clap on grupofamiliar.idCLAP = clap.idClap ORDER BY grupofamiliar.idFamilia ASC"); 
            if($query)// Evalua la cansulta
            { 
                if($query->rowCount() != 0)// Si existe registro
                { 
                    while($row = $query->fetch(PDO::FETCH_OBJ)) // Recorre un array, fila por fila.
                    { 
                        $resultset[] = $row; // Llena el array con los registros
                    }
                }
                else{ // 
                    $resultset = NULL; 
                }
            }
            return $resultset; // Retorna el arreglo o Null
    }


    public function getById($id){
            $query = $this->DB()->query("SELECT grupofamiliar.idFamilia,
                                                grupofamiliar.grupoFamiliar,
                                                grupofamiliar.apellidoFamilia,
                                                grupofamiliar.numVivienda,
                                                grupofamiliar.numManzana,
                                                grupofamiliar.direccionFamilia,
                                                grupofamiliar.cantMercadosAsignados,
                                                clap.nombreClap,
                                                clap.parroquia,
                                                miembrofamilia.idIntegrante,
                                                miembrofamilia.nombreIntegrante,
                                                miembrofamilia.apellidoIntegrante,
                                                miembrofamilia.telefonoIntegrante,
                                                miembrofamilia.rolPersona
                                        FROM miembrofamilia INNER JOIN grupofamiliar on miembrofamilia.idFamilia = grupofamiliar.idFamilia INNER  JOIN  clap ON grupofamiliar.idCLAP = clap.idClap WHERE grupofamiliar.idFamilia='$id'"); // Consulta SQL
        if($query){
            while($row = $query->fetch(PDO::FETCH_OBJ)){//existe
                     $register[] = $row; // Lo almacena en $resultado[]
                    }
                }else{
                    $register = NULL;
                }
            return $register; // Y retorna
        }



    }
    
?>