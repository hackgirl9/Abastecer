<?php
    class helperCLAPController extends BaseController {
        public function __construct(){
            parent::__construct();
        }


        public function getCLAP(){

            $helperClAP=new getCLAP();
            $helperClAP->setParroquia($_POST["parroquia"]);
            $datos=$helperClAP->getAllClapById();
            $this->sendAjax($datos);
        }
    }



?>