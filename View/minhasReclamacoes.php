<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lendário Air Lines - LAL</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="View/index.css" />
    <link rel="stylesheet" href="View/home.css" />
    <link rel="stylesheet" href="View/passagens.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
   <?php require_once("View/header.php");?>

    <div class="best-selling-tickets" style="height:80vh">
        <h3>Minhas reclamações </h3>
        <div class="container-fluid">
        <?php for ($cont = 0; $cont < count($reclamacao->getListaReclamacao()); $cont++) { ?>
            <div  class="ticket-item col-md-12">
                <div class="col-md-7">
                    <div class="origem-destino col-md-12">
                        <div class="col-md-6 destino-item">
                            <label>Protocolo</label>
                            <?php echo $reclamacao->getListaReclamacao()[$cont]->getReclamacaoId(); ?>  
                        </div>
                  
                        <div class="col-md-6 destino-item">
                            <label>Status da reclamação</label>
                            <?php echo $reclamacao->getListaReclamacao()[$cont]->getStatusReclamacao(); ?>  
                        </div>
                        <div style="display:flex; flex-direction:column; align-items:center;">
                            <label style="text-align:center;" for="">Texto da reclamação</label>
                            <?php echo $reclamacao->getListaReclamacao()[$cont]->getReclamacaoTexto(); ?>  
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="col-md-12 origem-destino">
                        <div class="col-md-6 destino-item">
                            <label >Código Passagem</label>
                            <?php echo $reclamacao->getListaReclamacao()[$cont]->getcodPassagem(); ?>
                        </div>
                        <div class="col-md-6 destino-item">
                            <?php if($reclamacao->getListaReclamacao()[$cont]->getStatusReclamacao() !== 'Cancelada'){ ?>
                            <form type="submit" method="post" action="CANCELARECLAMACAO" >
                                <input type="hidden" name="reclamacaoId" id="reclamacaoId" value="<?php echo $reclamacao->getListaReclamacao()[$cont]->getReclamacaoId(); ?>" />
                                <button type="submit" class="btn btn-primary">Cancelar</button>
                            </form>
                            <?php } ?>
                        </div>
                        
                    </div>
                </div>   
        </div>
            <?php } ?>
           
        </div>

       

    </div>

    <footer class="container-fluid d-flex align-items-center justify-content-center text-center ">
        <h4>Somos a Lendário Air Lines</h4>
        <h5>Fazemos questão de tornar sua viagem a mais lendária possível</h5>
        <h5>CNPJ: 00.000.000/0000-01</h5>
        <h5>E-mail: lendarioairlines@lendarioLAL.com.br</h5>
        <h5>Telefone:(71) 98888-7777</h5>
    </footer>

    <script>
        function selecionaPassagem(codPassagem){
            console.log(codPassagem);
            var inputPassagemReclamacao = document.getElementById('codPassagem')
            inputPassagemReclamacao.value = codPassagem;
        }
    </script>

</body>

</html>