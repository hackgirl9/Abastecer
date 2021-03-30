<?php
    class EnlacePoliticoController extends BaseController{
        public function __construct(){ // Constructor de la clase
            parent::__construct(); // Ejecuta el constructor del padre.
        }

        public function index(){ // Redirecciona a la vista principal del módulo.
            $this->view('EnlacePolitico/Enlace');
        }

        public function register(){ // Redirecciona a la vista de registro del módulo.
            $this->view('EnlacePolitico/RegistrarEnlace');
        }

        public function insertData(){ // Se encarga de registrar los datos en la base de datos.
            $enlace = new Enlace(); // Instancia un objeto de tipo Enlace.
            $nombreEnlace = $_POST['nombreEnlace']; // Lo almacena en la variable.
            $apellidoEnlace = $_POST['apellidoEnlace']; // Lo almacena en la variable.
            $parroquiaEncargado = $_POST['parroquiaEncargado']; // Lo almacena en la variable.
            $enlace->setNombreEnlace($nombreEnlace);
            $enlace->setApellidoEnlace($apellidoEnlace);
            $enlace->setParroquiaEncargado($parroquiaEncargado);
            $data = $enlace->insert(); // Inserta en la base de datos.
            $this->sendAjax($data);
        }

        public function readData(){ // Se encarga de mostrar los registros de una consulta.
            $enlace = new Enlace(); // Instancia un objeto de tipo Enlace.
            $totalRegisters = 5; // Total de registros por página.
            $totalRows = $enlace->countAllRows(); // Obtiene el número de registros de la tabla.
            if($totalRows >= 1){ // Si la tabla tiene más de un registro...
                $paginationData = $this->pagination($totalRegisters,$totalRows); // Paginá los datos.
                $totalPages = $paginationData['totalPagina']; // Obtiene la cantidad de paginas que tendrá la paginación.
                $allEnlaces = $enlace->getAll($totalRegisters,$paginationData['inicio']); // Obtiene todos los registros de la tabla.
            }
            else{
                $allEnlaces = null;
                $totalPages = null;
            }
            $this->viewArray('EnlacePolitico/ConsultarEnlace',array( // Pasa los registros a la vista.
                'allEnlaces' => $allEnlaces,
                'totalPagina' => $totalPages
            ));
        }

        public function deleteData(){ // Se encarga de eliminar un registro en la base de datos.
            $id = (int)$_GET['idEnlace']; // Transforma el id en un entero.
            $enlace = new Enlace(); // Instancia un objeto de tipo Enlace.
            $data = $enlace->delete($id); // Elimina el registro.
            $this->sendAjax($data);
        }

        public function getEnlaceByParroquia(){ // Se encarga de obtener un enlace politico por la parroqui
            $parroquiaEncargado = $_POST['parroquia']; // Obtiene la parroquia.
            $enlace = new Enlace(); // Instancia un objeto tipo Enlace();
            $enlace->setParroquiaEncargado($parroquiaEncargado); // Setea la parroquia
            $data = $enlace->getEnlaceByParroquia(); // Consulta el registro
            $this->sendAjax($data); // Envia los datos por ajax.
        }
    }
?>