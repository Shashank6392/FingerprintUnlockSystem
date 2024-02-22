<?php
/* Database config */
$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= '';
$db_database	= 'fus'; 

$conn = new mysqli($db_host, $db_user, $db_pass,$db_database);
if ($conn-> connect_error) {
	die("Connection Failed".$conn->connect_error);
}

/* End config 

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
*/

?>