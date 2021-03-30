<?php
    class FamiliaController extends BaseController{
        public function __construct(){ // Constructor de la clase
            parent::__construct(); // Ejecuta el constructor del padre.
            
        }

        // Consultas -> (Familia en general)
        public function index(){
            $this->view('Familia/Familia');
        }

        public function registerFamily(){
            $this->view('Familia/RegistrarFamilia');
        }

        public function registerIntegranteFamilia(){
            $this->view("Familia/RegistrarIntegranteFamilia");
        }

        public function readFamily(){
            $this->view('Familia/ConsultarFamilia');
        }

        public function vistaUpdate(){
                $id =$_GET['idFamilia'];
                $family = new Familia();
                $register = $family->getById($id);
                $this->viewArray('Familia/formUpdateFamilia',array("register"=>$register));
        }

        public function gestionarFamilia(){
            $family = new Familia(); // Instancia un objeto llamado Familia
            $allFamily = $family->traerTodo(); // Obtiene los campos gracias al getter de la clase y se almacenan.
        
            $this->viewArray('Familia/ConsultarFamilia',array("allFamily" => $allFamily));
        }

        public function registerFamilia(){ // Registra datos en la base de datos
                //var_dump();
                //exit();
            $family = new Familia(); // Instancia el objeto Familia
                
            $family->setClapFamilia($_POST['idClap']);    
            $family->setManzanaFamilia($_POST['numManzana']);
            $family->setViviendaFamilia($_POST['numVivienda']);
            $family->setDireccionFamilia($_POST['direccionFamilia']);
            $family->setGrupoFamilia($_POST['grupoFamiliar']);
            $family->setApellidoFamilia($_POST['apellidoFamilia']);
            $family->setMercadosFamilia($_POST['cantMercadosAsignados']);
            
            $data = $family->insert();
            $this->sendAjax($data);
        }

        public function updateFamilia()
        {
            $family = new Familia(); // Instancia el objeto Familia 


            $family->setIdFamilia($_POST['idFamilia']);
            $family->setGrupoFamilia($_POST['grupoFamiliar']);
            $family->setApellidoFamilia($_POST['apellidoFamilia']);
            $family->setDireccionFamilia($_POST['direccionFamilia']);
            $family->setViviendaFamilia($_POST['numVivienda']);
            $family->setManzanaFamilia($_POST['numManzana']);
            $family->setMercadosFamilia($_POST['cantMercadosAsignados']);
            $family->setClapFamilia($_POST['idClap']);
            $save = $family->update();

        $this->redirect('Familia', 'readFamilia');
                
        }

        public function deleteFamilia()
        {
            if(isset($_GET['idFamilia'])){
                $id = $_GET['idFamilia'];
                $family = new Familia();
                $data = $family->delete($id);
                $this->sendAjax($data);
            }
            $this->redirect('Familia', 'readFamilia');
        }   
            
    
          
         

        public function detailsFamilia()
        {

            $id =$_GET['idFamilia'];
            $family = new Familia();
            $register = $family->getById($id);
            $this->viewArray('Familia/DetallesFamilia',array("register"=>$register));
        }

        /*
            
        public function compruebaGF()
        {

            $family = new Familia();

            $family->setGrupoFamilia($_POST['grupoFamiliar']);
            $datos = $family->compruebaGrupoFamilia();
            $this->sendAjax($datos);
        }
        */
             
        public function filtradoFamilia()
        {

            $family = new Familia();

            $family->setClapFamilia($_POST['idClap']);
            $allFamily = $family->filtrado();

            $this->viewArray('Familia/ConsultarFamilia',array("allFamily"=>$allFamily));

        }

        }
        
        

        

?>