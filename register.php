<?php

$servername = "localhost";
	
$root = "root";
	
$password = '';  
	
	$usernameinput = $_POST["username"] ;
	$emailinput = $_POST["email"];
	
	$conn = mysql_connect($servername, $root, $password);
	
	mysql_select_db("phonebook", $conn);
	
		$call1 ="SELECT * FROM users WHERE username = '$usernameinput'";
		$ask1 = mysql_query($call1, $conn) ;
		$rows1= mysql_num_rows($ask1);
		
		
		$call2 ="SELECT * FROM users WHERE email = '$emailinput'";
		$ask2 = mysql_query($call2, $conn) ;
		$rows2= mysql_num_rows($ask2);
		
		if ($rows1 > 0 && $usernameinput != "" && $usernameinput !=null)
		{
			echo "User Name is already there, please choose another username <br/>";	
			
			echo "if you are " ;
			
			echo $usernameinput ;
			
			echo " please <a href = 'login.html'>Log in to your account</a>";
			
		}else if ($rows2 > 0 && $emailinput != "" && $emailinput != null)
		{
			echo "Email is already there, please choose another Email";	
			
			echo "if " ;
			
			echo $usernameinput ;
			
			echo " is your email " ;
			
			echo " please <a href = 'login.html'>Log in to your account</a>";
		}
		else{
		
		$var1 = $_POST["username"];
		$var2 = $_POST["password"];
		$var3 = $_POST["first_name"];
		$var4 = $_POST["last_name"];
		$var5 = $_POST["phone_number"] ;
		$var6 = $_POST["email"];
		$var7 = $_POST["address"];
		$var8 = $_POST["notes"];
		
		
		$sql = "insert into users(username, password, firstName, lastName, phoneNumber, email,address,notes) values ('$var1', '$var2', '$var3', '$var4', '$var5', '$var6', '$var7', '$var8')";
		mysql_query($sql, $conn);
		echo "A new user by the name $var1 has been added";
		echo "<br/>please <a href = 'login.html'>LOG In</a> to reach your Control panel ";
		}


?>
