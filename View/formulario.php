
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="View/assets/css/style.css" />
    <title>Formulário</title>
  </head>

  <body>
    <div class="container">
      <div class="form-image">
        <img src="View/assets/img/aircraft-animate.svg" alt="" />
      </div>
      
        <form class="form" method="post" type="submit" action="FUNCAOCADASTRA" id="formcadastro">
          <div class="form-header">
            <div class="title">
              <h1>Cadastre-se</h1>
            </div>
            <div class="login-button">
              <a class="btn btn-primary" href="login">Entrar</a>
            </div>
          </div>

          <div class="input-group">
            <div class="input-box">
              <label for="nome">Nome</label>
              <input
                id="nome"
                type="text"
                name="nome"
                placeholder="Digite seu nome"
                required
              />
            </div>

            <div class="input-box">
              <label for="email">E-mail</label>
              <input
                id="email"
                type="email"
                name="email"
                placeholder="Digite seu e-mail"
                required
              />
            </div>

            <div class="input-box">
              <label for="senha">Senha</label>
              <input
                id="senha"
                type="password"
                name="senha"
                placeholder="Digite sua senha"
                required
              />
            </div>

            <div class="input-box">
                <label for="dataNascimento">Data de Nascimento</label>
                <input
                  id="dataNascimento"
                  type="date"
                  name="dataNascimento"
                  required
                />
            </div>

            <div class="input-box">
              <label for="cpf">CPF</label>
              <input
                id="cpf"
                type="text"
                name="cpf"
                required
                placeholder="CPF"
              />
            </div>

            <div class="input-box">
              <label for="confirmarSenha">Confirme sua Senha</label>
              <input
                id="confirmarSenha"
                type="password"
                name="confirmarSenha"
                placeholder="Digite sua senha novamente"
                required
              />
            </div>
          </div>
          
    
          <div class="continue-button">
            <button type="submit">Continuar</button>
          </div>
        </form>
      
    </div>
    <script> 
    var form= document.getElementById("formcadastro");
    var senha =document.getElementById("senha");
    var confirmarSenha =document.getElementById("confirmarSenha");
    var dataNascimento = document.getElementById("dataNascimento");
    var dataHoje = new Date();
    form.addEventListener('submit', (event)=>{
      console.log(new Date(dataNascimento.value).getFullYear()- dataHoje.getFullYear());
      console.log(dataHoje.getFullYear);
      if(senha.value !== confirmarSenha.value){
        event.preventDefault();
        alert("As senhas não correspondem");
      }
      if(dataHoje.getFullYear() - new Date(dataNascimento.value).getFullYear() < 18){
        event.preventDefault();
        alert("Os usuários devem ser maiores de idade");
      }

    }); 

    </script>
   
  </body>
</html>
