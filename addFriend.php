<?php
session_start();
if (isset($_SESSION['id']))
{
	$servername = "localhost";
	
	$root = "root";
	
	$password = ''; 
	
	$conn = mysql_connect($servername, $root, $password);

	mysql_select_db("phonebook", $conn);
	
		$var1 = $_POST["addfriend"];

		$sqlfrinds = "SELECT * FROM `contact` WHERE SystemUserID = '$_SESSION[id]' AND ContactUserID = '$var1' ";
		
		$resultfrinds = mysql_query($sqlfrinds, $conn) ;
		
		$rows1= mysql_num_rows($resultfrinds);
		

		if (!($rows1 == 0 || $rows1 == null))
		{
			echo "already your friend<br/>" ;
			
			if ($_SESSION['flag'] == 0)
				die ("<br/><a href = 'ControlPanel.html'>Back to control panel</a>");
			else 
				die("<br/><a href = 'AdminControlPanel.html'>Back to control panel</a>");

		}
		
		$sql = "insert into `contact`(SystemUserID, ContactUserID) values ('$_SESSION[id]', '$var1')";
		mysql_query($sql, $conn);

echo "<br/> friend added";

if ($_SESSION['flag'] == 0)
				die ("<br/><a href = 'ControlPanel.html'>Back to control panel</a>");
			else 
				die( "<br/><a href = 'AdminControlPanel.html'>Back to control panel</a>");
}else 
{
	header("location: http://localhost/PhoneBook/login.html");
}

?>