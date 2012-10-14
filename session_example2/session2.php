<?php
	session_start();
	
	//to store an array within the session array
	//makes an array
	$colors=array('red','yellow','blue');
	//adds it to our session
	$_SESSION['color']= $colors;
	$_SESSION['size'] = 'small';
	$_SESSION['shape'] = 'round';
	print "DONE!!";

?>