<?php
$con = mysql_connect("localhost","root","");
if (!$con)
	die('Could not connect: ' . mysql_error());

// Create database
$query=mysql_query("CREATE DATABASE my_db",$con);
if($query)
	echo "Database created";
else
	echo "Error creating database: " . mysql_error();

// Create table
mysql_select_db("my_db", $con);
$sql = "CREATE TABLE Persons
(
Name varchar(15),
College varchar(15),
Age int
)";

// Execute query
mysql_query($sql,$con);
mysql_close($con);
?>