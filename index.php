<?php 
session_start();
if (isset($_GET['url'])) //se estiver preenchida, pega o valor
{
    $url = strtoupper($_GET['url']);
    if($url=="HOME"){
        require_once "View/home.php";
    }
    else if($url=="CADASTRO"){
        require_once "View/formulario.php";

    }else if($url=="FUNCAOCADASTRA"){
        require_once "Controller/UsuarioController.php";
        $controller = new UsuarioController();
        $controller->processa("C");
        
    }else if($url=="FUNCAOLOGIN"){
            require_once "Controller/UsuarioController.php";
            $controller = new UsuarioController();
            $controller->processa("L");
    }
    else if($url=="LOGIN"){
        require_once "View/login.php";
    }

    else if($url=="FUNCAOPESQUISAVOO"){
        require_once "Controller/VooController.php";
        $controller = new VooController();
        $controller->processa("PV");
    }
    else if($url=="CHECKOUT"){
        require_once "Controller/VooController.php";
        $controller = new VooController();
        $controller->processa("VC");
        // require_once("View/resumoDaCompra.php");
    }

    else if($url =="FINALIZACOMPRA"){
        require_once "Controller/VooController.php";
        $controller = new VooController();
        $controller->processa("FC");
    }
    
    else if($url=="RESUMOCOMPRA"){
        require_once "Controller/VooController.php";
        $controller = new VooController();
        $controller->processa("RC");
    }

    else if($url == "VALIDACHECKIN"){
        require_once "Controller/CheckinController.php";
        $controller = new CheckInController();
        $controller->processa("FC");
        require_once("View/home.php");
    }

    else if($url == "CANCELAPASSAGEM"){
        require_once "Controller/PassagemController.php";
        $controller = new PassagemController();
        $controller->processa("CP");
        require_once("View/home.php");
    }
    else if($url =="MINHASPASSAGENS"){
        require_once "Controller/PassagemController.php";
        $controller = new PassagemController();
        $controller->processa("LP");
    }
    else if($url =="MINHASRECLAMACOES"){
        require_once "Controller/ReclamacaoController.php";
        $controller = new ReclamacaoController();
        $controller->processa("LPPR");
    }
    else if($url =="FAZERRECLAMACAO"){
        require_once "Controller/ReclamacaoController.php";
        $controller = new ReclamacaoController();
        $controller->processa("CR");
    }

    else if($url =="CANCELARECLAMACAO"){
        require_once "Controller/ReclamacaoController.php";
        $controller = new ReclamacaoController();
        $controller->processa("CDR");
    }

    else if($url =="VISUALIZAPERFIL"){
        require_once "Controller/UsuarioController.php";
        $controller = new UsuarioController();
        $controller->processa("LDU");
        
    }

    else if($url =="EDITADADOS"){
        require_once "Controller/UsuarioController.php";
      
        require_once ("View/editaPerfil.php");
    }
    else if($url =="CONFIMAEDICAO"){
        require_once "Controller/UsuarioController.php";
        $controller = new UsuarioController();
        $controller->processa("ADU");
    }

   else if($url=="DESLOGAR"){
    echo 'chegou qui';
    require_once "Controller/UsuarioController.php";
    $controller = new UsuarioController();
    $controller->processa("D");
   }
}
else   //senão, vai para uma página padrão, neste caso a home do site
  $url = '404.php';
?>