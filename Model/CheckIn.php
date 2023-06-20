<?php 
 require_once("Model/Conexao.php");
 require_once("Model/Voo.php");
 require_once("Model/Usuario.php");

 class CheckIn{
    private $codPassagem;
    private $numeroCadeira;
    private $usuarioId;
    private $validaCheckin;

   

    public function validaCheckin(){
        try{
            $banco = Conexao::getConexao();
            $sql = $banco->prepare("UPDATE dblendarioairlines.passagens SET validaCheckin = 1 WHERE codPassagem LIKE :codPassagem AND statusPassagem !='CANCELADA' AND usuarioId = :usuarioId");
            $sql->bindParam('codPassagem', $codPassagem);
            $sql->bindParam('usuarioId', $usuarioId);
            $usuarioId = $this->usuarioId;
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