<?php
 /**
  * Mini Framework
  * @author Devanir Weber
  * http://www.linkedin.com/pub/devanir-weber/14/168/0
  * @version 1.0.0
  */
session_start();
function __autoload($st_class)
{
	if(file_exists('app/system/'.$st_class.'.php'))
		require_once 'app/system/'.$st_class.'.php';    
}


/**
* Camada - Sistema / Controlladores
* Diretorio Pai - lib 
* 
* Verifica qual classe controlador (Controller) o usuário deseja chamar
* e qual metodo dessa classe (Action) deseja executar
* Caso o controlador (controller) não seja especificado, o IndexControllers será o padrão
* Caso o metodo (Action) nao seja especificado, o indexAction sera o padrao
*/
class Application
{   
	/**
	* Usada pra guardar o nome da classe
	* de controle (Controller) a ser executada
	* @var string
	*/
	protected $st_controller;
	
	
	/**
	* Usada para guardar o nome do metodo da
	* classe de controle (Controller) que deverá ser executado
	* @var string
	*/
	protected $st_action;

	/**
	* Verifica se os parametros de controlador (Controller) e acao (Action) foram
	* passados via parametros "Post" ou "Get" e os carrega tais dados
	* nos respectivos atributos da classe
	*/
	private function loadRoute()
	{
        /**
         * Antes de atribuir valor ao controller e a action 
         * testa se os paramentros vem por post/get ou pela url
         * Url::getURL(0) = controller passado pela url
         * Url::getURL(1) = action passado pela url
         */
        if(Url::getURL(0) && (!isset($_REQUEST['controller']) || $_REQUEST['controller']=='')) $_REQUEST['controller'] = Url::getURL(0);
        if(Url::getURL(1) && (!isset($_REQUEST['action'])     || $_REQUEST['action']==''))     $_REQUEST['action'] = Url::getURL(1);        
        /*
        * Se o controller nao for passado por GET,
        * assume-se como padrão o controller 'IndexController';
        */
        $this->st_controller = isset($_REQUEST['controller']) ?  $_REQUEST['controller'] : 'login';
        
        // Caso seja colocado index.php sera substituido por apenas index
        if($this->st_controller=="index.php") $this->st_controller = "login";
        /*
        * Se a action nao for passada por GET,
        * assume-se como padrão a action 'IndexAction';
        */
        $this->st_action = isset($_REQUEST['action']) ?  $_REQUEST['action'] : 'index';
	}
	
	/**
	* 
	* Instancia classe referente ao Controlador (Controller) e executa
	* método referente e  acao (Action)
	* @throws Exception
	*/
	public function dispatch()
	{
		$this->loadRoute();
		
		//verificando se o arquivo de controle existe
		$st_controller_file = 'app/controllers/'.ucfirst($this->st_controller).'Controller.php';
		if(file_exists($st_controller_file))
			require_once $st_controller_file;
		else
			throw new Exception('Arquivo '.$st_controller_file.' nao encontrado');
			
		//verificando se a classe existe
		$st_class = $this->st_controller.'Controller';
		if(class_exists($st_class))
			$o_class = new $st_class;
		else
			throw new Exception("Classe '$st_class' nao existe no arquivo '$st_controller_file'");
                
             
		//verificando se o metodo existe
		$st_method = $this->st_action.'Action';
		if(method_exists($o_class,$st_method))
			$o_class->$st_method();
		else
                        $st_method = 'indexAction';
                        $o_class->$st_method();
                        
		throw new Exception("Metodo '$st_method' nao existe na classe $st_class'");	
	}
	
	/**
	* Redireciona a chamada http para outra página
	* @param string $st_uri
	*/
	static function redirect( $st_uri )
	{
		header("Location: $st_uri");
	}
}