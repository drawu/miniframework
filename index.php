<?php
 /**
  * Mini Framework
  * @author Devanir Weber
  * http://www.linkedin.com/pub/devanir-weber/14/168/0
  * @version 1.0.0
  * 
  * Porta de entrada do sistema
  * @index
  */
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once 'app/system/Application.php';

$o_Application = new Application();
$o_Application->dispatch();
