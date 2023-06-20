<?php 
    require_once ("Model/Passagem.php");
    
    class PassagemController{
        public function processa($acao){
            if($acao=="LP"){
                $passagem = new Passagem();
                $passagem->setUsuarioId($_SESSION['usuario']['idUsuario']);
                $passagem->listarPassagens();
                require_once("View/minhasPassagens.php");
            
            }else if($acao == "CP"){
                $passagem = new Passagem();
                
                $passagem->setUsuarioId($_SESSION['usuario']['idUsuario']);
                $passagem->setcodPassagem($_POST['codPassagem']);
                $passagem->cancelaPassagem();
                header('Location:HOME');
            }
        }
    }
?>