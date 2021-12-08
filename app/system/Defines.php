<?php
 /**
  * Mini Framework
  * @author Devanir Weber
  * http://www.linkedin.com/pub/devanir-weber/14/168/0
  * @version 1.0.0
  */
define('SERVIDOR',$_SERVER["DOCUMENT_ROOT"].'/Login/Login/');

/* Define para tamanho de arquivos em servidor */
define('MAX_UPLOAD_FILE_SIZE', 5*1024*1024);    //5242880 Limite de tamanho para 1 arquivo 5MB
define('MAX_UPLOAD_SIZE', 8*1024*1024);         //8388608 Limite de tamanho para 1 conjunto de arquivos 8MB
define('MAX_ANEXOS_PERMITIDOS',20);         // Numero limite de anexos que podem ser enviados no correio
define('MAX_FILE_SIZE_READ', 8*1024);         //8192 bytes Limite que a funcao de leitura le de um arquivo

/* Defines para helpers */
define('ERRO',0);
define('SUCESSO',1);
define('ALERTA',2);
define('INFO',3);

