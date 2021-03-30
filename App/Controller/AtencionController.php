<?php
    class AtencionController extends BaseController{
        public function __construct(){// Constructor de la clase
            parent::__construct(); // Ejecuta el constructor del padre.
        }

        public function index(){
            $this->view('Atencion/Atencion');
        }

        public function registerMain(){
            $this->view('Atencion/RegistrarAtencion');
        }

        public function registerPerson(){
            $this->view('Atencion/registrarBeneficiarios');
        }

        public function read(){
            $this->view('Atencion/ConsultarAtencion');
        }

        public function details(){
            $this->view('Atencion/DetallesAtencion');
        }

        public function readAll(){
            $atencion = new Atencion();
            $numRegistros = 1;//numero de registro que quiero mostrar
            $numFilas = $atencion->countFilasAll();
            if($numFilas >= 1){/*Si el numero es mayor => 1 quiere decir que si hay registros*/
                $datosPagination = $this->pagination($numRegistros,$numFilas); // Realiza la paginación
                $totalPagina = $datosPagination["totalPagina"]; // Establece el total de registros por pagina
                $allAtenciones = $atencion->getAll($numRegistros,$datosPagination["inicio"]); // Obtiene los registros paginados
                $totalPagina = $datosPagination["totalPagina"]; // ?
            }
            else{ // Si no, no hay registro que coicidan por lo tanto devuelvo null
                $allAtenciones = null;
                $totalPagina = null;
            }
            //envio los registro y total de pagina, para hacer la paginacion
           $this->sendAjax(array("allAtenciones" => $allAtenciones, "totalPagina" => $totalPagina));
        }

        public function filtrarAtencion(){
            $atencion = new Atencion(); // Instancia un objeto tipo Atencion
            $desde = $this->formatDateAmerican($_GET["desde"]); // Obtiene la fecha inicial
            $hasta = $this->formatDateAmerican($_GET["hasta"]); // Obtiene la fecha final
            $numRegistros = 1; // Numero de registros por pagina
            $numFilas = $atencion->countFilasByFecha($desde,$hasta); // Obtiene la cantidad de filas que tiene la tabla.
            if($numFilas >= 1){/*Si el numero es mayor=>1 quiere decir qque si hay registros*/
                $datosPagination = $this->pagination($numRegistros,$numFilas); // Realiza la paginación
                $totalPagina = $datosPagination["totalPagina"]; // Obtiene el total de paginas que tendra la paginación.
                $allAtenciones = $atencion->getAllByFechaAtencion($desde,$hasta,$numRegistros,$datosPagination["inicio"]); // Obtiene todos los datos filtrados y paginados.
            }
            else{/*Si no, no hay registro que coicidan por la tanto devuelvo null*/
                $allAtenciones = null;
                $totalPagina = null;
            }
            $this->sendAjax(array("allAtenciones" => $allAtenciones,'totalPagina' => $totalPagina));
        }

        public function detailsData(){
            $atencion = new Atencion(); // Instancia un objeto tipo Atencion
            $data = $atencion->getAtencionById($_GET["idAtencion"]); // Obtiene los datos por el id ingresado
            // Sumandoles Dias a la Fecha
            $newDate = DateTime::createFromFormat('d/m/Y', $data->fechaAtencion); // Instancia un objeto DateTime
            $newDate = $newDate->format('Y/m/d'); // Crea una nueva fecha con un formato distinto
            $nuevaFecha = strtotime(('+30 day'),strtotime($newDate)); // Agrega +30 dias a la fecha actual
            $fechaFormat = date("d/m/Y",$nuevaFecha); // Crea la fecha con otro formato
            //Creando nuevo posicion el array de objetos
            $data->fechaLimite = $fechaFormat;
            $this->sendAjax($data);
        }

        public function RegisterDataMain(){
            // Dandole Formato a la fecha
            $newDate = $this->formatDateAmerican($_POST["date"]);
            $atencion = new Atencion();
            $atencion->setFecha($newDate);
            $atencion->setObservacion(strtoupper($_POST["observacion"]));
            $atencion->setTipoAtencion(($_POST["tipoAtencion"]));
            //Registrando la atención
            $data = $atencion->insert();
            $this->sendAjax($data);
        }

        public  function  getAtenciones(){
            $atencion = new Atencion();
            $datos = $atencion->getAllAtenciones(); // Obtiene todas las atenciones
            $this->sendAjax($datos); // Envia los datos por ajax
        }

        public function registerDataPerson(){
            //Colocandole formato valido a la fecha
            $newDate = $this->formatDateAmerican($_POST["date"]);
            $atencion = new Atencion();
            $atencion->setFecha($newDate);
            $atencion->setIdFecha($_POST["idFecha"]);
            $atencion->setClap($_POST["idClap"]);
            $atencion->setCedula($_POST["cedula"]);
            /*Chequeos para la atención*/
            if($atencion->comprobarGrupoFamiliar()){ //Compruebo si alguien perteneciente al mismo grupo familiar ya fue atendido
                if($atencion->comprobarAtencion()){//Compruebo la fecha en que fue atendida esa persona y le sumo 30 dias y si es mayor a la igresada entonces inserto
                    $data = $atencion->insertPerson();//inserta el beneficiario
                }
                else{
                    $data = 1;//Caso contrario devuelvo 1, lo cual quiere decir que esa persona ya fue atendida.
                }
            }
            else{//si no fue atendido nadie de su grupo familiar, lo puedo registrar por primera vez
                //metodo que inserta los beneficiarios o devuelve  null si la cedula ingresada no pertenece al clap ingresado.
                $datos = $atencion->insertPerson();
                if($datos != null){//en caso de que devuelva null, quiere decir que la cedula no esta registrada en el sistema y por lo cual no pertene a ningun clap.
                    $data = $datos;
                }
                else{
                    $data = null;//devuelve null, que, lo cual quiere decir que la cedula no esta regitrada  en el sistema
                }
            }
            $this->sendAjax($data);// Envio los datos a ajax en formato json
        }

        public function generarNotification(){
            $atencion = new Atencion();
            $allNoti = $atencion->notification();
            $num = count($allNoti);
            $this->sendAjax($num);
        }

        public function  allNotificationes(){
            $atencion= new Atencion();
            $allNoti=$atencion->notification();
            $this->viewArray("Notificacion/Notificacion",array("allNoti"=>$allNoti));
        }
    }
?>