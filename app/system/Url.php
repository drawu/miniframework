<?php
 /**
  * Mini Framework
  * Classe designada a validacao de formato de dados
  * @author Devanir Weber
  * http://www.linkedin.com/pub/devanir-weber/14/168/0
  * @version 1.0.0
  * 
  * Classe que gera uma URL amigavel
  */
class Url {
    
    private static $url = null;
    private static $baseUrl = null;
    private static $urlToParams = null;
 
    public static function getBase()
    {
        if( self::$baseUrl != null )
            return self::$baseUrl;
 
        global $_SERVER;
        $inicioUrl = strlen( $_SERVER["DOCUMENT_ROOT"] );
        $excluirUrl = substr( $_SERVER["SCRIPT_FILENAME"], $inicioUrl, -9 );
        if( $excluirUrl[0] == "/" )
            self::$baseUrl = $excluirUrl;
        else
            self::$baseUrl = "/" . $excluirUrl;
        return self::$baseUrl;
    }
 
    public static function getURL( $id )
    {
        // Verifica se a lista de URL ja foi preenchida
        if( self::$url == null )
            self::getURLList();
         
        // Valida se existe o ID informado e retorna.
        if( isset( self::$url[ $id ] ) )
            return self::$url[ $id ];
         
        // Caso nao exista o ID, retorna nulo
        return null;
    }
     
    private static function getURLList()
    {
        global $_SERVER;
         
        // Primeiro traz todas as pastas abaixo do index.php
        $startUrl = strlen( $_SERVER["DOCUMENT_ROOT"] ) -1;
        $excluirUrl = substr( $_SERVER["SCRIPT_FILENAME"], $startUrl, -10 );
         
        // a variável $request possui toda a string da URL apos o dominio.
        $request = $_SERVER['REQUEST_URI'];
         
        // Agora retira toda as pastas abaixo da pasta raiz
        $request = substr( $request, strlen( $excluirUrl ) );
         
        // Explode a URL para pegar retirar tudo após o ?
        $urlTmp = explode("?", $request);
        $request = $urlTmp[ 0 ];

        
        // Explode a URL para pegar cada uma das partes da URL
        $urlExplodida = explode("/", $request);
         
        $retorna = array();
 
        for($a = 0; $a <= count($urlExplodida); $a ++)
        {
            if(isset($urlExplodida[$a]) AND $urlExplodida[$a] != "")
            {
                array_push($retorna, $urlExplodida[$a]);
            }
        }    
        self::$url = $retorna;
    }
    public function UrlToParams()
    {
        global $_SERVER;
        
        // a variavel $request possui toda a string da URL apos o dominio.
        $request = $_SERVER['REQUEST_URI'];
         
        // Agora retira toda as pastas abaixo da pasta raiz
        $request = substr( $request, strlen( Url::getBase() ) );
        
        // transforma em array os parametros da url e remove os 4 primeiros
        $parametros = array_slice(explode("/", $request), 2);

         $i = 0;
         $value = array();

         if (!empty($parametros)){
             //Alterna para itens impares na url sejam "paramentros" e pares "valores"
             foreach($parametros as $val){
                 if ($i % 2){
                     $value[] = $val;
                 } else {
                     $ind[] = $val;
                 }
                 $i++;
             }
         } else {
             $ind = array();
             $value = array();
         }

         if (count($ind) == count($value) && !empty($ind) && !empty($value))
             $parametros = array_combine($ind, $value); 
         else
             $parametros = array();
         return self::$urlToParams = $parametros;
    }
}
