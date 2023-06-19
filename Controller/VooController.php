<?php 
require_once ("Model/Voo.php");

class VooController {
    public function processa($acao){
        if($acao=="PV"){
            $novoVoo = new Voo();
            $novoVoo->setOrigem($_POST['origem']);
            $novoVoo->setDestino($_POST['destino']);
            $dataIda=($_POST['data-ida']);
            $dataVolta =($_POST['data-retorno']);

            $novoVoo->buscaVoo($dataIda, $dataVolta);
            require_once "View/passagens.php";

        }else if($acao == "VC"){
            if($_SESSION['usuario']['idUsuario']){
                $vooIdaId = $_POST['vooIdaSelecionado'];
                
                $voo = new Voo();

                if($_POST['vooVoltaSelecionado']){
                    $vooVoltaId =($_POST['vooVoltaSelecionado']);
                    
                }else{
                    $vooVoltaId = 0;
                }

                $voo->buscaDadosVoo($vooIdaId, $vooVoltaId);
                require_once "View/resumoDaCompra.php";

            }else{
                header("Location:LOGIN");
            }

        }else if($acao =="FC"){
            $usuario = ($_POST['usuarioId']);
            $voo = new Voo();
            $voo->setVooId($_POST['idVooIda']);
            $voo->setCodigoPassagem($_POST['codPassagemIda']);
            $voo->compraVoo($usuario);

            if (($_POST['idVooVolta'])) {
                $voo = new Voo();
                $voo->setVooId($_POST['idVooVolta']);
                $voo->setCodigoPassagem($_POST['codPassagemVolta']);
                $voo->compraVoo($usuario);

            }
            header("Location:HOME");
            
        }else if($acao == "LVU"){
            $idVooIda = ($_POST['vooIdIda']);
            $idVooVolta = ($_POST['idVooVolta']);
            $voo = new Voo();
            $voo->buscaDadosVoo($idVooIda, $idVooVolta);
            require_once "View/purchase.php";
        }
    }

}
?>