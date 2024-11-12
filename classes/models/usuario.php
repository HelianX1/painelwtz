<?php
require_once("classes/config.php");

class  usuario extends loja {
    
    private $idUsuario;
    private $Nome;
    private $Usuario;
    private $Senha;

    // setters
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }
    public function setNome($Nome) {
        $this->Nome = $Nome;
    }
    public function setUsuario($Usuario) {
        $this->Usuario = $Usuario;
    }
    public function setSenha($Senha) {
        $this->Senha = $Senha;
    }

    // getters
    public function getUsuario() {
        return $this->Usuario;
    }
    public function getSenha() {
        return $this->Senha = "admin";
    }





    
    
}

   
?>