<?php
/**
 * Mini Framework
 * @author Devanir Weber
 * http://www.linkedin.com/pub/devanir-weber/14/168/0
 * @version 1.0.0
 * 
 * Diretorio Pai - controllers 
 * 
 * Controlador que deve ser chamado quando nao for
 * especificado nenhum outro
 */
class IndexController
{
	/**
	* Acao que deve ser executada quando 
	* nenhuma outra for especificada, do mesmo jeito que o
	* arquivo index.html ou index.php deve ser executado quando nenhum for
	* referenciado
	*/
	public function indexAction()
	{
		//redirecionando para a pagina de login
		header('Location:'. URL::getBase().'login/index');
	}
}