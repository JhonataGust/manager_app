<?php
include('classes/ConnectPDO.php');
session_start();


define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'manager_database');

$conn = new ConnectPDO(DB_SERVER, DB_NAME, DB_USERNAME, DB_PASSWORD);
?>