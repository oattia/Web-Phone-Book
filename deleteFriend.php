<?php
session_start();
if (isset($_SESSION['id']))
{
	$servername = "localhost";
	
	$root = "root";
	
	$password = ''; 
	
	$conn = mysql_connect($servername, $root, $password);

	mysql_select_db("phonebook", $conn);
	
		$var1 = $_POST["deletefriend"];

		$sqlfrinds = "DELETE FROM `contact` WHERE SystemUserID = '$_SESSION[id]' AND ContactUserID = '$var1' ";
		
		$resultfrinds = mysql_query($sqlfrinds, $conn) ;

echo "
<br/> friend deleted
<br/><a href = 'viewFrinds.php'>Back to view friends</a>";

}else 
{
	header("location: http://localhost/PhoneBook/login.html");
}

?>