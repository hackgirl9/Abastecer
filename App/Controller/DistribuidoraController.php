<?php
    class DistribuidoraController extends BaseController{
        public function __construct(){ // Constructor de la clase
            parent::__construct(); // Ejecuta el constructor del padre.
        }

        public function index(){ // Redirecciona a la vista principal del módulo.
            $this->view('Distribuidora/Distribuidora');
        }

        public function register(){ // Redirecciona a la vista de registro del módulo.
            $this->view('Distribuidora/RegistrarDistribuidora');
        }

        public function insertData(){ // Se encarga de registrar los datos en la base de datos.
            $empresa = new Distribuidora(); // Instancia un objeto de tipo Distribuidora
            $nombreEmpresa = $_POST['nombreEmpresa']; // Lo almacena en la variable.
            $rifEmpresa = $_POST['rifEmpresa']; // Lo almacena en la variable.
            $emailEmpresa = $_POST['emailEmpresa']; // Lo almacena en la variable.
            $tlfEmpresa = $_POST['tlfEmpresa']; // Lo almacena en la variable.
            // Establece los atributos
            $empresa->setNombreEmpresa(strtoupper($nombreEmpresa));
            $empresa->setRifEmpresa(strtoupper($rifEmpresa));
            $empresa->setEmailEmpresa($emailEmpresa);
            $empresa->setTlfEmpresa($tlfEmpresa);
            $data = $empresa->insert(); // Inserta en la base de datos
            $this->sendAjax($data); // Ejecuta la petición AJAX
        }
 
        public function readData(){ // Se encarga de mostrar los registros de una consulta.
            $empresa = new Distribuidora(); // Instancia un objeto de tipo Distribuidora
            $totalRegisters = 5; // Total de registros por página.
            $totalRows = $empresa->countAllRows(); // Obtiene el número de registros de la tabla.
            if($totalRows >= 1){ // Si la tabla tiene más de un registro...
                $paginationData = $this->pagination($totalRegisters,$totalRows); // Paginá los datos.
                $totalPages = $paginationData['totalPagina']; // Obtiene la cantidad de paginas que tendrá la paginación.
                $allEmpresas = $empresa->getAll($totalRegisters,$paginationData['inicio']); // Obtiene todos los registros de la tabla.
            }
            else{
                $allEmpresas = null;
                $totalPages = null;
            }
            $this->viewArray('Distribuidora/ConsultarDistribuidora',array( // Pasa los registros a la vista.
                "allEmpresas" => $allEmpresas,
                'totalPagina' => $totalPages
            ));
        }

        public function deleteData(){ // Se encarga de eliminar un registro en la base de datos.
            $id = (int)$_GET['idEmpresa']; // Transforma el id en un entero.
            $empresa = new Distribuidora(); // Instancia un objeto de tipo Distribuidora.
            $data = $empresa->delete($id); // Elimina el registro.
            $this->sendAjax($data);
        }

        public function getAllEmpresas(){
            $empresa = new Distribuidora();
            $data = $empresa->getAllEmpresas();
            $this->sendAjax($data);
        }
    }
?>