<?php
    require_once "Model/Conexao.php";

    class Reclamacao {
        private $reclamacaoId;
        private $idUsuario;
        private $reclamacaoTexto;
        private $codPassagem;
        private $listaReclamacao = array();
        private $statusReclamacao;
        private $passagemListada;

        public function listaPassagensParaReclamacao(){
            try{
                $banco = Conexao::getConexao();
               
                $sql = $banco->prepare("SELECT reclamacaoId, codPassagem, reclamacaoTexto, statusReclamacao FROM dblendarioairlines.reclamacao WHERE idUsuario = :idUsuario");
                $sql->bindParam("idUsuario", $idUsuario);
                $idUsuario = $this->idUsuario;
                $sql->execute();
                
                $resultado = $sql->setFetchMode(PDO::FETCH_ASSOC);
                while($linha = $sql->fetch(PDO::FETCH_ASSOC)){
                    $reclamacao = new Reclamacao();
                    $reclamacao->setReclamacaoId($linha['reclamacaoId']);
                    $reclamacao->setCodPassagem($linha['codPassagem']);
                    $reclamacao->setStatusReclamacao($linha['statusReclamacao']);
                    $reclamacao->setReclamacaoTexto($linha['reclamacaoTexto']);
                    
                    array_push($this->listaReclamacao, $reclamacao);
                }
                 
                
            }catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        public function cadastraReclamacao(){
            try{
                $banco = Conexao::getConexao();
                $sql = $banco->prepare("INSERT INTO dblendarioairlines.reclamacao (idUsuario, codPassagem, reclamacaoTexto, statusReclamacao) 
                VALUES (:idUsuario, :codPassagem, :reclamacaoTexto, 'Em analise');");

                $sql->bindParam("idUsuario", $idUsuario);
                $sql->bindParam("codPassagem", $codPassagem);
                $sql->bindParam("reclamacaoTexto", $reclamacaoTexto);

                $idUsuario = $this->idUsuario;
                $codPassagem = $this->codPassagem;
                $reclamacaoTexto =  $this->reclamacaoTexto;
                $sql->execute();


            }catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        public function cancelaReclamacao(){
            try{
                $banco = Conexao::getConexao();
                $sql = $banco->prepare("UPDATE dblendarioairlines.reclamacao SET statusReclamacao = 'Cancelada' WHERE reclamacaoId = :reclamacaoId;");

                $sql->bindParam("reclamacaoId", $reclamacaoId);


                $reclamacaoId = $this->reclamacaoId;
                $sql->execute();


            }catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        public function getReclamacaoId() {
            return $this->reclamacaoId;
        }
    
        public function setReclamacaoId($reclamacaoId) {
            $this->reclamacaoId = $reclamacaoId;
        }
    
        public function getIdUsuario() {
            return $this->idUsuario;
        }
    
        public function setIdUsuario($idUsuario) {
            $this->idUsuario = $idUsuario;
        }
    
        public function getReclamacaoTexto() {
            return $this->reclamacaoTexto;
        }
    
        public function setReclamacaoTexto($reclamacaoTexto) {
            $this->reclamacaoTexto = $reclamacaoTexto;
        }
    
        public function getCodPassagem() {
            return $this->codPassagem;
        }
    
        public function setCodPassagem($codPassagem) {
            $this->codPassagem = $codPassagem;
        }
    
        public function getListaReclamacao() {
            return $this->listaReclamacao;
        }
    
        public function setListaReclamacao($listaReclamacao) {
            $this->listaReclamacao = $listaReclamacao;
        }
    
        public function getStatusReclamacao() {
            return $this->statusReclamacao;
        }
    
        public function setStatusReclamacao($statusReclamacao) {
            $this->statusReclamacao = $statusReclamacao;
        }
    
        public function getPassagemListada() {
            return $this->passagemListada;
        }
    
        public function setPassagemListada($passagemListada) {
            $this->passagemListada = $passagemListada;
        }
    
    }
?>