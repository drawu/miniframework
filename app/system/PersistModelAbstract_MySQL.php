<?php
 /**
  * Mini Framework
  * @author Devanir Weber
  * http://www.linkedin.com/pub/devanir-weber/14/168/0
  * @version 1.0.0
  * Classe de conexao com o banco de dados
  */
    abstract class PersistModelAbstract_MySQL
    {
        protected $servidor_mysql;
        protected $usuario_mysql;
        protected $senha_mysql;
        protected $bd_mysql;
        protected $resultado_mysql;
        protected $link_mysql;

        function __construct()
        {
            $this->servidor_mysql="nome_do_servidor"; // ex.: localhost/ 127.0.0.1
            $this->usuario_mysql="usuario";
            $this->senha_mysql="senha";
            $this->bd_mysql="nome_do_banco";

            $this->link_mysql = @mysql_connect($this->servidor_mysql,$this->usuario_mysql,$this->senha_mysql);

            if(!$this->link_mysql)
            {
                echo "Erro ao conectar ao MySql- ".mysql_error();
                die();
            }
            else 
            {
                if(!mysql_select_db($this->bd_mysql,$this->link_mysql))
                {
                    echo "Erro ao selecionar o BD - ".mysql_error();
                    die();
                }
            }      
        }

        protected function executarMysql($sql='')
        {
            $this->resultado_mysql = mysql_query($sql);
            if($this->resultado_mysql)
            {
                return $this->resultado_mysql;
            }
            else
            {
                echo "Erro ao realizar consulta - ".  mysql_error();
                $this->desconectarMysql();
                die();

            }
        }
        protected function fetchRow($sql) {
            $result = $this->executarMysql($sql);
            return mysql_fetch_row($result);
        }

        protected function fetch($sql) {
            $result = $this->executarMysql($sql);
            return mysql_fetch_assoc($result);
        }

        protected function fetchAll($sql) {
            $data = array();
            $result = $this->executarMysql($sql);
            while($cursor = mysql_fetch_assoc($result)) {
                $data[] = $cursor;
            }
            return $data;
        } 
        
        protected function execute($sql) {
            $result = $this->executarMysql($sql);
            return $result;
        }          
    }