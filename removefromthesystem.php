<?php 

	$servername = "localhost";
	
	$root = "root";
	
	$password = '';  
	
	$conn = mysql_connect($servername, $root, $password);

	mysql_select_db("phonebook", $conn);
	
	$varr = $_POST['removefromthesystem'] ;
	
	$sql = "DELETE FROM users WHERE userid= '$varr' ";
	
	mysql_query($sql, $conn) ;	

	$sql1 = "DELETE FROM contact WHERE SystemUserID = '$varr' ";
	
	mysql_query($sql1, $conn) ;	

	$sql2 = "DELETE FROM contact WHERE ContactUserID= '$varr' ";
	
	mysql_query($sql2, $conn) ;	

	
	header("location: http://localhost/PhoneBook/AdminControlPanel.html");

?>
