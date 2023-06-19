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
    <link rel="stylesheet" href="View/dadosDoPassageiro.css" />
    <link rel="stylesheet" href="View/resumoDaCompra.css" />
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
<?php require_once("View/header.php")?>

    <div class="best-selling-tickets" >
        <h3>Resumo da compra </h3>
        <div class="container rol">
            <h5>Passagem</h5>
            <?php for ($cont = 0; $cont < count($voo->getDadosVoo()); $cont++) { ?>
            <div href="passagensVolta.html" class="ticket-item col-md-12">
                <div class="col-md-7">
                    <div class="origem-destino col-md-12">
                        <div class="col-md-6 destino-item">
                            <label>Origem</label>
                            <?php echo $voo->getDadosVoo()[$cont]->getOrigem(); ?> /  <?php echo $voo->getDadosVoo()[$cont]->getDataHoraPartida(); ?>
                           
                        </div>
                        <div class="col-md-1 destino-item">
                        <span class="glyphicon glyphicon-plane"></span>
                        </div>
                        <div class="col-md-6 destino-item">
                            <label>Destino</label>
                            <?php echo $voo->getDadosVoo()[$cont]->getDestino(); ?> /  <?php echo $voo->getDadosVoo()[$cont]->getDataHoraPartida(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12 origem-destino">
                        <div class="col-md-6 destino-item">
                            <label >Código Passagem </label>
                            <?php echo $voo->getDadosVoo()[$cont]->getCodigoPassagem(); ?> 
                            <label>Tipo de passagem</label>
                            <?php echo $voo->getDadosVoo()[$cont]->getTipoVoo(); ?>
                        </div>
                        <div class="col-md-6 destino-item">
                            <label>Preço</label>
                            R$<?php echo $voo->getDadosVoo()[$cont]->getValor(); ?>,00
                            <label>Número vôo</label>
                            <?php echo $voo->getDadosVoo()[$cont]->getNumeroVoo(); ?>
                        </div>
                        
                    </div>
                </div>   
              
            </div>
            <?php } ?>
            <h5>Passageiro</h5>
            <div href="passagensVolta.html" class="ticket-item col-md-12">
                <div class="col-md-7">
                    <div class="origem-destino col-md-12">
                        <div class="col-md-6 destino-item">
                            <label>Nome</label>
                            <?php echo $_SESSION['usuario']['nome']?>
                        </div>
                        <div class="col-md-1 destino-item">
                        <span class="glyphicon glyphicon-user"></span>
                        </div>
                        <div class="col-md-6 destino-item">
                            <label>CPF</label>
                            <?php echo $_SESSION['usuario']['cpf']?>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="col-md-12 origem-destino">
                        <div class="col-md-6 destino-item">
                            <label>e-mail</label>
                            <?php echo $_SESSION['usuario']['email']?>
                        </div>
                    </div>
                </div>   
            </div>
        <form action="FINALIZACOMPRA" method="post" class="checkout-area">
            <h3 class="title">Informações de cobrança</h3>
            <div class="form-group">
              <span>Nome completo:</span>
              <input type="text" class="form-control" placeholder="jhon deo" />
            </div>
            <div class="form-group">
              <span>Email:</span>
              <input class="form-control" type="email" placeholder="exemple@exemple.com" />
            </div>
            <div class="form-group">
              <span>Endereço:</span>
              <input class="form-control" type="text" placeholder="room - street - locality" />
            </div>
            <div class="form-group">
              <span>Cidade:</span>
              <input class="form-control" type="text" placeholder="brazil" />
            </div>
            <div class="flex">
              <div class="form-group">
                <span>Estado:</span>
                <input class="form-control" type="text" placeholder="India" />
              </div>
              <div class="form-group">
                <span>CEP:</span>
                <input class="form-control" type="text" placeholder="123 456" />
              </div>
            </div>
         


            <div class="form-group">
              <span>Cartões aceitos:</span>
              <img src="View/card_img.png" alt="" />
            </div>

            <div class="form-group">
              <span>Nome do titular do cartão:</span>
              <input class="form-control" type="text" placeholder="Mr. jhon deo" />
            </div>
            <div class="form-group">
              <span>Número do cartão</span>
              
              <input class="form-control" type="text" placeholder="00011122233" maxlength="16"
              size="16"/>
            </div>
            <div class="form-group">
              <span>Mês de validade:</span>
              <input class="form-control" type="text" placeholder="January" />
            </div>
            <div class="flex">
              <div class="form-group">
                <span>Ano de validade:</span>
                <input class="form-control" type="text" placeholder="2022" />
              </div>
              <div class="form-group">
                <span>CVV:</span>
                <input class="form-control" type="text" placeholder="123" />
              </div>
              <p>Número de parcelas:</p>
              <?php
              $resumo = $voo->getDadosVoo()[0]->getValor();
              if (count($voo->getDadosVoo()) > 1) {
                $resumo += $voo->getDadosVoo()[1]->getValor();
              }
              ?>
              <select>
                <option value="1x">1x de R$:
                  <?php echo number_format($resumo / 1, 2); ?>

                </option>
                <option value="2x">2x de R$:
                  <?php echo number_format($resumo / 2, 2); ?>

                </option>
                <option value="3x">3x de R$:
                  <?php echo number_format($resumo / 3, 2); ?>
                </option>
                <option value="3x">4x de R$:
                  <?php echo number_format($resumo / 4, 2); ?>
                </option>
                <option value="3x">5x de R$:
                  <?php echo number_format($resumo / 5, 2); ?>
                </option>
                <option value="3x">6x de R$:
                  <?php echo number_format($resumo / 6, 2); ?>
                </option>
              </select>
            </div>

            <input type="hidden" name="codPassagemIda" id="codPassagemIda"
              value=" <?php echo $voo->getDadosVoo()[0]->getCodigoPassagem(); ?>">
            <input type="hidden" name="idVooIda" id="idVooIda" value="<?php echo $voo->getDadosVoo()[0]->getVooId(); ?>">
            <?php if (count($voo->getDadosVoo()) > 1) { ?>
              <input type="hidden" name="codPassagemVolta" id="codPassagemVolta" 
                value=" <?php echo $voo->getDadosVoo()[1]->getCodigoPassagem(); ?>">
              <input type="hidden" name="idVooVolta" id="idVooVolta" value="<?php echo $voo->getDadosVoo()[1]->getVooId(); ?>">
            <?php } else { ?>
              <input type="hidden" name="idVooVolta" id="idVooVolta" value="">
            <?php } ?>
            <input type="hidden" name="usuarioId" id="usuarioId" value="<?php echo $_SESSION['usuario']['idUsuario']; ?>">
          
            <div class="form-group">
                <button class="btn btn-primary">Continuar</button>
            </div>
      </form>
     </div>
       
    </div>

    <footer class="container-fluid d-flex align-items-center justify-content-center text-center ">
        <h4>Somos a Lendário Air Lines</h4>
        <h5>Fazemos questão de tornar sua viagem a mais lendária possível</h5>
        <h5>CNPJ: 00.000.000/0000-01</h5>
        <h5>E-mail: lendarioairlines@lendarioLAL.com.br</h5>
        <h5>Telefone:(71) 98888-7777</h5>
    </footer>

</body>

</html> 