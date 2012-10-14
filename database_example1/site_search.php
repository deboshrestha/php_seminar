<?php

	/*Note creation and insertion of the data into the database is being done manually through phpmyadmin instead of embedding the sql queries in the php script */
	
	// Grab POST data sent from form
	$field = @$_POST['field'] ;
	$find = @$_POST['find'] ;
	$searching = @$_POST['searching'] ;
	
	//this is displayed if they have submitted the form
	if($searching == "yes")
	{
		echo "<h2>Results</h2><p>";
				
		//if they didn't enter a search term an error is displayed
		if($find == "")
		{
			echo "<p>You forgot to enter a search term ";
			exit;
		}
				
		//otherwise we connect to our database
		$con = mysql_connect("localhost","root","");
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("test",$con) or die(mysql_error());
				
		//filtering is done here
		$find = strtoupper($find);
		$find = strip_tags($find);
		$find = trim($find);
				
		//now we search for our search term in the field the user specified
		$data = mysql_query("SELECT * FROM users WHERE upper($field) LIKE '%$find%'",$con);
				
		//And we display the results
		while($result = mysql_fetch_array($data))
		{
			echo $result['fname'];
			echo " ";
			echo $result['lname'];
			echo "<br>";
			echo $result['info'];
			echo "<br>";
			echo "<br>";
		}
				
		//this counts the number of results- and if there wasn't any it gives them a little message explaining that
		$anymatches=mysql_num_rows($data);
		if($anymatches == 0)
		{
			echo "Sorry, but we can not find an entry to match your query <br><br>";
		}
		//and we remind them what they searched for
		echo "<b>Searched For:</b>". $find;
		mysql_close($con);
	}
			
?>