<?php
    class HomeController extends BaseController{
        public function __construct(){ // Constructor de la clase
            parent::__construct(); // Ejecuta el constructor del padre.
        }

        public function index(){
            $this->view("Home/Home");
        }

        public function usuarioHome(){
            $this->view("Usuario/Usuario");
        }

        public function clapHome(){
            $this->view("CLAP/CLAP");
        }

        public function familiaHome(){
            $this->view("Familia/Familia");
        }

        public function perfilHome(){
            $this->view("Perfil/Perfil");
        }

        public function atencionHome(){
            $this->view("Atencion/Atencion");
        }

        public function denunciaHome(){
            $this->view("Denuncia/Denuncia");
        }

        public function solicitudHome(){
            $this->view("Solicitud/Solicitud");
        }

        public function reporteHome(){
            $reporte = new Reporte();
            $allClaps = $reporte->getClaps();
            $allDenuncias = $reporte->getDenuncias();
            $this->viewArray('Reporte/GenerarReporte',array(
                'allClaps' => $allClaps,
                'allDenuncias' => $allDenuncias
            ));
        }

        public function dashboardHome(){
            $this->view("Dashboard/Dashboard");
        }

        public function distribuidoraHome(){
            $this->view("Distribuidora/Distribuidora");
        }

        public function enlaceHome(){
            $this->view("EnlacePolitico/Enlace");
        }

        public function notificacionHome(){
            $this->view("Notificacion/Notificacion");
        }

        public function ayudaHome(){
            $this->view("Ayuda/Ayuda");
        }
    }
?>