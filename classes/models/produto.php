<?php
require_once("classes/config.php");
class produto {
    
    public $idProduto;
    private $TextoProduto;
    private $palavraChave;
    private $dataDeEdicao;
    private $contador;

    // setters
    public function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }
    private function setTextoProduto($TextoProduto) {
        $this->TextoProduto = $TextoProduto;
    }
    private function setPalavraChave($palavraChave) {
        $this->palavraChave = $palavraChave;
    }
    private function setDataDeEdicao($dataDeEdicao) {
        $this->dataDeEdicao = $dataDeEdicao;
    }
    private function setContador($contador) {
        $this->contador = $contador;
    }
    public function getIdProduto() {
        return $this->idProduto;
    }
    // Função para listar os produtos
    
}

?>