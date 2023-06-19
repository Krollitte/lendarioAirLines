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
                    <li><a href="HOME">Home</a></li>
                    <?php if (isset($_SESSION['usuario']['idUsuario'])) :  ?>
                        <li><a href="MINHASPASSAGENS">Minhas Passagens</a></li>
                        <li><a href="MINHASRECLAMACOES">Minhas Reclamações</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                    <a style="cursor: pointer;" data-toggle="modal" data-target="#modalCheckin">CheckIn</a>
                    </li>
                    <li>
                        <a style="cursor: pointer;" data-toggle="modal" data-target="#modalCancelamento">Cancelamento</a>
                    </li>
                    <li>
                        <a href="VISUALIZAPERFIL" style="cursor: pointer;">Perfil</a>
                    </li>

                    <li><a href="DESLOGAR"><span class="glyphicon glyphicon-log-in"></span> Sair </a></li>
                <?php else : ?>
                    <li>
                        <a href="cadastro"></span>Cadastrar</a>
                    </li>
                    <li>
                        <a href="login">Login</a>
                    </li>
                <?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>
    <div class="modal fade" id="modalCancelamento" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->

            <div class="modal-content">
                <form type="submit" method="post" action="CANCELAPASSAGEM">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Cancelamento</h4>
                    </div>
                    <div class="modal-body">
                        <label for="codPassagem">Código da passagem</label>
                        <input type="text" id="codPassagem" name="codPassagem" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Cancelar passagem </button>
                    </div>
                </form>
            </div>

            
        </div>
    </div>

    <div class="modal fade" id="modalCheckin" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <form type="submit" method="post" action="VALIDACHECKIN">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">CheckIn</h4>
                    </div>
                    <div class="modal-body">
                        <label for="codPassagem">Código da passagem</label>
                        <input type="text" id="codPassagem" name="codPassagem" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Realizar Checkin </button>
                    </div>
                </form>
            </div>

        </div>
    </div>