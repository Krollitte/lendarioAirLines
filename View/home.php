<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lendário Air Lines - LAL</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="View/home.css" />
    <link rel="stylesheet" href="View/index.css" />
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
    <div class="wrapper-carousel">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->

            <div class="carousel-inner">
                <div class="item active">
                    <img src="View/salvador.webp" alt="Salvador" />
                    <div class="carousel-caption">
                        <h3>Salvador</h3>
                        <p>Ida e volta de onde estiver <span>*</span> por apenas R$400</p>
                    </div>
                </div>


                <div class="item">
                    <img src="View/recife.jpg" alt="Recife" />
                    <div class="carousel-caption">
                        <h3>Recife</h3>
                        <p>Ida e volta de onde estiver <span>*</span> por apenas R$400</p>
                    </div>
                </div>

                <div class="item">
                    <img src="View/fortaleza.jpg" alt="Fortaleza" />
                    <div class="carousel-caption">
                        <h3>Fortaleza</h3>
                        <p>Ida e volta de onde estiver <span>*</span> por apenas R$400</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="fast-selling-tickets">
            <h3 style="margin-left:33px">Compra rápida</h3>
            <div class="container-fluid col-md-12">
                <form action="FUNCAOPESQUISAVOO" method="post" type="submit" id="form-pesquisa">
                    <div class="form-group" style="display: flex; width: 100%; align-items: center; flex-direction: column; gap:10px; ">
                        <div style="width: 85%;display: flex; flex-direction: row; align-items: center; justify-content:space-between; gap:15px;">
                            <div style="width:400px">
                                <label for="select-trecho">Trecho:</label>
                                <select class="form-control" name="select-trecho" id="select-trecho">
                                    <option value="1">Só ida </option>
                                    <option value="2">Ida e volta</option>
                                </select>
                            </div>
                            <div style="width:400px">
                                <label for="origem">Origem:</label>
                                <input type="text" class="form-control" name="origem" id="origem" required>
                            </div>

                            <div style="width:400px">
                                <label for="destino">Destino:</label>
                                <input type="text" class="form-control" name="destino" id="destino" required>
                            </div>
                        </div>
                        <div style="width: 85%;display: flex; flex-direction: row; align-items: end; justify-content:space-between; gap:15px;">

                            <div style="width:400px">
                                <label for="data-ida">Data de Ida:</label>
                                <input type="date" class="form-control" name="data-ida" id="data-ida" required>
                            </div>
                            <div style="width:400px">
                                <label for="data-retorno">Data de Retorno:</label>
                                <input type="date" class="form-control" name="data-retorno" id="data-retorno" value="">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary search-button">Buscar Voos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="container-fluid d-flex align-items-center justify-content-center text-center">
        <h4>Somos a Lendário Air Lines</h4>
        <h5>Fazemos questão de tornar sua viagem a mais lendária possível</h5>
        <h5>CNPJ: 00.000.000/0000-01</h5>
        <h5>E-mail: lendarioairlines@lendarioLAL.com.br</h5>
        <h5>Telefone:(71) 98888-7777</h5>
    </footer>
    <script>
         var formPesquisa = document.getElementById('form-pesquisa');
         var select = document.getElementById('select-trecho');
         var idaDataInput = document.getElementById('data-ida');
         var retornoDataInput = document.getElementById('data-retorno');
         formPesquisa.addEventListener('submit', (event)=>{
            console.log('retornoDataInput =>', retornoDataInput.value);

            if (select.value === "1") {
                retornoDataInput.value = idaDataInput.value;
            }
         })
        document.addEventListener("DOMContentLoaded", function() {
            var formPesquisa = document.getElementById('form-pesquisa');
            var select = document.getElementById('select-trecho');
            var idaDataInput = document.getElementById('data-ida');
            var retornoDataInput = document.getElementById('data-retorno');
            formPesquisa.addEventListener('submit', function(event) {
                if (select.value === "1") {
                    retornoDataInput.value = idaDataInput.value;
                }
            })
        });

        var select = document.getElementById('select-trecho');

        if (select.value === '1') {
            var idaDataInput = document.getElementById('data-ida');
            var retornoDataInput = document.getElementById('data-retorno');
            retornoDataInput.value = idaDataInput.value;

            retornoDataInput.setAttribute('disabled', 'disabled');
        }
        if (select.value === '2') {
            var retornoDataInput = document.getElementById('data-retorno');

            retornoDataInput.removeAttribute('disabled', 'disabled');
        }

        select.addEventListener('change', function() {

            if (select.value === '1') {
                var retornoDataInput = document.getElementById('data-retorno');

                var idaDataInput = document.getElementById('data-ida');
                retornoDataInput.value = idaDataInput.value;
                retornoDataInput.value = ""
                retornoDataInput.setAttribute('disabled', 'disabled');
            }
            if (select.value === '2') {
                var retornoDataInput = document.getElementById('data-retorno');


                retornoDataInput.removeAttribute('disabled', 'disabled');
            }
        })
    </script>
</body>

</html>