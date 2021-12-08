<?php
 /**
  * Mini Framework
  * @author Devanir Weber
  * http://www.linkedin.com/pub/devanir-weber/14/168/0
  * @version 1.0.0
  * Classe de conexao com o banco de dados
  */
abstract class PersistModelAbstract_Oracle
{
    protected $servidor_oracle='caminho:porta/nome';  // Servidor Oracle
    protected $usuario_oracle='Ususario';// Usuario do banco
    protected $senha_oracle='Senha'; // Senha do banco
    protected $resultado_oracle;
    protected $link_oracle;
    public $sql;

    function __construct()
    {
        putenv("ORACLE_HOME=/opt/app/oracle/product/11.2.0/db_1");
        putenv("LD_LIBRARY_PATH=/opt/app/oracle/product/11.2.0/db_1/lib:/lib:/usr/lib");
        //informa ao php qual a linguagem ele deve usar, independente da lig. do banco 
        putenv("NLS_LANG=PORTUGUESE_BRAZIL.WE8ISO8859P1") or die("Falha ao inserir a variavel de ambiente");
    }

    public function abrirConexao()
    {
        $this->link_oracle = ocilogon($this->usuario_oracle,$this->senha_oracle,$this->servidor_oracle);

        if(!$this->link_oracle)
        {
            echo "<p>N&atilde;o foi possivel conectar-se ao servidor Oracle.</p>\n
                  <p><strong>Erro Oracle: ".  oci_error()."</strong></p>\n";
            exit();
        } 
    }

    protected function ora_consultar()
    {
        $this->abrirConexao();

        $this->resultado_oracle = oci_parse($this->link_oracle, $this->sql);

        if(oci_execute($this->resultado_oracle,OCI_COMMIT_ON_SUCCESS))
        {
            $this->ora_desconectar();
            return $this->resultado_oracle;
        }
        else
        {
            echo("<p>Erro Oracle: " . oci_Error() . "</p>");
            echo("<p>Query executada:<pre> " . $this->sql . "</pre></p>");
            $this->ora_desconectar();
            exit;
        }

    }

    protected function ora_desconectar()
    {
        return ocilogoff($this->link_oracle);
    } 
    protected function fetch($sql)
    {
        $this->sql = $sql;
        $result = $this->ora_consultar();
        return oci_fetch_assoc($result);
    }

    protected function fetchAll($sql)
    {
        $this->sql = $sql;
        $data = array();
        $result = $this->ora_consultar();
        while($cursor = oci_fetch_assoc($result)) {
            $data[] = $cursor;
        }
        return $data;
    }

    protected function execute($sql)
    {
        $this->sql = $sql;
        $result = $this->ora_consultar();
        return $result;
    }    
}