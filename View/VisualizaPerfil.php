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
    <link rel="stylesheet" href="View/VisualizaPerfil.css" />
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
    <?php require_once("View/header.php") ?>

    <div class="best-selling-tickets" style="height:80vh">
        <h3>Perfil</h3>
        <div class="container-fluid body">
         
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="cpf"  name="cpf" readonly value="<?php echo $usuario->getNome() ?>"/>
                    
                 
                </div>
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" id="cpf"  name="cpf" readonly value="<?php echo $usuario->getCPF() ?>"/>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email"  name="email" readonly value="<?php  echo $usuario->getEmail() ?>"/>
                </div>
                <div class="form-group">
                    <label for="dataNascimento">Data Nascimento:</label>
                    <input type="text" class="form-control" id="dataNascimento"  name="dataNascimento" readonly value="<?php echo $usuario->getDataNascimento()  ?>"/>
                </div>
         
                <a  href="EDITADADOS" class="btn btn-primary">Editar dados</a>
           

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
                radios_volta[i].addEventListener('click', function() {
                    var idVooVolta = this.value;
                    console.log(idVooVolta);
                    var inputElement = document.querySelector('input[name="vooVoltaSelecionado"]');
                    inputElement.value = idVooVolta;
                });

            }

            var radios_ida = document.getElementsByName('vooIda');
            for (var i = 0; i < radios_ida.length; i++) {
                radios_ida[i].addEventListener('click', function() {
                    var idVooIda = this.value;
                    console.log(idVooIda);
                    var inputElement2 = document.querySelector('input[name="vooIdaSelecionado"]');
                    inputElement2.value = idVooIda;
                });
            }
        </script>

</body>

</html>