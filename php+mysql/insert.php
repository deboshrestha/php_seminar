<?php
	if(isset($_POST['sub']))
	{
		$name=$_POST['name'];
		$college=$_POST['coll'];
		$age=$_POST['age'];

		$con = mysql_connect("localhost","root","");
		if (!$con)
				die('Could not connect: ' . mysql_error());
		
		mysql_select_db("my_db",$con);
		$result=mysql_query("INSERT into Persons VALUES('$name','$college','$age')",$con);
		if($result)
			echo "Succesful entry in database";
		mysql_close($con);
	}
?>

<html>
<body>
<h3 align="center">Insert into MySQL table</h3>
<form action="insert.php" method="POST" align="center">
Name: &nbsp;&nbsp;<input type="text" name="name" /><br/>
College: &nbsp;&nbsp;<input type="text" name="coll" /><br/>
Age: &nbsp;&nbsp;<input type="text" name="age" /><br/><br/>
<input type="submit" name="sub"/>
</form>
</body>
</html>
