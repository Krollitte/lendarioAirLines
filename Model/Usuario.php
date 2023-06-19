<?php
require_once("Model/Conexao.php");
class Usuario
{
    private $idUsuario;
    private $nome;
    private $cpf;
    private $email;
    private $dataNascimento;
    private $senha;

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function cadastraUsuario()
    {
        try {
            $banco = Conexao::getConexao();
            $sql = $banco->prepare("insert into  dblendarioairlines.usuarios (nome, cpf, email, dataNascimento, senha) 
                values (:nome, :cpf, :email, :dataNascimento, :senha)");

            $sql->bindParam("nome", $nome);
            $sql->bindParam("cpf", $cpf);
            $sql->bindParam("email", $email);
            $sql->bindParam("dataNascimento", $dataNascimento);
            $sql->bindParam("senha", $senha);

            echo 'chegou aqui';
            $cpf = $this->cpf;
            $nome = $this->nome;
            $email = $this->email;
            $dataNascimento = $this->dataNascimento;
            $senha  = $this->senha;

            $sql->execute();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function login()
    {
        try {
            $banco = Conexao::getConexao();
            $sql = $banco->prepare("select idUsuario, nome, cpf, email, dataNascimento 
            from dblendarioairlines.usuarios where cpf = :cpf AND senha = :senha");
            $sql->bindParam("cpf", $cpf);
            $sql->bindParam("senha", $senha);
            $cpf = $this->cpf;
            $senha = $this->senha;
            $sql->execute();
            $result = $sql->fetch();

            if ($result) {
                $usuario = array(
                    'idUsuario' => $result['idUsuario'],
                    'nome' => $result['nome'],
                    'cpf' => $result['cpf'],
                    'email' => $result['email'],
                    'dataNascimento' => $result['dataNascimento']
                );
                $_SESSION['usuario'] = $usuario;
            } else {
                echo "Credenciais Incorretas";
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }


    public function editaUsuario()
    {
        try {
            $banco = Conexao::getConexao();
            $sql = $banco->prepare("UPDATE dblendarioairlines.usuarios SET nome =:nome, cpf =:cpf, email = :email, dataNascimento= :dataNascimento, senha =:senha WHERE idUsuario =:idUsuario");
            $sql->bindParam("idUsuario",$idUsuario);
            $sql->bindParam("nome", $nome);
            $sql->bindParam("cpf", $cpf);
            $sql->bindParam("email", $email);
            $sql->bindParam("dataNascimento", $dataNascimento);
            $sql->bindParam("senha", $senha);
            $idUsuario=$this->idUsuario;
            $nome = $this->nome;
            $cpf = $this->cpf;
            $email = $this->email;
            $dataNascimento = $this->dataNascimento;
            $senha = $this->senha;

            $sql->execute();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function dadosUsuario()
    {
        try {
            $banco = Conexao::getConexao();
            $sql = $banco->prepare("SELECT idUsuario, nome, cpf, email, dataNascimento from dblendarioairlines.usuarios  WHERE idUsuario =:idUsuario");
            $sql->bindParam("idUsuario", $idUsuario);
            $idUsuario = $this->idUsuario;
            $sql->execute();

            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
            $linha =  $sql->fetch(PDO::FETCH_ASSOC);



            if ($linha) {
                $usuario = new Usuario();
                $usuario->setIdUsuario($linha['idUsuario']);
                $usuario->setNome($linha['nome']);
                $usuario->setEmail($linha['email']);
                $usuario->setCpf($linha['cpf']);
                $usuario->setDataNascimento($linha['dataNascimento']);

                return $usuario;
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }


    public function deslogar()
    {
        session_destroy();
    }
}
