<?php

session_start();

if(isset($_SESSION['id']))
{	

$servername = "localhost";
	
$root = "root";
	
$password = '';  
	
$conn = mysql_connect($servername, $root, $password);
		
mysql_select_db("phonebook", $conn);
	
	
	$usernameinput = $_POST["username"] ;
	$passwordinput = $_POST["password"] ;
	$firstnameinput = $_POST["first_name"] ;
	$lastnameinput = $_POST["last_name"] ;
	$phonenumberinput = $_POST["phone_number"] ;
	$emailinput = $_POST["email"];
	$addressinput = $_POST["address"] ;
	$notesinput = $_POST["notes"];
	
	if (($usernameinput == '' || $usernameinput == null) && ($passwordinput == '' || $passwordinput == null) && ($firstnameinput == '' || $firstnameinput == null )&& ($lastnameinput == '' || $lastnameinput == null) &&($phonenumberinput == '' || $phonenumberinput == null) && ($emailinput == '' || $emailinput == null) && ($addressinput == '' || $addressinput == null) && ($notesinput == '' || $notesinput == null) )
		{
		header("location: http://localhost/PhoneBook/ControlPanel.html");
		}
		
	if ($usernameinput != '' && $usernameinput != null)
		{
			$call1 ="SELECT * FROM users WHERE username = '$usernameinput'";
			$ask1 = mysql_query($call1, $conn) ;
			$rows1= mysql_num_rows($ask1);
			
			if ($rows1 == 0 || $rows1 == null){
				$sql1 = "UPDATE users SET username='$usernameinput' WHERE userid = '$_SESSION[id]' ";
				$ask1 = mysql_query($sql1, $conn) ;	
			}
			
		}
		
		if ($passwordinput != '' && $passwordinput != null)
		{
			$sql2 = "UPDATE users SET password='$passwordinput' WHERE userid = '$_SESSION[id]'";
			$ask2 = mysql_query($sql2, $conn) ;	
		}
		
		if ($firstnameinput != '' && $firstnameinput != null)
		{
			$sql3 = "UPDATE users SET firstName='$firstnameinput' WHERE userid = '$_SESSION[id]'";
			$ask3 = mysql_query($sql3, $conn) ;	
		}
		
		if ($lastnameinput != '' && $lastnameinput != null)
		{
			$sql4 = "UPDATE users SET lastName='$lastnameinput' WHERE userid = '$_SESSION[id]'";
			$ask4 = mysql_query($sql4, $conn) ;	
		}
		
		if ($phonenumberinput != '' && $phonenumberinput != null)
		{
			$sql4 = "UPDATE users SET phoneNumber='$phonenumberinput' WHERE userid = '$_SESSION[id]'";
			$ask4 = mysql_query($sql4, $conn) ;	
		}
		
		if ($emailinput != '' && $emailinput != null)
		{
			$call5 = "SELECT * FROM users WHERE email = '$emailinput' ";
			$ask5 = mysql_query($call5, $conn) ;
			$rows5= mysql_num_rows($ask5);
				
			if ($rows5 == 0 || $rows5== null){
				$sql6 = "UPDATE users SET email='$emailinput' WHERE userid = '$_SESSION[id]' ";
				$ask6 = mysql_query($sql6, $conn) ;	
			}
		}
		if ($addressinput != '' && $addressinput != null)
		{
			$sql7 = "UPDATE users SET address='$addressinput' WHERE userid = '$_SESSION[id]'";
			$ask7 = mysql_query($sql7, $conn) ;	
		}
		
		if ($notesinput != '' && $notesinput != null)
		{
			$sql8 = "UPDATE users SET notes='$notesinput' WHERE userid = '$_SESSION[id]'";
			$ask8 = mysql_query($sql8, $conn) ;	
		}
		
		header("location: http://localhost/PhoneBook/ControlPanel.html");
	
}
else 
{
	header("location: http://localhost/PhoneBook/login.html");
}

?>
