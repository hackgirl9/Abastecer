<?php
    class IntegranteFamiliaController extends BaseController{
        public function __construct(){ // Constructor de la clase
            parent::__construct(); // Ejecuta el constructor del padre.
            
        }

    public function gestionarIntegrante(){
        $this->view('Familia/ConsultarFamilia');
        }

    public function vistaUpdate(){
        $id =$_GET['idIntegrante'];
        $integrate = new Integrante();
        $resultado = $integrate->getById($id);
        $this->viewArray('Familia/UpdateIntegrante',array("resultado"=>$resultado));
        }


    public function registerIntegrante()
    { // Registra datos en la base de datos
            $integrate = new Integrante(); // Instancia el objeto Integrante
            $fecha = $this->formatDateAmerican($_POST['fechaNacimiento']);
            $idfamilia= $integrate->ultimafamilia();
            //Envia los Datos a el Modelo
            $integrate->setNombreIntegrante($_POST['nombreIntegrante']);
            $integrate->setApellidoIntegrante($_POST['apellidoIntegrante']);
            $integrate->setCedulaIntegrante($_POST['ciIntegrante']);
            $integrate->setNacimientoIntegrante($fecha);
            $integrate->setEmailIntegrante($_POST['emailIntegrante']);
            $integrate->setTelefonoIntegrante($_POST['telefonoIntegrante']);
            $integrate->setSexoIntegrante($_POST['sexoIntegrante']);
            $integrate->setRolIntegrante($_POST['rolIntegrante']);
            $integrate->setCodigoIntegrante($_POST['codCarnet']);
            $integrate->setSerialIntegrante($_POST['serialCarnet']);
            $integrate->setManzanero($_POST['manzanero']); 
            $integrate->setFamilia($idfamilia->idFamilia);
             //Lo manda para el Modelo, la Función Insertar
            $data = $integrate->insert();
            $this->sendAjax($data);
    }

     public function vistaUpdateIntegrante(){
         $id =$_GET['idIntegrante'];
        $integrate = new Integrante();
        $resultado = $integrate->getById($id);
        $this->viewArray('Familia/formUpdateIntegrante',array("resultado"=>$resultado));
        }



    public function updateIntegrante()
    {
            $fecha = $this->formatDateAmerican($_POST['fechaNacimiento']);
            $integrate = new Integrante(); // Instancia el objeto Integrante
            $integrate->setIdIntegrante($_POST['idIntegrante']);
            $integrate->setNombreIntegrante($_POST['nombreIntegrante']);
            $integrate->setApellidoIntegrante($_POST['apellidoIntegrante']);
            $integrate->setCedulaIntegrante($_POST['ciIntegrante']);
            $integrate->setNacimientoIntegrante($fecha);
            $integrate->setEmailIntegrante($_POST['emailIntegrante']);
            $integrate->setTelefonoIntegrante($_POST['telefonoIntegrante']);
            $integrate->setSexoIntegrante($_POST['sexoIntegrante']);
            $integrate->setRolIntegrante($_POST['rolIntegrante']);
            $integrate->setCodigoIntegrante($_POST['codCarnet']);
            $integrate->setSerialIntegrante($_POST['serialCarnet']);
            $integrate->setManzanero($_POST['manzanero']);
            $integrate->setFamilia($_POST['idFamilia']);
            
        $save = $integrate->update();


         $this->redirect('Familia', 'gestionarIntegrante');
    }

    public function deleteIntegrante()
    {
       if (isset($_GET['idIntegrante'])) {
            $id =$_GET['idIntegrante'];
            $integrate = new Integrante();
            $data = $integrate->delete($id);
            $this->sendAjax($data);
        }
        
        $this->redirect('Familia', 'detailsIntegrante');  
         
    }

    public function detailsIntegrante()
    {
        
        $id =$_GET['idIntegrante'];
        $integrate = new Integrante();
        $resultado = $integrate->getById($id);
        $this->viewArray('Familia/DetallesIntegranteFamilia',array("resultado"=>$resultado));

    }

    public function Anterior()
    {
         $this->redirect('Familia', 'gestionarIntegrante');
    }

    public function newIntegrante()
    {
        $id =$_GET['idFamilia'];
            $family = new Familia();
            $register = $family->getById($id);
            $this->viewArray('Familia/RegistrarNewIntegrante',array("register"=>$register));

    }
    

    public function registerNewIntegrante()
    { // Registra datos en la base de datos
            $integrate = new Integrante(); // Instancia el objeto Integrante
            
            //Envia los Datos a el Modelo
            $integrate->setFamilia($_POST['idFamilia']);
            $integrate->setNombreIntegrante($_POST['nombreIntegrante']);
            $integrate->setApellidoIntegrante($_POST['apellidoIntegrante']);
            $integrate->setCedulaIntegrante($_POST['ciIntegrante']);
            $fecha = $this->formatDateAmerican($_POST['fechaNacimiento']);
            $integrate->setNacimientoIntegrante($fecha);
            $integrate->setEmailIntegrante($_POST['emailIntegrante']);
            $integrate->setTelefonoIntegrante($_POST['telefonoIntegrante']);
            $integrate->setSexoIntegrante($_POST['sexoIntegrante']);
            $integrate->setRolIntegrante($_POST['rolIntegrante']);
            $integrate->setCodigoIntegrante($_POST['codCarnet']);
            $integrate->setSerialIntegrante($_POST['serialCarnet']);
            $integrate->setManzanero($_POST['manzanero']); 
             //Lo manda para el Modelo, la Función Insertar
            $data = $integrate->insert();
         $this->redirect('Familia', 'gestionarIntegrante');
        

    }

   
         public function compruebaCI(){

        $integrate = new Integrante();

        $integrate->setCedulaIntegrante($_POST['ciIntegrante']);
        $datos = $integrate->compruebaCedula();
        $this->sendAjax($datos);


    }

   



    }
?>