<?php
    class SolicitudController extends BaseController
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function index()
        {
            $this->view('Solicitud/Solicitud');
        }
        public function registerData()
        {
            $this->view('Solicitud/RegistrarSolicitud');

        }
        public function details()
        {
            $id =(int) $_GET['Id'];
            $solicitud = new Solicitud();
            $datos =$solicitud->getAll(1,1);
            $this->viewArray('Solicitud/DetallesSolicitud',array("datos" =>$datos,"id"=>$id));    
        }
        public function readData()
        {
            $solicitud= new Solicitud;
            $Alluser = $solicitud->getAll(1,1);
        
            $this->viewArray('Solicitud/ConsultarSolicitud',array('Alluser' =>$Alluser));
        }   

        public  function register()     
        {
            $solicitud= new Solicitud();
            $date =$this->formatDateAmerican($_POST['fecha']);
            $solicitud->setnOficio($_POST['nOficio']);
            $solicitud->setfechaSolicitud($date);
            $solicitud->setbeneficioSolicitud($_POST['beneficioSolicitud']);
            $solicitud->setStatusSolicitud($_POST['status']);
            $solicitud->setIdIntegrante($_POST['idIntegrante']);

              $save = $solicitud->insert();
            $this->sendAjax($save);
        }
        public function delete()
        {
            $solicitud = new Solicitud();
            $id= $_GET['id'];
            $solicitud->delete($id);
            $this->redirect("Solicitud","readData");
        }
        public function Actualizar()
        {
            $solicitud= new Solicitud();
            $idSolicitud=$_POST['idSolicitud'];
            $beneficioSolicitud =$_POST['beneficio'];
            $solicitud->setfechaSolicitud($_POST['fechaSolicitud']);
            $solicitud->setbeneficioSolicitud($beneficioSolicitud);
            $solicitud->setidSolicitud($idSolicitud);
            
            $save= $solicitud->update();
            $this->redirect("Solicitud","readData");

        }
        public function cedula(){
            $solicitud=new Solicitud();
            $cedula=$_POST['cedula'];
            $solicitud->setIdIntegrante($cedula);
            $resultado=$solicitud->getID();
            $this->sendAjax($resultado);
        }
        public function consultar(){
            $solicitud=new Solicitud();
            $consultar=$_POST['consultar'];
            $solicitud->setIdIntegrante($consultar);
            $resultado=$solicitud->getID();
            $this->sendAjax($resultado);
        }
        public function redirectUpdate(){
            $id =$_GET['id'];
            $solicitud = new Solicitud();
            $datos =$solicitud->getAll(1,1);
            $this->viewArray('Solicitud/actualizar',array("datos" =>$datos,"id"=>$id));
           

        }
        public function atender(){
            $solicitud = new Solicitud();
            $id =$_GET['id'];
            $statusSolicitud=$_POST['statusSolicitud'];
            $solicitud->setstatusSolicitud($statusSolicitud);
            $solicitud->setidSolicitud($id);
            $datos =$solicitud->atender();

            $this->redirect("Solicitud","readData");
        }
        public function busqueda(){
            $solicitud= new Solicitud();
            $nOficio=$_POST['nOficio'];
            $solicitud->setnOficio($nOficio);
            $Busqueda=$solicitud->busqueda();
            $this->viewArray("Solicitud/ConsultarSolicitud",array("Busqueda"=>$Busqueda));
        }
        public function redirectUpdate2(){
            $id =$_GET['id'];
            $solicitud = new Solicitud();
            $datos =$solicitud->getAll(1,1);
            $this->viewArray('Solicitud/atender',array("datos" =>$datos,"id"=>$id));
           

        }
    }
    
    
        
?>