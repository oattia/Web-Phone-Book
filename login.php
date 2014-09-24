<?php
	
session_start();

if (!isset($_SESSION['username']))
{

$servername = "localhost";
	
$root = "root";
	
$password = '';  

$conn = mysql_connect($servername, $root, $password);
mysql_select_db("phonebook", $conn);

$usernameinput = $_POST["username"] ;
$passwordinput = $_POST["password"];

$callusername ="SELECT * FROM users WHERE username = '$usernameinput'";

$queryusername = mysql_query($callusername, $conn) ;

$rowsUserName= mysql_num_rows($queryusername);


		if ($rowsUserName == 0)
		{
			//echo "UserName is not registered , please register first";	
			
			// redirect to register
			header("location: http://localhost/PhoneBook/register.html");
		}
	else{
		
		$callpassword ="SELECT * FROM users WHERE password = '$passwordinput'";
		
		$queryPassword = mysql_query($callpassword, $conn) ;

		$rowsPassword = mysql_num_rows($queryPassword);
		
		if($rowsPassword == 0)
		{	
			header("location: http://localhost/PhoneBook/login.html");
			
		}else
		{
			$sqql ="SELECT * FROM users WHERE username = '$usernameinput'";
			$queryuser = mysql_query($sqql, $conn) ;
			
			$_SESSION["username"] = $usernameinput ;
			
			$rower = mysql_fetch_assoc($queryuser); 
			
			$_SESSION["id"] = $rower["userid"];
				
			$_SESSION["emailbase"] = $rower["email"];
	
			$_SESSION["flag"]= $rower["flag"];
			
			if ($rower["flag"] == 1)//admin
			{
				header("location: http://localhost/PhoneBook/AdminControlPanel.html");
			}else if ($rower["flag"] == 0)//regular user
			{	
				header("location: http://localhost/PhoneBook/ControlPanel.html");
			}
		}
	}
	
}else
	{
	if ($_SESSION["flag"] == 1)//admin
			{
				header("location: http://localhost/PhoneBook/AdminControlPanel.html");
			}else if ($_SESSION["flag"] == 0)//regular user
			{	
				header("location: http://localhost/PhoneBook/ControlPanel.html");
			}
	}


?>
