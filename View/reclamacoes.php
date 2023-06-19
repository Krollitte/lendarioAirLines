<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/index.css">
    <link rel="stylesheet" href="View/home.css">
    <link rel="stylesheet" href="View/reclamacoes.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Reclamações - LAL</title>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Lendário Air Lines - LAL</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li ><a href="home.html">Home</a></li>
                    <li><a href="passagens.html">Passagens</a></li>
                    <li class="active"><a href="reclamacoes.html">Fazer reclamação</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="login.html">Check-In</a>
                    </li>
                    <li>
                        <a style="cursor: pointer;" data-toggle="modal" data-target="#myModal">Cancelamento</a>
                    </li>
                    <li>
                        <a href="formulario.html"></span>Cadastrar</a>
                    </li>
                    <li>
                        <a href="login.html">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Cancelamento</h4>
            </div>
            <div class="modal-body">
             <label for="id-passagem">Identificador da passagem</label>
             <input type="text" id="id-passagem"/>
             <br />
             <label for="id-voo">Identificador do voo</label>
             <input type="text" id="id-voo"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar passagem</button>
            </div>
          </div>
          
        </div>
      </div> 
      <main>

    
        <div class="container">
            <h2>Reclamações</h2>
            <form action="/action_page.php">
              <div class="form-group">
                <label class="control-label col-sm-4" for="name">Nome:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" placeholder="Nome" name="name">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4" for="cpf">CPF:</label>
                <div class="col-sm-10">          
                  <input type="text" class="form-control" id="cpf" placeholder="CPF" name="cpf">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4" for="phone">Celular:</label>
                <div class="col-sm-10">          
                  <input type="text" class="form-control" id="phone" placeholder="Celular" name="phone">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4" for="email">E-mail:</label>
                <div class="col-sm-10">          
                  <input type="text" class="form-control" id="email" placeholder="E-mail" name="email">
                </div>
              </div>
              <div class="form-group">
                  <label for="reclamacao">Reclamações:</label>
                  <textarea class="form-control" rows="5" id="reclamacao" style="resize:none"></textarea>
                </div>
              
              <div class="form-group">        
                <div class="col-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Cancelar</button>
                </div>
                <div class="col-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Enviar reclamação</button>
                </div>
              </div>
            </form>
          </div>
        </main>
    <footer class="container-fluid d-flex align-items-center justify-content-center text-center ">
        <h4>Somos a Lendário Air Lines</h4>
        <h5>Fazemos questão de tornar sua viagem a mais lendária possível</h5>
        <h5>CNPJ: 00.000.000/0000-01</h5>
        <h5>E-mail: lendarioairlines@lendarioLAL.com.br</h5>
        <h5>Telefone:(71) 98888-7777</h5>
    </footer>
</body>
</html>