<?php
 /**
  * Mini Framework
  * @author Devanir Weber
  * http://www.linkedin.com/pub/devanir-weber/14/168/0
  * @version 1.0.0
  * 
  * Controller de entrada, valida usuario
  */
class LoginModel // extends PersistModelAbstract_MySQL
{ 
    public $Usuario;
    public $Senha;
    public $TipoUsuario;
    public $CodUsuario;
    
    function __construct()
    {
//        parent::__construct();
    }


    /**
     * Bloco de getters e setters
     * @return Miscelaneous
     */
    public function getUsuario() {
        return $this->Usuario;
    }

    public function setUsuario($Usuario) {
        $this->Usuario = $Usuario;
    }

    public function getSenha() {
        return $this->Senha;
    }

    public function setSenha($Senha) {
        $this->Senha = $Senha;
    }

    public function getTipoUsuario() {
        return $this->TipoUsuario;
    }

    public function setTipoUsuario($TipoUsuario) {
        $this->TipoUsuario = $TipoUsuario;
    }

    public function getCodUsuario() {
        return $this->CodUsuario;
    }

    public function setCodUsuario($CodUsuario) {
        $this->CodUsuario = $CodUsuario;
    }


    /**
     * Exemplo:
     * Consulta dados do Usuario
     * @return Array
     */
    public function Usuario()
    {
        $sql= "
                SELECT * 
                FROM USUARIO 
                WHERE USUARIO = '${_SESSION['usuario']}'
                  AND SENHA = '${_SESSION['senha']}'";
        
        return $this->fetchAll($sql);
    }
    /**
     * Exemplo:
     * Consulta as permissoes de acesso do Usuario
     * @return Array
     */
    public function perfilUsuario()
    {
        $sql =" SELECT *
                FROM PERFILUSUARIO PU
                WHERE PU.USUARIO = '$this->Usuario' " ;
        
        return $this->fetchAll($sql);
    }
}
