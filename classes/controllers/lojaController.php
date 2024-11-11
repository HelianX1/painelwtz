<?php
require_once("classes/config.php");
class lojaController {
    
    public $idLoja;
    private $NomeLoja;
    private $CNPJ;
    private $dataCricao;
    private $dataAtualizacao;

    public function getIdLoja(){
        return $this->idLoja;
    }
}
?>