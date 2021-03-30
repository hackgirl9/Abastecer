<?php
    use Spipu\Html2Pdf\Html2Pdf;
    class ReporteController extends BaseController{
        public function __construct(){ // Constructor de la clase
            parent::__construct(); // Ejecuta el constructor del padre.
            require_once 'Libs/Vendor/autoload.php';            
        }

        public function index(){
            $reporte = new Reporte();
            $allClaps = $reporte->getClaps();
            $allAtencion=$reporte->getAtenciones();
            $allDenuncias = $reporte->getDenuncias();
            $allSolicitud = $reporte->getSolitud();
            $this->viewArray('Reporte/GenerarReporte',array(
                'allClaps' => $allClaps,
                'allDenuncias' => $allDenuncias,
                'allSolicitud'=>$allSolicitud,
                'allAtencion'=>$allAtencion
            ));

        }

        public function readCLAP(){

        }

        public function readSolicitud(){
            
        }

        public function readDenuncia(){

        }

        public function readAtencion(){

        }

        public function getClapReport(){
            $id = (int)$_GET['idClap'];
            ob_start();
            $clap = new CLAP();
            $allClap = $clap->getById($id);
            $allFamilias = $clap->getFamiliasByClap($id);
            $this->viewArray('Reporte/CLAPReporte',array('allClap' => $allClap, 'allFamilias' => $allFamilias));
            $html = ob_get_clean();
            $reporte = new Html2Pdf(); // Instancia el objeto html2pdf
            $reporte->writeHTML($html); // Escribe la vista en el pdf.
            $reporte->output("clap-".$allClap->nombreClap.".pdf"); // Imprime el pdf.   
        }

        public function atencionPDF(){
            $idAtencion=$_GET["idAtencion"];
            ob_start();
            $atencion= new Atencion();
            $allAtencion=$atencion->getAtencionById($idAtencion);
            $allBeneficiarios=$atencion->getAllFamiliaAtendidaById($idAtencion);
            $this->viewArray('Reporte/PDFAtencion',array("allAtencion"=>$allAtencion,"allBeneficiarios"=>$allBeneficiarios));
            $html=ob_get_clean();
            $reporte=new Html2Pdf('P','A4','es',true ,'UTF-8');
            $reporte->writeHTML($html);
            $reporte->output('atencion'.$allAtencion->fechaAtencion.".pdf");


        }

        public function getPDF(){
            ob_start(); // Recoge todo el contenido de un include.
            require_once 'View/Reporte/ReportePdf.php'; 
            $html = ob_get_clean(); // Guarda el contenido del archivo en una variable.
            $reporte = new Html2Pdf(); // Instancia el objeto html2pdf
            $reporte->writeHTML($html); // Escribe la vista en el pdf.
            $reporte->output('reporte.pdf'); // Imprime el pdf.
        }
    }
?>