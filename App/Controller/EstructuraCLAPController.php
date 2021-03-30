<?php
    class EstructuraCLAPController extends BaseController{
        public function __construct(){ // Constructor de la clase
            parent::__construct(); // Ejecuta el constructor del padre.
        }

        public function index(){
            $this->view('EstructuraCLAP/Estructura');
        }

        public function register(){
            $this->view("EstructuraCLAP/RegistrarEstructura");
        } 
        
        public function readData(){
            $this->view("EstructuraCLAP/ConsultarEstructura");
        }
        
        public function insertData(){
            $estructura = new EstructuraCLAP();
            $statusRol = $_POST['statusRol'];
            $fechaEleccion = $this->formatDateAmerican($_POST['fechaEleccion']);
            $idCargo = $_POST['idCargo'];
            $idIntegrante = $_POST['idIntegrante'];
            $idClap = $_POST['idClap'];
            $estructura->setStatusRol($statusRol);
            $estructura->setFechaEleccion($fechaEleccion);
            $estructura->setIdCargo($idCargo);
            $estructura->setIdIntegrante($idIntegrante);
            $estructura->setIdClap($idClap);
            $data = $estructura->insert();
            $this->sendAjax($data);
        }

        public function deleteData(){
            $miembro = new EstructuraCLAP();
            $id = (int)$_GET['idRol'];
            $data = $miembro->delete($id);
            $this->sendAjax($data);
        }

        public function filter(){
            $estructura = new EstructuraCLAP();
            // $parroquia = $_POST['parroquia'];
            $idClap = $_POST['idClap'];
            $estructura->setIdClap($idClap);
            $allMiembros = $estructura->getMiembrosByClap();
            $this->viewArray("EstructuraCLAP/DetallesEstructura",array("allMiembros" => $allMiembros));
        }

        public function getClapsByParroquia(){
            $clap = new CLAP(); // Instancia un objeto tipo CLAP.
            $clap->setParroquia($_POST['parroquia']); // Establece la parroquia.
            $data = $clap->getAllClapsByParroquia(); // Obtiene los claps.
            $this->sendAjax($data);
        }

        public function getIntegranteByCedula(){
            $integrante = new Integrante();
            $cedulaIntegrante = $_POST['cedulaIntegrante'];
            $integrante->setCedulaIntegrante($cedulaIntegrante);
            $data = $integrante->getIntegranteByCedula();
            $this->sendAjax($data);
        }

        public function prueba(){
            $this->view("EstructuraCLAP/Registrar");
        }
    }
?>