<?php 
    require_once("Model/Reclamacao.php");
    require_once("Model/Passagem.php");

    class ReclamacaoController {
        public function processa($acao){
            if($acao=="LPPR"){
                #list reclamação
               $reclamacao = new Reclamacao();
               $reclamacao->setIdUsuario($_SESSION['usuario']['idUsuario']);
               $reclamacao->listaPassagensParaReclamacao();
               require_once "View/minhasReclamacoes.php";
            } else if($acao=="CR"){
                #cadastro reclamacao
                $reclamacao = new Reclamacao(); 
                $reclamacao->setIdUsuario($_SESSION['usuario']['idUsuario']);
                $reclamacao->setCodPassagem($_POST['codPassagem']);
                $reclamacao->setReclamacaoTexto($_POST['reclamacaoTexto']);
                $reclamacao->cadastraReclamacao();
                $reclamacao->listaPassagensParaReclamacao();
                require_once "View/minhasReclamacoes.php";
            } else if($acao =="CDR"){
                #deleta reclamacao
                $reclamacao = new Reclamacao(); 
                $reclamacao->setReclamacaoId($_POST['reclamacaoId']);
                $reclamacao->cancelaReclamacao();
                $reclamacao->listaPassagensParaReclamacao();
                require_once "View/minhasReclamacoes.php";
            }
        }
    }
?>