<?php
require_once("Model/Conexao.php");
require_once("Model/Voo.php");

class Passagem
{
    private $passagemId;
    private $usuarioId;
    private $statusPassagem;
    private $vooId;
    private $numeroCadeira;
    private $codPassagem;
    private $listaPassagensUsuario = array();
    private $listaVooUsuario = array();

    public function listarPassagens()
    {
        try {
            $banco = Conexao::getConexao();
            $sql = $banco->prepare("SELECT 
            passagemId,
            p.codPassagem, 
            validaCheckIn,
            p.numeroCadeira,
            v.numeroVoo, 
            v.origem, 
            v.destino, 
            statusPassagem
            FROM 
            dblendarioairlines.passagens p, 
            dblendarioairlines.voos v 
            WHERE p.vooId = v.vooId 
            AND p.usuarioId = :usuarioId");
            $sql->bindParam("usuarioId", $usuarioId);
            $usuarioId = $this->usuarioId;
            $sql->execute();
            $resultado = $sql->setFetchMode(PDO::FETCH_ASSOC);
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $passagem = new Passagem();
                $passagem->setPassagemId($linha['passagemId']);
                $passagem->setcodPassagem($linha['codPassagem']);
                $passagem->setStatusPassagem($linha['statusPassagem']);
                $passagem->setNumeroCadeira($linha['numeroCadeira']);
                
                $voo = new Voo();
                $voo->setNumeroVoo($linha['numeroVoo']);
                $voo->setOrigem($linha['origem']);
                $voo->setDestino($linha['destino']);
                $voo->setCodigoPassagem($linha['codPassagem']);

                array_push($this->listaPassagensUsuario, $passagem);
                array_push($this->listaVooUsuario, $voo);
            }


        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function listaPassagensParaCancelamento()
    {
        try {
            $banco = Conexao::getConexao();
            $sql = $banco->prepare("SELECT passagemId, codPassagem, v.numeroVoo, v.origem, v.destino, statusReserva, v.valor
            FROM dblendarioairlines.passagens p, dblendarioairlines.voos v WHERE p.vooId = v.vooId AND passagemId = :passagemId");

            $sql->bindParam("passagemId", $passagemId);
            $passagemId = $this->passagemId;
            $sql->execute();
            $resultado = $sql->setFetchMode(PDO::FETCH_ASSOC);
            $linha = $sql->fetch(PDO::FETCH_ASSOC);

            if ($linha) {
                $passagem = new Passagem();
                $passagem->setPassagemId($linha['passagemId']);
                $passagem->setcodPassagem($linha['codPassagem']);
                $passagem->setStatusPassagem($linha['statusPassagem']);

                $voo = new Voo();
                $voo->setNumeroVoo($linha['numeroVoo']);
                $voo->setOrigem($linha['origem']);
                $voo->setDestino($linha['destino']);
                $voo->setCodigoPassagem($linha['codPassagem']);
                $voo->setValor($linha['valor']);

                array_push($this->listaPassagensUsuario, $passagem);
                array_push($this->listaVooUsuario, $voo);
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function cancelaPassagem()
    {
        $codPassagem = $this->codPassagem;
        try {
            $banco = Conexao::getConexao();
            $sql = $banco->prepare("UPDATE dblendarioairlines.passagens SET statusPassagem = 'CANCELADA' WHERE codPassagem LIKE :codPassagem");
            $codPassagem ='%' .$codPassagem .'%';
            $sql->bindValue("codPassagem", $codPassagem);
            
            $codPassagem = $this->codPassagem;

            $sql->execute();


        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getPassagemId()
    {
        return $this->passagemId;
    }

    public function setPassagemId($passagemId)
    {
        $this->passagemId = $passagemId;
    }

    public function getUsuarioId()
    {
        return $this->usuarioId;
    }

    public function setUsuarioId($usuarioId)
    {
        $this->usuarioId = $usuarioId;
    }

    public function getStatusPassagem()
    {
        return $this->statusPassagem;
    }

    public function setStatusPassagem($statusPassagem): self
    {
        $this->statusPassagem = $statusPassagem;
        return $this;
    }

    public function getVooId()
    {
        return $this->vooId;
    }

    public function setVooId($vooId)
    {
        $this->vooId = $vooId;
    }

    public function getNumeroCadeira()
    {
        return $this->numeroCadeira;
    }

    public function setNumeroCadeira($numeroCadeira)
    {
        $this->numeroCadeira = $numeroCadeira;
    }

    public function getcodPassagem()
    {
        return $this->codPassagem;
    }

    public function setcodPassagem($codPassagem): self
    {
        $this->codPassagem = $codPassagem;
        return $this;
    }

    public function getListaPassagensUsuario()
    {
        return $this->listaPassagensUsuario;
    }

    public function setListaPassagensUsuario($listaPassagensUsuario): self
    {
        $this->listaPassagensUsuario = $listaPassagensUsuario;
        return $this;
    }

    public function getListaVooUsuario()
    {
        return $this->listaVooUsuario;
    }


    public function setListaVooUsuario($listaVooUsuario): self
    {
        $this->listaVooUsuario = $listaVooUsuario;
        return $this;
    }
}
