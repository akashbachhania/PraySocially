<?php
require('./class/init.php');
//Getting redirect object
$session=$init->getSession();
//Starting Session
$session->startSession();

if($session->__get('username')){
	echo "Hello ".$session->__get('username');
	echo  "<br>";
	echo "<a href='logout.php'>Logout</a>";
}
else{
	echo "<a href='index.php'>Please Login</a>";	
}
?>

