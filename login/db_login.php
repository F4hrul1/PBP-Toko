<?php
$db_host = 'localhost';
$db_database = 'tokel1';
$db_username = 'root';
$db_password = '';


// connect database
$db = new mysqli($db_host, $db_username, $db_password, $db_database);
if ($db->connect_errno){
    die ("Tidak menghubungkan database: <br />". $db->connect_error);
}


?>