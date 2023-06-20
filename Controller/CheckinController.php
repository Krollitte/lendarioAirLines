<?php 
require_once "Model/CheckIn.php";

class CheckInController{
    public function processa($acao){
       
       if($acao=="FC"){
            $checkin = new CheckIn();
            $checkin->setUsuarioId($_SESSION['usuario']['idUsuario']);
            $checkin->setCodPassagem($_POST['codPassagem']);
            $checkin->validaCheckin();
            require_once "View/home.php";
        }
    }
}
?>