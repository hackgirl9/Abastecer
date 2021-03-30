<?php
class Login extends EntidadBase{
    private $idUsuario;
    private $nombreUsuario;
    private $apellidoUsuario;
    private $cedulaUsuario;
    private $telefonoUsuario;
    private $emailUsuario;
    private $username;
    private $rolUsuario;
    private $password;


    public function __construct(){
        parent::__construct();
    }

    public function getUsername(){
        return $this->username;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function getNombreUsuario(){
        return $this->nombreUsuario;
    }



    public function getApellidoUsuario(){
        return $this->apellidoUsuario;
    }



    public function getRolUsuario(){
        return $this->rolUsuario;
    }


    public function getCedulaUsuario(){
        return $this->cedulaUsuario;
    }


    public function getTelefonoUsuario(){
        return $this->telefonoUsuario;
    }

    public function getEmailUsuario(){
        return $this->emailUsuario;
    }


    public function setUsername($username){
        $this->username = $username;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }


    public function setNombreUsuario($nombreUsuario){
        $this->nombreUsuario = $nombreUsuario;
    }


    public function setApellidoUsuario($apellidoUsuario){
        $this->apellidoUsuario = $apellidoUsuario;
    }


    public function setCedulaUsuario($cedulaUsuario){
        $this->cedulaUsuario = $cedulaUsuario;
    }

    public function setTelefonoUsuario($telefonoUsuario){
        $this->telefonoUsuario = $telefonoUsuario;
    }


    public function setEmailUsuario($emailUsuario){
        $this->emailUsuario = $emailUsuario;
    }


    public function setRolUsuario($rolUsuario){
        $this->rolUsuario = $rolUsuario;
    }


    public function acceder(){
        $id=0;

        $query="SELECT * FROM usuario WHERE usuario=:username";

        $resultado=$this->DB()->prepare($query);
        $resultado->bindParam(':username',$this->username);

        $resultado->execute();


        $numero=$resultado->rowCount();//devuelve el numero de filas encontras con el siguiente registro

        if($numero >= 1){//Si encontro un registro
            while($row=$resultado->fetch(PDO::FETCH_ASSOC)){
                if(password_verify($this->password,$row["passwordUsuario"])){
                    $id=$row['idUsuario'];//Toma el Id del usuario
                }
            }
        }

        return $id;//Devuelve el id para el usuario
    }

    public function getById($id){
        /*Recibe el id del usuario que ha ingresado el sistema, hace una consulta de sus datos e inicia sesion
         */
        $query = $this->DB()->query("SELECT * FROM usuario WHERE idUsuario = '$id'"); // Consulta SQL
        if($row = $query->fetch(PDO::FETCH_ASSOC)){
        $_SESSION['NOMBREUSUARIO'] = $row['nombreUsuario'];
        $_SESSION['USUARIO'] = $row['usuario'];
        $_SESSION['APELLIDOUSUARIO']=$row['apellidoUsuario'];
        $_SESSION['CEDULAUSUARIO']=$row['cedulaUsuario'];
        $_SESSION['TELEFONOUSUARIO']=$row['telefonoUsuario'];
        $_SESSION['EMAILUSUARIO']=$row['emailUsuario'];
        $_SESSION['ROLUSUARIO']=$row['rolUsuario'];
        }
    }



}
?>