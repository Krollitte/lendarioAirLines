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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php require_once("View/header.php")?>

    <div class="best-selling-tickets" style="height:80vh">
        <h3>Escolha seu voo de ida</h3>
        <div class="container-fluid">
            <?php for ($cont = 0; $cont < count($novoVoo->getListaVoosIda()); $cont++) {
            ?>
                <a class="ticket-item col-md-12">
                    <div class="col-md-7">
                        <div class="origem-destino col-md-12">
                            <div class="col-md-6 destino-item">
                                <label>Origem</label>
                                <?php echo $novoVoo->getListaVoosIda()[$cont]->getOrigem(); ?>
                            </div>
                            <div class="col-md-1 destino-item">
                                <span class="glyphicon glyphicon-plane"></span>
                            </div>
                            <div class="col-md-6 destino-item">
                                <label>Destino</label>
                                <?php echo $novoVoo->getListaVoosIda()[$cont]->getDestino(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="col-md-12 origem-destino">
                            <div class="col-md-6 destino-item">
                                <label>Data/Hora</label>
                                <?php echo $novoVoo->getListaVoosIda()[$cont]->getDataHoraPartida(); ?> /  <?php echo $novoVoo->getListaVoosIda()[$cont]->getDataHoraChegada(); ?>
                            </div>
                            <div class="col-md-6 destino-item">
                                <label>Preço</label>
                                R$<?php echo $novoVoo->getListaVoosIda()[$cont]->getValor(); ?>
                            </div>

                            <input type="radio" id="ida<?php echo $cont; ?>" name="vooIda" value="<?php echo $novoVoo->getListaVoosIda()[$cont]->getVooId(); ?>">
                            <strong>Selecionar </strong>
                            </input>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
        <?php if (count($novoVoo->getListaVoosVolta()) >= 1) { ?>
            <h3>Escolha seu voo de volta</h3>
            <div class="container-fluid">
                <?php for ($cont = 0; $cont < count($novoVoo->getListaVoosVolta()); $cont++) {
                ?>
                    <a class="ticket-item col-md-12">
                        <div class="col-md-7">
                            <div class="origem-destino col-md-12">
                                <div class="col-md-6 destino-item">
                                    <label>Origem</label>
                                    <?php echo $novoVoo->getListaVoosVolta()[$cont]->getOrigem(); ?>
                                </div>
                                <div class="col-md-1 destino-item">
                                    <span class="glyphicon glyphicon-plane"></span>
                                </div>
                                <div class="col-md-6 destino-item">
                                    <label>Destino</label>
                                    <?php echo $novoVoo->getListaVoosVolta()[$cont]->getDestino(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="col-md-12 origem-destino">
                                <div class="col-md-6 destino-item">
                                    <label>Data/Hora</label>
                                    <?php echo $novoVoo->getListaVoosVolta()[$cont]->getDataHoraPartida(); ?> / <?php echo $novoVoo->getListaVoosVolta()[$cont]->getDataHoraChegada(); ?>
                                </div>
                                <div class="col-md-6 destino-item">
                                    <label>Preço</label>
                                    R$<?php echo $novoVoo->getListaVoosVolta()[$cont]->getValor(); ?>
                                </div>
                                <input type="radio" id="volta<?php echo $cont; ?>" name="vooVolta" value="<?php echo $novoVoo->getListaVoosVolta()[$cont]->getVooId(); ?>">
                                <strong>Selecionar </strong>
                                </input>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        <?php } ?>
        <footer class="footer-from-tickets-search-result">
            <a href="HOME" class="btn btn-primary">
                Fazer nova busca
            </a>
            <form type="submit" method="post" action="CHECKOUT">
                <input type="hidden" name="vooIdaSelecionado" value="">
                <input type="hidden" name="vooVoltaSelecionado" value="">
                <button type="submit" class="btn btn-primary btn-custom">Comprar</a>
            </form>
        </footer>
    </div>

    <footer class="container-fluid d-flex align-items-center justify-content-center text-center ">
        <h4>Somos a Lendário Air Lines</h4>
        <h5>Fazemos questão de tornar sua viagem a mais lendária possível</h5>
        <h5>CNPJ: 00.000.000/0000-01</h5>
        <h5>E-mail: lendarioairlines@lendarioLAL.com.br</h5>
        <h5>Telefone:(71) 98888-7777</h5>
    </footer>

    <script>
    
    var radios_volta = document.getElementsByName('vooVolta');
    for (var i = 0; i < radios_volta.length; i++) {
      radios_volta[i].addEventListener('click', function () {
        var idVooVolta = this.value;
        console.log(idVooVolta); 
        var inputElement = document.querySelector('input[name="vooVoltaSelecionado"]');
        inputElement.value = idVooVolta;
      });

    }

    var radios_ida = document.getElementsByName('vooIda');
    for (var i = 0; i < radios_ida.length; i++) {
      radios_ida[i].addEventListener('click', function () {
        var idVooIda = this.value; 
        console.log(idVooIda); 
        var inputElement2 = document.querySelector('input[name="vooIdaSelecionado"]'); 
        inputElement2.value = idVooIda;   
      });
    }
  </script>

</body>

</html>