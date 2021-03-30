<?php
    class UsuarioController extends BaseController{
        public function __construct(){ // Constructor de la clase
            parent::__construct(); // Ejecuta el constructor del padre.
        }

        public function index(){
            $this->view("Usuario/Usuario");
        }

        public function redirectGestionarUsuario(){
            $this->view("Usuario/GestionarUsuario");
        }


        public function gestionarUsuario(){
            $user = new Usuario(); // Instancia un objeto de tipo User
            $numRegistro=2;

            $numFilas=$user->countFilasAll();
            if($numFilas >=1){
                $datosPagination=$this->pagination($numRegistro,$numFilas);
                $totalPagina=$datosPagination["totalPagina"];


                $allUsers = $user->getAll($numRegistro,$datosPagination["inicio"]);

            }else{
                $totalPagina=null;
                $allUsers=null;
            }

            // Obtiene todos los usuarios gracias al getter de la clase y se almacenan.
            $this->sendAjax(array("allUsers" => $allUsers,"totalPagina"=>$totalPagina));


        }

        public  function redirectRegister(){
            $this->view("Usuario/RegistrarUsuario");
        }


        public function registerData(){ // Registra datos en la base de datos
                $user = new Usuario(); // Instancia el objeto User
                $user->setNombreUsuario(strtoupper($_POST['nombreUsuario']));
                $user->setApellidoUsuario(strtoupper($_POST['apellidoUsuario']));
                $user->setCedulaUsuario($_POST['cedulaUsuario']);
                $user->setTelefonoUsuario($_POST['telefonoUsuario']);
                $user->setEmailUsuario(($_POST['emailUsuario']));
                $user->setUsuario($_POST['usuario']);
                $user->setRolUsuario($_POST['rolUsuario']);
                $passwordUsuario=$_POST["passwordUsuario"];
                $passwordEncriptada=password_hash($passwordUsuario,PASSWORD_DEFAULT,array("cost"=>12));
                $user->setPasswordUsuario($passwordEncriptada);
                $save = $user->insert();
        }



        public function updateData(){

                $user = new Usuario(); // Instancia el objeto User
                $user->setIdUsuario($_POST['idUsuario']);
                $user->setNombreUsuario($_POST['nombreUsuario']);
                $user->setApellidoUsuario($_POST['apellidoUsuario']);
                $user->setCedulaUsuario($_POST['cedulaUsuario']);
                $user->setTelefonoUsuario($_POST['telefonoUsuario']);
                $user->setEmailUsuario($_POST['emailUsuario']);
                $user->setUsuario($_POST['usuario']);
                $user->setRolUsuario($_POST['rolUsuario']);
                $user->setPasswordUsuario($_POST['passwordUsuario']);

                $save = $user->update();

        }

        public function deleteData(){
            if(isset($_GET['idUsuario'])){ // Si se envio el id por la url
                $id =$_GET['idUsuario']; // Almacena el id como un entero.
                $user = new Usuario(); // Instancia un objeto de tipo Users.
                $user->delete($id); // Elimina el valor que ingresa.
            }

        }

        public function redirectDetails(){
            if(isset($_GET['idUsuario'])){
                $id = $_GET['idUsuario'];
                $user = new Usuario();
                $register = $user->getById($id);
                $this->viewArray('Usuario/DetallesUsuario',array('register'=>$register));
            }
        }

        public function  redirectUpdate(){

          $this->view('Usuario/ActualizarUsuario');
        }

        public function consultUsuario(){
            $id = $_GET['idUsuario'];
            $user = new Usuario();
            $register = $user->getById($id);
            $this->sendAjax($register);
        }



        public function checkCedula(){
            $usuario= new Usuario();
            $band=$usuario->checkUsuario('cedulaUsuario',$_POST['cedulaUsuario']);
            $this->sendAjax($band);
        }

        public function checkUsername(){
            $usuario=new Usuario();
            $band=$usuario->checkUsuario('usuario',$_POST['usuario']);
            $this->sendAjax($band);
        }
    }
?>