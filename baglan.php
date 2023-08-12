<?php

try {
	$db=new PDO("mysql:host=localhost;dbname=qrmenu_db",'root','');
	//https://stackoverflow.com/questions/4361459/php-pdo-charset-set-names
	$db->exec("set names utf8");
} catch(PDOException $e){
	echo $e->getMessage();
}

?>
