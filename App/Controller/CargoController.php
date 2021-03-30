<?php
    class CargoController extends BaseController{
        public function __construct(){ // Constructor de la clase
            parent::__construct(); // Ejecuta el constructor del padre.
            
        }

        public function index(){ // Redirecciona a la vista principal del módulo.
            $this->view('Cargo/Cargo');
        }

        public function register(){ // Redirecciona a la vista de registro del módulo.
            $this->view('Cargo/RegistrarCargo');
        }

        public function insertData(){
            $cargo = new Cargo(); // Instancia el objeto
            $cargoRol = $_POST['cargoRol']; // Lo almacena en la variable.
            $cargo->setNombreCargo(strtoupper($cargoRol)); // Establece el cargo.
            $data = $cargo->insert(); // Inserta en la base de datos.
            $this->sendAjax($data); // Ejecuta una petición AJAX
        }

        public function readData(){
            $cargo = new Cargo(); // Instancia el objeto
            $totalRegisters = 5;
            $totalRows = $cargo->countAllRows();
            if($totalRows >= 1){
                $paginationData = $this->pagination($totalRegisters,$totalRows);
                $totalPages = $paginationData['totalPagina'];
                $allCargos = $cargo->getAll($totalRegisters,$paginationData['inicio']);
            }
            else{
                $allCargos = null;
                $totalPages = null;
            }
            $this->viewArray('Cargo/ConsultarCargo',array( // Pasa los registros a la vista.
                'allCargos' => $allCargos,
                'totalPagina' => $totalPages
            ));
        }

        public function readData_page(){
            $cargo = new Cargo();
            $allCargos = $cargo->getAll_2();
            $this->viewArray('Cargo/ConsultarCargo',array('allCargos' => $allCargos));
        }

        public function getAllCargos(){
            $cargo = new Cargo();
            $data = $cargo->getAllCargos();
            $this->sendAjax($data);
        }
    }
?>