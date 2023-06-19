<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="View/login.css" />
    <link rel="stylesheet" href="View/index.css" />
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
    <div class="main-login">
      <div class="left-login">
        <h1>
          Faça Login<br />
          e venha viajar o mundo conosco
        </h1>
        <img
          src="View/img/flying-around-the-world-animate (1).svg"
          class="left-login-image"
          alt="nerd animado"
        />
      </div>
      <div class="rigth-login">
        <form class=" form card-login" type="submit" method="post" action="FUNCAOLOGIN" id="form-login">
          <h1>LOGIN</h1>
          <div class="textfield">
            <label for="cpf">CPF</label>
            <input type="text" id="cpf" name="cpf" placeholder="Cpf" />
          </div>
          <div class="textfield">
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" placeholder="Senha" />
          </div>
          <div class="cadastro-e-redefinicao">
            <a href="#" text-decoration: none;>Esqueci minha senha</a>
          </div>
          
          <button class="btn-login" type="submit">Login</button>
          <a href="cadastro">Registrar-me</a>
        </form>
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
      var form = document.getElementById('form-login');
      form.addEventListener('submit', (event)=>{
        var cpfInput = document.getElementById('cpf');
        var senhaInput = document.getElementById('senha');
        console.log('cpfInput =>', cpfInput.value);
        console.log('senhaInput =>', senhaInput.value);
        // event.preventDefault();
      });
    </script>

  </body>
</html>

