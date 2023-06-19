<?php 
 require_once("Model/Conexao.php");
 require_once("Model/Voo.php");
 require_once("Model/Usuario.php");

 class CheckIn{
    private $codPassagem;
    private $numeroCadeira;
    private $usuarioId;
    private $validaCheckin;

    public function pesquisaCheckIn(){
        $codPassagem = $this->codPassagem;
        $usuarioId = $this->usuarioId;

        if($codPassagem && $usuarioId){
            try {
                $banco = Conexao::getConexao();
                $sql = $banco->prepare("SELECT  p.codPassagem as codigoPassagem, v.origem as origem, v.destino as destino, 
                v.numeroVoo as numeroVoo, v.dataHoraPartida as dataHoraPartida, v.dataHoraChegada dataHoraChegada, u.nome as nomeUsuario, 
                p.validaCheckin as validaCheckin, p.numeroCadeira as numeroCadeira
                FROM dblendarioairlines.voos v 
                JOIN dblendarioairlines.passagens p ON v.vooId = p.vooId JOIN dblendarioairlines.usuarios u ON u.usuarioId = p.usuarioId 
                WHERE p.codPassagem LIKE :codPassagem AND p.usuarioId = :usuarioId");

                $codPassagem ='%' .$codPassagem .'%';
                $sql->bindValue('codPassagem', $codPassagem);
                $sql->bindParam('usuarioId', $usuarioId);
                $sql->execute();

                $linha = $sql->setFetchMode(PDO::FETCH_ASSOC);
                $voo = new Voo();
                $usuario = new Usuario();
                $checkin = new CheckIn();

                while($linha = $sql->fetch(PDO::FETCH_ASSOC)){
                    $voo->setOrigem($linha['origem']);
                    $voo->setDestino($linha['destino']);
                    $voo->setNumeroVoo($linha['numeroVoo']);
                    $voo->setDataHoraPartida($linha['dataHoraPartida']);
                    $voo->setDataHoraChegada($linha['dataHoraChegada']);
                    $voo->setCodigoPassagem($linha['codigoPassagem']);
                    $usuario->setNome($linha['nomeUsuario']);
                    $checkin->setValidaCheckin($linha['validaCheckin']);
                    $checkin->setNumeroCadeira($linha['numeroCadeira']);
                    return [$voo, $usuario, $checkin];
                }

            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
    }

    public function validaCheckin(){
        try{
            $banco = Conexao::getConexao();
            $sql = $banco->prepare("UPDATE dblendarioairlines.passagens SET validaCheckin = 1 WHERE codPassagem LIKE :codPassagem");
            $sql->bindParam('codPassagem', $codPassagem);
            $codPassagem = $this->codPassagem;
            $codPassagem ='%' .$codPassagem .'%';
            $sql->execute();

         } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
         }
    }

    public function getCodPassagem() {
        return $this->codPassagem;
    }

    public function setCodPassagem($codPassagem):self {
        $this->codPassagem = $codPassagem;
        return $this;
    }

    public function getNumeroCadeira() {
        return $this->numeroCadeira;
    }

    public function setNumeroCadeira($numeroCadeira):self {
        $this->numeroCadeira = $numeroCadeira;
        return $this;
    }

    public function getUsuarioId() {
        return $this->usuarioId;
    }

    public function setUsuarioId($usuarioId):self {
        $this->usuarioId = $usuarioId;
        return $this;
    }

    public function getValidaCheckin() {
        return $this->validaCheckin;
    }

    public function setValidaCheckin($validaCheckin):self {
        $this->validaCheckin = $validaCheckin;
        return $this;
    }
}
 
?>