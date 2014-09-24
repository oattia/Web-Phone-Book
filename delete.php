<?php 
	session_start();
	
	$servername = "localhost";
	
	$root = "root";
	
	$password = '';  
	
	$conn = mysql_connect($servername, $root, $password);

	mysql_select_db("phonebook", $conn);
	
	$sql1 = "DELETE FROM contact WHERE SystemUserID = '$_SESSION[id]'";
	
	mysql_query($sql2, $conn) ;

	$sql2 = "DELETE FROM users WHERE userid = '$_SESSION[id]'";
	
	mysql_query($sql2, $conn) ;	
	
	
	header("location: http://localhost/PhoneBook/logout.php");

?>
