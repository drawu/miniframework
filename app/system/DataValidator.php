<?php
 /**
  * Mini Framework
  * Classe designada a validacao de formato de dados
  * @author Devanir Weber
  * http://www.linkedin.com/pub/devanir-weber/14/168/0
  * @version 1.0.0
  */
class DataValidator
{
	/**
	* Vefifica Sessao 
	* @param null
	* @return bool
	*/
	static function verifySession()
	{
        if(!$_SESSION)
        {
            require_once 'controllers/LoginController.php';
            $obj = new LoginController();
            $obj->logoutAction();
        }
        else
        {
            return true;
        }
	}
         
	/**
	* Verifica se o dado passado esta vazio
	* @param mixed $mx_value
	* @return boolean
	*/
	static function isEmpty( $mx_value )
	{
		if(!(strlen($mx_value) > 0))
			return true;	
		return false;
	}
	
	/**
	* Verifica se o dado passado e um numero
	* @param mixed $mx_value;
	* @return boolean
	*/
	static function isNumeric( $mx_value )
	{
		$mx_value = str_replace(',', '.', $mx_value);
		if(!(is_numeric($mx_value)))
			return false;
		return true;
	}
	
	/**
	* Verifica se o dado passado e um numero inteiro
	* @param mixed $mx_value;
	* @return boolean
	*/
	static function isInteger( $mx_value )
	{
		if(!DataValidator::isNumeric($mx_value))
			return false;
		
		if(preg_match('/[[:punct:]&^-]/', $mx_value) > 0)
			return false;
		return true;
	}
     
    /**
     * Rebece dois parametros e devolve uma msg
     * de acordo com eles
     * @param $msg e $tipo
     * @return html
     */
    static function getMsg($msg='',$tipo='')
    {
        if($msg != '' && $tipo!= ''){
            switch ($tipo){
                case 'erro':                                                   
                        return '<span id="centro" style="color: red"><img src="'.URL::getBase().'resources/images/wrong.png">  '.$msg.'  <img src="'.URL::getBase().'resources/images/wrong.png"> </span>' ;
                    break;                    
                case 'sucesso':
                        return '<span id="centro" style="color: green"><img src="'.URL::getBase().'resources/images/success.png"> '.$msg.' <img src="'.URL::getBase().'resources/images/success.png"></span>' ;
                    break;                    
                case 'info':
                        return '<span id="centro" style="color: grey"><img src="'.URL::getBase().'resources/images/info.png">  '.$msg.' <img src="'.URL::getBase().'resources/images/info.png"></span>' ;
                    break;                    
                default :
                        return '<span id="centro" style="color: orange"><img src="'.URL::getBase().'resources/images/warning.png">  '.$msg.' <img src="'.URL::getBase().'resources/images/warning.png"></span>' ;
                    break;
            }
        }
    }
        
    /**
     * Util apenas para desenvolvimento, debugar codigo
     * @param Array $ar
     * @return Array formatado para debug
     */
    static function printArray($ar){
        echo "<pre>";
        print_r($ar);
        echo "</pre>";
        die;
    }
}
