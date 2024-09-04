<?php
$dbName = "connexion";
$dbUser = "root";
$dbPassword = "";

try {
		$db=new pdo("mysql:host=localhost;dbname=".$dbName.";charset=utf8", "root", "");
		
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) 
{
	$e->getMessage();
}

?>