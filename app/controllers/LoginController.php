<?php
//Requisicao do modelo usado na classe
require_once 'app/models/LoginModel.php';
 /**
  * Mini Framework
  * @author Devanir Weber
  * http://www.linkedin.com/pub/devanir-weber/14/168/0
  * @version 1.0.0
  * 
  * Controller de entrada, valida usuario
  */
class LoginController
{
    var $mdlLogin;
    var $vwLogin;
    
    function __construct()
    {
        $this->mdlLogin = new LoginModel();
        $this->vwLogin = new View('app/views/login/login.phtml');        
    }
    /**
     * Renderiza a visao Login
     * @param type $msg
     * @return String e HTML
     */
    public function indexAction($msg='')
    {
        $this->vwLogin->setParams(array('msg' => $msg));
        $this->vwLogin->showContents();
    }
    /**
     * Valida o usuario e direciona para o local permitido
     * @param null
     * @return Array com dados de acesso ou String com msg adequada
     */
    public function validarLoginAction()
    {
        $this->mdlLogin->setUsuario((isset($_REQUEST['Usuario'])?$_REQUEST['Usuario']:''));
        $this->mdlLogin->setSenha((isset($_REQUEST['Senha'])?$_REQUEST['Senha']:''));        

        //Armazena no array os dados do usuario
        //Se nao existe dados cadastrados, retorna erro ou leva para cadastro
        if(!$this->mdlLogin->getUsuario())
        { 
            $this->indexAction(DataValidator::getMsg ('Usuario ou Senha invalidos','erro'));
        }
        else // senao, permite acesso
        {
            $this->acessoPerfilUsuarioAction($this->mdlLogin->getUsuario());
        }
        
    }
    
    /**
     * Metodo de entrado do sistema, direciona o usuario para 
     * os ambiente com permissao de acesso
     * @param array $ar_dadosUsuario
     * @return Objetos e/ou Classes as quais o usuario tem permissao de acesso
     */
    public function acessoPerfilUsuarioAction($Usuario=null)
    {
        $_SESSION['Usuario'] = $Usuario;

        // O ideal seria criar uma tabela que retorna o perfil de acesso
        switch ($_SESSION['Usuario']){
            case "teste"://redireciona para o controller chamado "outro" acao "index"
                Application::redirect(URL::getBase().'outro/index/euSouParametro/euSouValor/euSouOutroParamentro/EuSouOutroValor');
                break;

            case "tabela"://redireciona para o controller chamado "perfil_2" acao "index"
                Application::redirect(URL::getBase().'tabela/index');
                break;

            case "teste3"://redireciona para o controller chamado "perfil_3" acao "index"
                Application::redirect(URL::getBase().'perfil_3/index');
                break;

            case "teste4"://redireciona para o controller chamado "perfil_4" acao "index"
                Application::redirect(URL::getBase().'perfil_4/index');
                break;
        }
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

