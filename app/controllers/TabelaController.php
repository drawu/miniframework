<?php
//Requisicao do modelo usado na classe
//require_once 'app/models/LoginModel.php';
 /**
  * Mini Framework
  * @author Devanir Weber
  * http://www.linkedin.com/pub/devanir-weber/14/168/0
  * @version 1.0.0
  * 
  * Controller de entrada, valida usuario
  */
class TabelaController
{
//    var $mdlLogin;
    var $vwTabela;
    
    function __construct()
    {
//        $this->mdlLogin = new TabelaModel();
        $this->vwTabela = new View('app/views/tabela/tabela.phtml');        
    }
    /**
     * Renderiza a visao Login
     * @param type $msg
     * @return String e HTML
     */
    public function indexAction($msg='')
    {
        $this->vwTabela->setParams(array('msg' => $msg));
        $this->vwTabela->showContents();
    }

    /**
     *  Metodo de saida do sistema
     *  @return String validacao ou solicitacao de saida
     */
    public function logoutAction()
    {
        session_destroy();
        Application::redirect(URL::getBase().'login/index');
    }
}

