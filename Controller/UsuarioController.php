<?php
    require_once("Model/Usuario.php");

    class UsuarioController {

        public function processa($acao){

            if($acao=="C"){
               $novoUsuario = new Usuario();
               $novoUsuario->setCpf($_POST['cpf']);
               $novoUsuario->setNome($_POST['nome']);
               $novoUsuario->setEmail($_POST['email']);
               $novoUsuario->setDataNascimento($_POST['dataNascimento']);
               $novoUsuario->setSenha($_POST['senha']);
               $novoUsuario->cadastraUsuario();
               echo '<script type="text/javascript">  alert("Cadastro Realizado com Sucesso!"); </script>';
               header('Location:LOGIN');

            }else if($acao=="L"){
                echo 'chgou aqui';
                
                
                $novoUsuario = new Usuario();
                $novoUsuario->setCpf($_POST['cpf']);
                $novoUsuario->setSenha($_POST['senha']);
                $novoUsuario->login();

                if($_SESSION['usuario']){

                    
                    header('Location:HOME');
                }
                
            }else if($acao=="D"){
                $novoUsuario = new Usuario();
                $novoUsuario->deslogar();
                header('Location:LOGIN');

            }else if($acao =="LDU"){
                $novoUsuario = new Usuario();
                $novoUsuario->setIdUsuario($_SESSION['usuario']['idUsuario']);
                $usuario = $novoUsuario->dadosUsuario();
                require_once "View/VisualizaPerfil.php";
                
            } else if($acao=="ADU"){

                $novoUsuario = new Usuario();
                $novoUsuario->setIdUsuario($_SESSION['usuario']['idUsuario']);
                $novoUsuario->setCpf($_POST['cpf']);
                $novoUsuario->setNome($_POST['nome']);
                $novoUsuario->setEmail($_POST['email']);
                $novoUsuario->setDataNascimento($_POST['dataNascimento']);
                $novoUsuario->setSenha($_POST['senha']);
                $novoUsuario->editaUsuario();
                header("Location:home");

            }

        }
    }

?>