<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
  * Mini Framework
  * @author Devanir Weber
  * http://www.linkedin.com/pub/devanir-weber/14/168/0
  * @version 1.0.0
  * Livre para uso e modificaoes. 
  * Nao esquece de dar os creditos ;)
-->
<html>
    <head>
        <title>Sistema</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Sistema" />
        <meta name="keywords" content="Sistema"/>
        <script type="text/javascript" src="<?= URL::getBase();?>resources/js/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="<?= URL::getBase();?>resources/js/table/jquery.js"></script>
        <script type="text/javascript" src="<?= URL::getBase();?>resources/js/table/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?= URL::getBase();?>resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="<?= URL::getBase();?>resources/js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="<?= URL::getBase();?>resources/js/funcoes.js"></script> 
        <script type="text/javascript" src="<?= URL::getBase();?>resources/js/colorbox-master/jquery.colorbox-min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="<?= URL::getBase();?>resources/css/style.css" />     
        <link rel="stylesheet" type="text/css" href="<?= URL::getBase();?>resources/css/table/jquery.dataTables_themeroller.css" />
        <link rel="stylesheet" type="text/css" href="<?= URL::getBase();?>resources/css/table/jquery.dataTables.css" />
        <link rel="stylesheet" type="text/css" href="<?= URL::getBase();?>resources/css/ui-lightness/jquery-ui-1.10.3.custom.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= URL::getBase();?>resources/js/colorbox-master/example1/colorbox.css" /> 

        <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                var oTable = $('.tabelaPadrao').dataTable( {
                    "iDisplayLength": 20,
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers",
                    "aLengthMenu": [[20, 50, 100, -1], [20, 50, 100, "Tudo"]],
                    "oLanguage": {
                        "sProcessing": "Aguarde enquanto os dados sao carregados ...",
                        "sLengthMenu": "Mostrar _MENU_ registros por pagina",
                        "sZeroRecords": "Nenhum registro correspondente ao criterio encontrado",
                        "sInfoEmtpy": "Exibindo 0 a 0 de 0 registros",
                        "sInfo": "Exibindo de _START_ a _END_ de _TOTAL_ registros",
                        "sInfoFiltered": "",
                        "sSearch": "Procurar",
                        "oPaginate": {
                           "sFirst":    "Primeiro",
                           "sPrevious": "Anterior",
                           "sNext":     "Próximo",
                           "sLast":     "Último"
                           }
                    } 
                } );
            } );
        </script>       
    </head>
    <body dt_tabelaGrupo>
        <div id="page">
            <div class="header-container">
                <div class="header">
                    <div id="logo"><a href="<?= URL::getBase();?>login/index"><img alt="Logo" src="<?= URL::getBase();?>resources/images/free_30.png" /></a></div>
                    <div id="botao">
                        <div class="bemVindo" >&nbsp;&nbsp;Ola Fulano &nbsp;&nbsp;</div> 
                    </div>
                </div>
            </div> 
            <div class="content">
