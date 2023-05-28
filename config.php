<?php
include('classes/ConnectPDO.php');
date_default_timezone_set('America/Sao_Paulo');
session_start();


define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'manager_database');

$conn = new ConnectPDO(DB_SERVER, DB_NAME, DB_USERNAME, DB_PASSWORD);
?>