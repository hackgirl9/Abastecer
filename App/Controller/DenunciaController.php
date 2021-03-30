<?php
    use Spipu\Html2Pdf\Html2Pdf;
    class DenunciaController extends BaseController{
        public function __construct(){ // Constructor de la clase
            parent::__construct(); // Ejecuta el constructor del padre.
            require_once 'Libs/Vendor/autoload.php';            
        }

        public function index(){
            $this->view('Denuncia/Denuncia');
        }

        public function register(){
            $this->view('Denuncia/RegistrarDenuncia');
        }

        public function  read(){


            $this->view('Denuncia/ConsultarDenuncia');
        }


        public function readAll(){
            $denuncia = new Denuncia();
            $numRegistros=4;
            $numFilas=$denuncia->countFilasAll();


            if ($numFilas>=1) {
                $datosPagination=$this->pagination($numRegistros,$numFilas);
                $totalPagina=$datosPagination["totalPagina"];
                $allDenuncias =$denuncia->getAll($numRegistros,$datosPagination["inicio"]);
                $totalPagina=$datosPagination["totalPagina"];
                
            }else{
                $allDenuncias=null;
                $totalPagina=null;
            }

            $this->sendAjax(array("allDenuncias"=>$allDenuncias,"totalPagina"=>$totalPagina));

            
        }

        public function filtrarDenuncia(){
            $denuncia=new denuncia();
            $desde=$this->formatDateAmerican($_GET["desde"]);
            $hasta=$this->formatDateAmerican($_GET["hasta"]);
            $numRegistros=3;


            $numFilas=$denuncia->countFilasByFecha($desde,$hasta);

            if($numFilas>=1){/*Si el numero es mayor=>1 quiere decir qque si hay registros*/

                $datosPagination=$this->pagination($numRegistros,$numFilas);
                $totalPagina=$datosPagination["totalPagina"];
                $allAtenciones =$atencion->getAllByFechaAtencion($desde,$hasta,$numRegistros,$datosPagination["inicio"]);

            }else{/*Si no, no hay registro que coicidan por la tanto devuelvo null*/
                $allAtenciones=null;
                $totalPagina=null;
            }

            $this->sendAjax(array("allAtenciones"=>$allAtenciones,'totalPagina'=>$totalPagina));
        }


        public function details(){

            $id =$_GET["idDenuncia"];

            $denuncia=new Denuncia();

            $datos=$denuncia->muestraCompleta();
            $this->viewArray('Denuncia/DetallesDenuncia',array("datos"=>$datos,"id"=>$id));
        }

        public function verificarCedula(){
            $denuncia= new Denuncia();

            $cedula=$_POST['cedula'];

            $denuncia->setCedulaIntegrante($cedula);

            $result=$denuncia->getID();

            $filas=$denuncia->countFilasAll()+1;

            $filas1=$denuncia->countNcontrol($filas);

            //var_dump($filas1);

            if ($filas1===true) {
                $filas+=1;
            }

            //var_dump($filas);

            $result=$denuncia->getID();


            $resultado=array($result,$filas);

            $this->sendAjax($resultado);
        }

        public function crear(){
            
            $denuncia = new Denuncia();
                
            $date =$this->formatDateAmerican($_POST['fecha']);
            $ci_denunciante = $_POST['idIntegrante'];
            $num_oficio = $_POST['nOficio'];
            $status = $_POST['status'];
            $descripcion =ucwords($_POST['descripcion']);

            $denuncia->setnControl($num_oficio);
            $denuncia->setFechaDenuncia($date);
            $denuncia->setObservacion($descripcion);
            $denuncia->setStatusDenuncia($status);
            $denuncia->setIdintegrante($ci_denunciante);

            $save=$denuncia->insert();

            $this->sendAjax($save);

        }

        public function delete(){
            $id =$_POST["id"];
            $denuncia = new Denuncia(); 
            $denuncia->delete($id);
            $this->redirect('Denuncia', 'read');
        }
        
        public function update(){

            $denuncia= new Denuncia();
   
            $denuncia->setIdDenuncia($_POST['id']);
            $fecha=$this->formatDateAmerican($_POST['fecha']);
            $denuncia->setFechaDenuncia($fecha);
            $denuncia->setObservacion($_POST['motivo']);
            
            $save=$denuncia->update();

            $this->sendAjax($save);

        }

        public function buscar(){

            $denuncia= new Denuncia();

            $ncontrol=$_POST['buscar'];
            $denuncia->setnControl($ncontrol);

            $buscar=$denuncia->buscar();

            $this->sendAjax($buscar);
        }

      

        public function getPDF(){
            $denuncia= new Denuncia();

            $id=$_GET['Id'];
            $denuncia->setIdDenuncia($id);

            $datos=$denuncia->muestraCompleta();

            ob_start(); // Recoge todo el contenido de un include.
            require_once 'View/Denuncia/DenunciaReporteView.php'; 
            $html = ob_get_clean(); // Guarda el contenido del archivo en una variable.
            $reporte = new Html2Pdf(); // Instancia el objeto html2pdf
            $reporte->writeHTML($html); // Escribe la vista en el pdf.
            $reporte->output('Denuncia.pdf'); // Imprime el pdf.
        }


        public function atender(){
            $denuncia= new Denuncia();

            if (!empty($_POST['atender'])) {
                $denuncia->setStatusDenuncia($_POST['atender']);
            }

            if (!empty($_POST['id'])) {
                $denuncia->setIdDenuncia($_POST['id']);
            }

            $datos=$denuncia->atender();
        
        }

        
    }
?>