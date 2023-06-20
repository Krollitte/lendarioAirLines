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
        <h3>Minhas passagens </h3>
        <div class="container-fluid">
        <?php for ($cont = 0; $cont < count($passagem->getListaVooUsuario()); $cont++) { ?>
            <form type="submit" method="post" action="CANCELAPASSAGEM" >
           
                <div  id="passagem" class="ticket-item col-md-12">
                    <div class="col-md-7">
                        <div class="origem-destino col-md-12">
                            <div class="col-md-6 destino-item">
                                <label>Origem</label>
                                <?php echo $passagem->getListaVooUsuario()[$cont]->getOrigem(); ?>  
                            </div>
                            <div class="col-md-1 destino-item">
                                 <span class="glyphicon glyphicon-plane"></span>
                            </div>
                            <div class="col-md-6 destino-item">
                                <label>Destino</label>
                                <?php echo $passagem->getListaVooUsuario()[$cont]->getDestino(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="col-md-12 origem-destino">
                            <div class="col-md-4 destino-item">
                                <label >Código Passagem</label>
                                <?php echo $passagem->getListaVooUsuario()[$cont]->getCodigoPassagem(); ?>
                            </div>
                            <div class="col-md-4 destino-item">
                                <label >Assento</label>
                                <?php echo $passagem->getlistaPassagensUsuario()[$cont]->getNumeroCadeira(); ?>
                            </div>
                            <div class="col-md-4">
                            <label >Checkin</label>
                                <?php if($passagem->getlistaPassagensUsuario()[$cont]->getValidaCheckIn() !== 1){
                                    echo ' <br/> CheckIn não realizado';
                                }else{
                                    echo '  <br/>CheckIn realizado';
                                } ?>
                            </div>
                        </div>
                    </div>   
                </div>
            
            </form>      
        <?php } ?>
           
        

        <form method="post" type="submit" action="FAZERRECLAMACAO">
             <div class="form-group">
                  <label style="color:#fff" for="codPassagem">Passagem Selecionada:</label>
                  <input class="form-control" id="codPassagem"name="codPassagem" placeholder="Digite o código de uma passagem acima para fazer uma reclamação" value=""  />
             </div>
              <div class="form-group">
                  <label style="color:#fff"  for="reclamacaoTexto">Reclamações:</label>
                  <textarea class="form-control" rows="5" id="reclamacaoTexto" name="reclamacaoTexto" style="resize:none"></textarea>
                </div>
              
              <div class="form-group">        
             
                <div class="col-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Enviar reclamação</button>
                </div>
              </div>
            </form>


    </div>

    <footer class="container-fluid d-flex align-items-center justify-content-center text-center ">
        <h4>Somos a Lendário Air Lines</h4>
        <h5>Fazemos questão de tornar sua viagem a mais lendária possível</h5>
        <h5>CNPJ: 00.000.000/0000-01</h5>
        <h5>E-mail: lendarioairlines@lendarioLAL.com.br</h5>
        <h5>Telefone:(71) 98888-7777</h5>
    </footer>

    <script>
        var passagem =document.getElementById('passagem');
        passagem.addEventListener('onClick',()=>{

            function selecionaPassagem(codPassagem){
                console.log(codPassagem);
                var inputPassagemReclamacao = document.getElementById('codPassagem');
                inputPassagemReclamacao.setAttribute('value',codPassagem ) 
            }
        })
    </script>

</body>

</html>