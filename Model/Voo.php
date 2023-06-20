<?php

require_once("Model/Conexao.php");

class Voo
{
    private $vooId;
    private $numeroVoo;
    private $valor;
    private $dataHoraPartida;
    private $dataHoraChegada;
    private $tipoVoo;
    private $codigoPassagem;
    private $qtdPassagem;
    private $origem;
    private $destino;
    private $listaVoosIda = array();
    private $listaVoosVolta = array();
    private $dadosVoo = array();

    private function a($dataVoo, $lugar1, $lugar2, $sentido)
    {
        $conexao = Conexao::getConexao();

        $buscaBanco = $conexao->prepare("SELECT vooId, tipoVoo, origem, destino, dataHoraPartida, numeroVoo, valor, dataHoraChegada, qtdPassagem 
                FROM dblendarioairlines.voos where origem=:lugar1 AND destino=:lugar2 AND qtdPassagem > 0 AND DATE(dataHoraPartida) = :dataVoo");

        $buscaBanco->bindParam("lugar1", $lugar1);
        $buscaBanco->bindParam("lugar2", $lugar2);

        $buscaBanco->bindParam("dataVoo", $dataVoo);





        $buscaBanco->execute();

        $resultado = $buscaBanco->setFetchMode(PDO::FETCH_ASSOC);
        while ($linha = $buscaBanco->fetch(PDO::FETCH_ASSOC)) {
            $voo = new Voo();
            $voo->setVooId($linha['vooId']);
            $voo->setTipoVoo($linha['tipoVoo']);
            $voo->setOrigem($linha['origem']);
            $voo->setDestino($linha['destino']);
            $voo->setDataHoraPartida($linha['dataHoraPartida']);
            $voo->setNumeroVoo($linha['numeroVoo']);
            $voo->setValor($linha['valor']);
            if ($sentido == 'ida') {
                array_push($this->listaVoosIda, $voo);
            } else {
                array_push($this->listaVoosVolta, $voo);
            }
        }
    }


    public function buscaVoo($dataIda, $dataVolta)
    {
        try {
            $origem = $this->origem;
            $destino = $this->destino;

            $this->a($dataIda,  $origem, $destino, 'ida');
            $this->a($dataVolta, $destino,   $origem, 'volta');
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function buscaDadosVoo($vooIdaId, $vooVoltaId)
    {
        try {
            $conexao = Conexao::getConexao();
            $sql = $conexao->prepare("SELECT vooId, tipoVoo, origem, destino, dataHoraPartida, numeroVoo, valor, dataHoraChegada, qtdPassagem, codPassagem 
            FROM dblendarioairlines.voos where vooId in (:vooIdaId, :vooVoltaId)");

            $sql->bindParam("vooIdaId", $vooIdaId);
            $sql->bindParam("vooVoltaId", $vooVoltaId);

            $sql->execute();

            $resultado = $sql->setFetchMode(PDO::FETCH_ASSOC);
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $voo = new Voo();
                $voo->setVooId($linha['vooId']);
                $voo->setTipoVoo($linha['tipoVoo']);
                $voo->setOrigem($linha['origem']);
                $voo->setDestino($linha['destino']);
                $voo->setDataHoraPartida($linha['dataHoraPartida']);
                $voo->setDataHoraChegada($linha['dataHoraChegada']);
                $voo->setNumeroVoo($linha['numeroVoo']);
                $voo->setValor($linha['valor']);
                $voo->setCodigoPassagem($linha['codPassagem']);
                array_push($this->dadosVoo, $voo);
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function compraVoo($usuarioId)
    {
        try {
            $conn = Conexao::getConexao();

            $sql = $conn->prepare("INSERT INTO dblendarioairlines.passagens (codPassagem, vooId, usuarioId, numeroCadeira, statusPassagem) 
            VALUES (:codPassagem, :vooId, :usuarioId, :numeroCadeira, 'ATIVA');");

            $sql->bindParam("codPassagem", $codigoPassagem);
            $sql->bindParam("vooId", $vooId);
            $sql->bindParam("usuarioId", $usuarioId);
            $sql->bindParam("numeroCadeira", $numeroCadeira);
            $codigoPassagem = $this->codigoPassagem;
            $vooId = $this->vooId;
            $numeroCadeira = rand(1, 60);

            $sql->execute();

            $sql2 = $conn->prepare("UPDATE dblendarioairlines.voos SET qtdPassagem = (qtdPassagem - 1) WHERE vooId = :vooId");
            $sql2->bindParam("vooId", $vooId);
            $sql2->execute();
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getVooId()
    {
        return $this->vooId;
    }

    public function setVooId($vooId)
    {
        $this->vooId = $vooId;
    }

    public function getNumeroVoo()
    {
        return $this->numeroVoo;
    }

    public function setNumeroVoo($numeroVoo)
    {
        $this->numeroVoo = $numeroVoo;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function getDataHoraPartida()
    {
        return $this->dataHoraPartida;
    }

    public function setDataHoraPartida($dataHoraPartida)
    {
        $this->dataHoraPartida = $dataHoraPartida;
    }

    public function getDataHoraChegada()
    {
        return $this->dataHoraChegada;
    }

    public function setDataHoraChegada($dataHoraChegada)
    {
        $this->dataHoraChegada = $dataHoraChegada;
    }

    public function getTipoVoo()
    {
        return $this->tipoVoo;
    }

    public function setTipoVoo($tipoVoo)
    {
        $this->tipoVoo = $tipoVoo;
    }

    public function getCodigoPassagem()
    {
        return $this->codigoPassagem;
    }

    public function setCodigoPassagem($codigoPassagem)
    {
        $this->codigoPassagem = $codigoPassagem;
    }

    public function getQtdPassagem()
    {
        return $this->qtdPassagem;
    }

    public function setQtdPassagem($qtdPassagem)
    {
        $this->qtdPassagem = $qtdPassagem;
    }

    public function getOrigem()
    {
        return $this->origem;
    }

    public function setOrigem($origem)
    {
        $this->origem = $origem;
    }

    public function getDestino()
    {
        return $this->destino;
    }

    public function setDestino($destino)
    {
        $this->destino = $destino;
    }

    public function getListaVoosIda()
    {
        return $this->listaVoosIda;
    }

    public function setListaVoosIda($listaVoosIda)
    {
        $this->listaVoosIda = $listaVoosIda;
    }

    public function getListaVoosVolta()
    {
        return $this->listaVoosVolta;
    }

    public function setListaVoosVolta($listaVoosVolta)
    {
        $this->listaVoosVolta = $listaVoosVolta;
    }

    public function getDadosVoo()
    {
        return $this->dadosVoo;
    }

    public function setDadosVoo($dadosVoo)
    {
        $this->dadosVoo = $dadosVoo;
    }
}
