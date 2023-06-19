<?php 
require_once "Model/CheckIn.php";

class CheckInController{
    public function processa($acao){
        if($acao == "PC"){
            $checkin = new CheckIn();
            $checkin->setCodPassagem($_POST['codPassagem']);
            $checkin->setUsuarioId($_SESSION['usuario']['idUsuario']);
            $resultado = $checkin->pesquisaCheckIn();
            if(!is_null($resultado)){
                $voo =$resultado[0];
                $usuario = $resultado[1];
                $validaCheckin = $resultado[2];
                require_once "teladocheckin";
            }else {
                echo '<script type="text/javascript">
                     alert("Reserva Invalida!");
                  </script>';
                require_once "View/index.php";
            }
        }else if($acao=="FC"){
            $checkin = new CheckIn();
            $checkin->setCodPassagem($_POST['codPassagem']);
            $checkin->validaCheckin();
            require_once "View/home.php";
        }
    }
}
?>