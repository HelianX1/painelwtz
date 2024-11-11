<?php
require_once("classes/config.php");
class loja {
    
    private $idLoja;
    private $NomeLoja;
    private $CNPJ;
    private $dataCriacao;
    private $dataAtualizacao;

    // setters
    public function setIdLoja($idLoja) {
        $this->idLoja = $idLoja;
    }
    private function setNomeLoja($NomeLoja) {
        $this->NomeLoja = $NomeLoja;
    }
    private function setCNPJ($CNPJ) {
        $this->CNPJ = $CNPJ;
    }
    private function setDataCriacao($dataCriacao) {
        $this->dataCriacao = $dataCriacao;
    }
    private function setDataAtualizacao($dataAtualizacao) {
        $this->dataAtualizacao = $dataAtualizacao;
    }
    public function getIdLoja() {
        return $this->idLoja;
    }
    // Função para listar as lojas
    public function listarLojas() {
    }
    // Função para adicionar lojas
    public function adicionarLoja(int $idLoja, string $NomeLoja, string $CNPJ, string $dataCriacao, string $dataAtualizacao) {
        $this->setIdLoja($idLoja);
        $this->setNomeLoja($NomeLoja);
        $this->setCNPJ($CNPJ);
        $this->setDataCriacao($dataCriacao);
        $this->setDataAtualizacao($dataAtualizacao);
    }

    

}
?>