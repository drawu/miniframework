<?php
/**
* Essa classe responsavel por renderizar os arquivos HTML
* Diretorio Pai - lib  
* @author Devanir Weber
* @version 1.0
*/
class View
{
	/**
	* Armazena o conteudo HTML
	* @var string
	*/
	private $st_contents;
	
	/**
	* Armazena o nome do arquivo de visualizacao
	* @var string
	*/
	private $st_view;
	
	/**
	* Armazena os dados que devem ser mostrados ao reenderizar o 
	* arquivo de visualizacao
	* @var Array
	*/
	private $v_params;
	
	/**
	* Eh possivel efetuar a parametrizacao do objeto ao instanciar o mesmo,
	* $st_view eh o nome do arquivo de visualizacao a ser usado e 
	* $v_params sao os dados que devem ser utilizados pela camada de visualizacao
	* 
	* @param string $st_view
	* @param Array $v_params
	*/
	function __construct($st_view = null, $v_params = null) 
	{
		if($st_view != null) $this->setView($st_view);
                
		$this->v_params = $v_params;
	}	
	
	/**
	* Define qual arquivo html deve ser renderizado
	* @param string $st_view
	* @throws Exception
	*/
	public function setView($st_view)
	{
		if(file_exists($st_view))
			$this->st_view = $st_view;
		else
			throw new Exception("Arquivo de visao '$st_view' nao existe!");		
	}
	
	/**
	* Retorna o nome do arquivo que deve ser renderizado
	* @return string 
	*/
	public function getView()
	{
		return $this->st_view;
	}
	
	/**
	* Define os dados que devem ser repassados para view
	* @param Array $v_params
	*/
	public function setParams(Array $v_params)
	{
		$this->v_params = $v_params;	
	}
	
	/**
	* Retorna os dados que foram ser repassados ao arquivo de visualizacao
	* @return Array
	*/
	public function getParams()
	{
		return $this->v_params;
	}
	
	/**
	* Retorna uma string contendo todo 
	* o conteudo do arquivo de visualizacao
	* 
	* @return string
	*/
	public function getContents()
	{
		ob_start();
		if(isset($this->st_view))
			require_once $this->st_view;
		$this->st_contents = ob_get_contents();
   		ob_end_clean();
		return $this->st_contents;	
	}
	
	/**
	* Imprime o arquivo de visualizacao
	*/
	public function showContents()
	{
        //include aqui
        require_once 'app/template/cabecalho.php';
		echo $this->getContents();
        require_once 'app/template/rodape.php';
        exit;
	}
}