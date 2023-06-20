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
    private $validaCheckIn;
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
                $passagem->setValidaCheckIn($linha['validaCheckIn']);
                
                
                $voo = new Voo();
                $voo->setNumeroVoo($linha['numeroVoo']);
                $voo->setOrigem($linha['origem']);
                $voo->setDestino($linha['destino']);
                $voo->setCodigoPassagem($linha['codPassagem']);

                array_push($this->listaPassagensUsuario, $passagem);
                array_push($this->listaVooUsuario, $voo);
            }

            var_dump(count($this->listaPassagensUsuario));


        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

  

    public function cancelaPassagem()
    {
        $codPassagem = $this->codPassagem;
        try {
            $banco = Conexao::getConexao();
            $sql = $banco->prepare("UPDATE dblendarioairlines.passagens SET statusPassagem = 'CANCELADA' WHERE codPassagem LIKE :codPassagem AND usuarioId= :usuarioId AND validaCheckin !=1");
            $codPassagem ='%' .$codPassagem .'%';
            $usuarioId = $this->usuarioId;
            $sql->bindValue("codPassagem", $codPassagem);
            $sql->bindValue("usuarioId", $usuarioId);
            
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

    public function getValidaCheckIn()
    {
        return $this->validaCheckIn;
    }



    public function setValidaCheckIn($validaCheckIn)
    {
        $this->validaCheckIn = $validaCheckIn;
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
