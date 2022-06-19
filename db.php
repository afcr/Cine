<?php
session_start();

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DBNAME', 'cine');

$db = new PDO('mysql:host=localhost;dbname=cine', USER, PASSWORD);

?>