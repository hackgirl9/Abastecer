<?php
    class LoginController extends BaseController{
        public function __construct(){
            parent::__construct();
        }
        public function index(){
            $this->view("Login/Login");
        }

        public function Home(){
            $login=new Login();
            if(isset($_POST['id'])){
                $login->getById($_POST['id']);
            }else{
                $this->redirect();
            }

        }

        public function IniciarSesion(){
            $user = new Login();
            $user->setUsername($_POST["username"]);
            $user->setPassword($_POST["password"]);
            $band = $user->Acceder();
            $this->sendAjax($band);
        }


        public function cerrarSesion(){
            session_destroy();
            $this->redirect();
        }

    }
?>