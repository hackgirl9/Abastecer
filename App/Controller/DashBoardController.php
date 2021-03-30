<?php
class DashBoardController extends BaseController{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $dashBoard=new DashBoard();

        $novedades['numCLAP']=$dashBoard->countCLAP();
        $novedades['numAtenciones']=$dashBoard->countAtenciones();
        $novedades['familiasBene']=$dashBoard->countfamiliasBene();
        $novedades['bolsasEntregadas']=$dashBoard->countBolsasEntregadas();


        $allDenuncias=$dashBoard->allDenuncias();
        $allSolicitudes=$dashBoard->allSolicitud();

        $this->viewArray('DashBoard/Dashboard',array("novedades"=>$novedades,'allDenuncias'=>$allDenuncias,'allSolicitud'=>$allSolicitudes));



    }

}