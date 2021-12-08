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
class OutroController
{
//    var $mdlLogin;
//    var $vwLogin;
    
    function __construct()
    {
//        $this->mdlLogin = new LoginModel();
//        $this->vwLogin = new View('app/views/login/login.phtml');        
    }
    /**
     * Renderiza a visao Login
     * @param type $msg
     * @return String e HTML
     */
    public function indexAction($msg='')
    {
        $url = new Url();
        $param = $url->UrlToParams();
        print_R($param);
        die;
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

