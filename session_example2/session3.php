<?php
	session_start();
	Print_r($_SESSION);
	echo "<p>";
	
	//echo a single entry from the array
	echo $_SESSION['color'][2];
?>