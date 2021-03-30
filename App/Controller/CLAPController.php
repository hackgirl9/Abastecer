<?php
    class CLAPController extends BaseController{
        public function __construct(){ // Constructor de la clase
            parent::__construct(); // Ejecuta el constructor del padre.
        }

        public function index(){ // Redirecciona a la vista principal del módulo.
            $this->view('CLAP/CLAP');
        }

        public function register(){ // Redirecciona a la vista de registro del módulo.
            $this->view("CLAP/RegistrarCLAP");
        }

        public function read(){ // Redirecciona a la vista de registro del módulo.
            $this->view("CLAP/ConsultarCLAP");
        }

        public function insertData(){ // Se encarga de registrar los datos a la base de datos.
            $clap = new CLAP(); // Instancia un objeto tipo CLAP.
            $codigoClap = $_POST['codigoClap']; // Lo almacena en la variable.
            $codigoSala = $_POST['codigoSala']; // Lo almacena en la variable.
            $nombreClap = $_POST['nombreClap']; // Lo almacena en la variable.
            $rifClap = $_POST['rifClap']; // Lo almacena en la variable.
            $parroquia = $_POST['parroquia']; // Lo almacena en la variable.
            $emailClap = $_POST['emailClap']; // Lo almacena en la variable.
            $tlfClap = $_POST['tlfClap']; // Lo almacena en la variable.
            $nombreComunidad = $_POST['nombreComunidad']; // Lo almacena en la variable.
            $limiteNorteComunidad = $_POST['limiteNorteComunidad']; // Lo almacena en la variable.
            $limiteSurComunidad = $_POST['limiteSurComunidad']; // Lo almacena en la variable.
            $limiteEsteComunidad = $_POST['limiteEsteComunidad']; // Lo almacena en la variable.
            $limiteOesteComunidad = $_POST['limiteOesteComunidad']; // Lo almacena en la variable.
            $nombreConsejoComunal = $_POST['nombreConsejoComunal']; // Lo almacena en la variable.
            $rifConsejoComunal = $_POST['rifConsejoComunal']; // Lo almacena en la variable.
            $zonaSilencio = $_POST['zonaSilencio']; // Lo almacena en la variable.
            $eje = $_POST['eje']; // Lo almacena en la variable.
            $revisadoEnlace = $_POST['revisadoEnlace']; // Lo almacena en la variable.
            $cantManzaneros = $_POST['cantManzaneros']; // Lo almacena en la variable.
            $cantViviendas = $_POST['cantViviendas']; // Lo almacena en la variable.
            $cantFamilias = $_POST['cantFamilias']; // Lo almacena en la variable.
            $estado = $_POST['estado']; // Lo almacena en la variable.
            $idEmpresa = $_POST['idEmpresa']; // Lo almacena en la variable.
            // $idEnlace = $_POST['idEnlace']; // Lo almacena en la variable.
            $clap->setCodigoClap($codigoClap);
            $clap->setCodigoSala($codigoSala);
            $clap->setNombreClap(ucwords($nombreClap));
            $clap->setRifClap(strtoupper($rifClap));
            $clap->setParroquia($parroquia);
            $clap->setEmailClap($emailClap);
            $clap->setTlfClap($tlfClap);
            $clap->setNombreComunidad(ucwords($nombreComunidad));
            $clap->setLimiteNorteComunidad(ucwords($limiteNorteComunidad));
            $clap->setLimiteSurComunidad(ucwords($limiteSurComunidad));
            $clap->setLimiteEsteComunidad(ucwords($limiteEsteComunidad));
            $clap->setLimiteOesteComunidad(ucwords($limiteOesteComunidad));
            $clap->setNombreConsejoComunal(ucwords($nombreConsejoComunal));
            $clap->setRifConsejoComunal(strtoupper($rifConsejoComunal));
            $clap->setZonaSilencio($zonaSilencio);
            $clap->setEje($eje);
            $clap->setRevisadoEnlace($revisadoEnlace);
            $clap->setCantManzaneros($cantManzaneros);
            $clap->setCantViviendas($cantViviendas);
            $clap->setCantFamilias($cantFamilias);
            $clap->setEstado($estado);
            $clap->setIdEmpresa($idEmpresa);
            // var_dump($clap);
            $clap->setIdEnlace(3);
            $data = $clap->insert(); // Inserta los atributos a la base de datos.
            $this->sendAjax($data);
        }

        public function readData(){ // Se encarga de mostrar los registros de una consulta.
            $clap = new CLAP(); // Instancia un objeto de tipo CLAP
            $totalRegisters = 5;
            $totalRows = $clap->countAllRows();
            if($totalRows >= 1){
                $paginationData = $this->pagination($totalRegisters,$totalRows);
                $totalPages = $paginationData['totalPagina'];
                $allClaps = $clap->getAll($totalRegisters,$paginationData['inicio']);
            }
            else{
                $allClaps = null;
                $totalPages = null;
            }
            $data = array("allClaps" => $allClaps,"totalPagina" => $totalPages);
            $this->sendAjax($data);
        }

        public function updateData(){ // Se encarga de modificar un registro en la base de datos.
            $clap = new CLAP(); // Instancia un objeto tipo CLAP.
            $idClap = $_POST['idClap']; // Lo almacena en la variable.
            $codigoClap = $_POST['codigoClap']; // Lo almacena en la variable.
            $codigoSala = $_POST['codigoSala']; // Lo almacena en la variable.
            $nombreClap = $_POST['nombreClap']; // Lo almacena en la variable.
            $rifClap = $_POST['rifClap']; // Lo almacena en la variable.
            $parroquia = $_POST['parroquia']; // Lo almacena en la variable.
            $emailClap = $_POST['emailClap']; // Lo almacena en la variable.
            $tlfClap = $_POST['tlfClap']; // Lo almacena en la variable.
            $nombreComunidad = $_POST['nombreComunidad']; // Lo almacena en la variable.
            $limiteNorteComunidad = $_POST['limiteNorteComunidad']; // Lo almacena en la variable.
            $limiteSurComunidad = $_POST['limiteSurComunidad']; // Lo almacena en la variable.
            $limiteEsteComunidad = $_POST['limiteEsteComunidad']; // Lo almacena en la variable.
            $limiteOesteComunidad = $_POST['limiteOesteComunidad']; // Lo almacena en la variable.
            $nombreConsejoComunal = $_POST['nombreConsejoComunal']; // Lo almacena en la variable.
            $rifConsejoComunal = $_POST['rifConsejoComunal']; // Lo almacena en la variable.
            $zonaSilencio = $_POST['zonaSilencio']; // Lo almacena en la variable.
            $eje = $_POST['eje']; // Lo almacena en la variable.
            $revisadoEnlace = $_POST['revisadoEnlace']; // Lo almacena en la variable.
            $cantManzaneros = $_POST['cantManzaneros']; // Lo almacena en la variable.
            $cantViviendas = $_POST['cantViviendas']; // Lo almacena en la variable.
            $cantFamilias = $_POST['cantFamilias']; // Lo almacena en la variable.
            $estado = $_POST['estado']; // Lo almacena en la variable.
            $idEmpresa = $_POST['idEmpresa']; // Lo almacena en la variable.
            $idEnlace = $_POST['idEnlace']; // Lo almacena en la variable.
            // Establece los atributos
            $clap->setIdClap($idClap);
            $clap->setCodigoClap($codigoClap);
            $clap->setCodigoSala($codigoSala);
            $clap->setNombreClap(ucwords($nombreClap));
            $clap->setRifClap(strtoupper($rifClap));
            $clap->setParroquia($parroquia);
            $clap->setEmailClap($emailClap);
            $clap->setTlfClap($tlfClap);
            $clap->setNombreComunidad(ucwords($nombreComunidad));
            $clap->setLimiteNorteComunidad(ucwords($limiteNorteComunidad));
            $clap->setLimiteSurComunidad(ucwords($limiteSurComunidad));
            $clap->setLimiteEsteComunidad(ucwords($limiteEsteComunidad));
            $clap->setLimiteOesteComunidad(ucwords($limiteOesteComunidad));
            $clap->setNombreConsejoComunal(ucwords($nombreConsejoComunal));
            $clap->setRifConsejoComunal(strtoupper($rifConsejoComunal));
            $clap->setZonaSilencio($zonaSilencio);
            $clap->setEje($eje);
            $clap->setRevisadoEnlace($revisadoEnlace);
            $clap->setCantManzaneros($cantManzaneros);
            $clap->setCantViviendas($cantViviendas);
            $clap->setCantFamilias($cantFamilias);
            $clap->setEstado($estado);
            $clap->setIdEmpresa($idEmpresa);
            // var_dump($clap);
            $clap->setIdEnlace($idEnlace);
            $data = $clap->update(); // Inserta los atributos a la base de datos.
            $this->sendAjax($data);
            // $this->redirect('CLAP','index'); // Al final, redirecciona a la vista principal.
        }

        public function deleteData(){ // Se encarga de eliminar un registro en la base de datos.    
            $id = (int)$_GET['idClap']; // Transforma el id a entero.
            $clap = new CLAP(); // Instancia un objeto tipo CLAP.
            $data = $clap->delete($id); // Elimina el valor del id.
            $this->sendAjax($data);
        }
        
        public function details(){ // Redirecciona a la vista de detalles con los datos de un CLAP
            if(isset($_GET['idClap'])){ // Si se ha definido el id por la URL.
                $id = (int)$_GET['idClap']; // Transforma el id en un entero.
                $clap = new CLAP(); // Instancia un objeto de tipo CLAP
                $register = $clap->getById($id); // Obtiene los datos de un registro
                $this->viewArray('CLAP/DetallesCLAP',array( // Pasa los datos a una vista.
                    'register'=> $register
                ));
            }
        }

        public function getByParroquia(){ // Consulta los datos por parroquia.
            $clap = new CLAP();
            $parroquia = $_GET['parroquia'];
            $totalRegisters = 5;
            $clap->setParroquia($parroquia);
            $totalRows = $clap->countAllRowsByParroquia();
            if($totalRows >= 1){
                $paginationData = $this->pagination($totalRegisters,$totalRows);
                $totalPages = $paginationData['totalPagina'];
                $allClaps = $clap->getClapsByParroquia($parroquia,$totalRegisters,$paginationData['inicio']);
            }
            else{
                $allClaps = null;
                $totalPages = null;
            }
            $data = array("allClaps" => $allClaps, "totalPagina" => $totalPages);
            $this->sendAjax($data);
        }

        public function getClapById(){
            $id = (int)$_GET['idClap']; // Transforma el id a entero.
            $clap = new CLAP(); // Instancia un objeto tipo CLAP.
            $data = $clap->getById($id); // Elimina el valor del id.
            $this->sendAjax($data);
        }

        public function suspenderClap(){
            $id = (int)$_GET['idClap']; // Transforma el id a entero.
            $clap = new CLAP(); // Instancia un objeto tipo CLAP.
            $clap->setIdClap($id); // Setea el id a eliminar.
            $data = $clap->suspenderClap(); // Elimina el valor del id.
            $this->sendAjax($data);
        }

        public function admitirClap(){
            $id = (int)$_GET['idClap']; // Transforma el id a entero.
            $clap = new CLAP(); // Instancia un objeto tipo CLAP.
            $clap->setIdClap($id); // Setea el id a eliminar.
            $data = $clap->admitirClap(); // Elimina el valor del id.
            $this->sendAjax($data);
        }

        public function createClapStructure(){
            $this->view('EstructuraCLAP/GestionarEstructura');
        }
    }
?>