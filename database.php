<?php 
//create connection credentials

$db_host = 'localhost';
$db_name = 'quiz';
$db_user = 'root';
$db_pass = 'root';

//create submit object 
$mysqli = new mysqli ($db_host, $db_user, $db_pass, $db_name);

if($mysqli->connect_error) {
    printf('Connect failed: %s\n', $mysqli->connect_error);
    exit();

}

?>