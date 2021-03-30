<?php
    class AjaxHelperController extends BaseController{
        public function __construct(){
            parent::__construct();
        }

        public function getClap(){
            $helper = new AjaxData();
            $helper->setParroquia($_POST['parroquia']);
            $data = $helper->getClapsByParroquia();
            header('Content-Type: application/json');
            echo json_encode($data);
        }
    }
?>