<?php
	if(isset($_POST['submit']))
	{
		$name=$_POST['name'];
		
		$con = mysql_connect("localhost","root","");
		if (!$con)
				die('Could not connect: ' . mysql_error());
		
		mysql_select_db("my_db",$con);
		$result=mysql_query("SELECT * from Persons where Name='$name' ",$con);
		$num=mysql_num_rows($result);
		if($num==0)
			echo "Name does not exist in the database";
		else
		{
			for($i=0;$i<$num;$i++)
			{
				$res=mysql_fetch_row($result);
				echo "College is ".$res[1];
				echo " Age is ".$res[2];
				echo "<br/>";
			}
		}
		mysql_close($con);
	}
?>

<html>
<body>
<h3 align="center">Select from MySQL table</h3>
<form action="select.php" method="POST" align="center">
Name: &nbsp;&nbsp;<input type="text" name="name" /><br/>
<input type="submit" name="submit"/>
</form>
</body>
</html>
