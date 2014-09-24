<?php

session_start();

if (isset($_SESSION['id']))
{
	$servername = "localhost";
	
	$root = "root";
	
	$password = '';  
	
	$conn = mysql_connect($servername, $root, $password);

	mysql_select_db("phonebook", $conn);
		
		$ii = $_POST["keyword"] ;
		
		$sqlfirst = "SELECT * FROM `users` WHERE firstName = '$ii'";
		$sqllast = "SELECT * FROM `users` WHERE lastName = '$ii'";
		$sqqqlphone = "SELECT * FROM `users` WHERE phoneNumber = '$ii'";
		$sqlemail = "SELECT * FROM `users` WHERE email = '$ii'";
		
		
		$resultfirst = mysql_query($sqlfirst, $conn) ;
		$resultlast = mysql_query($sqllast, $conn) ;
		$resultphone = mysql_query($sqqqlphone, $conn) ;
		$resultemail = mysql_query($sqlemail, $conn) ;
		
		
		$rows1= mysql_num_rows($resultfirst);
		$rows2= mysql_num_rows($resultlast);
		$rows3= mysql_num_rows($resultphone);
		$rows4= mysql_num_rows($resultemail);
		

		if (($rows1 == 0 || $rows1 == null)  && ($rows2 == 0 || $rows2 == null) && ($rows3 == 0 || $rows3 == null) && ($rows4 == 0 || $rows4 == null) )
		{
			echo "No results found by searching this keyword <br/>" ;
			if ($_SESSION['flag'] == 0)
				die ("<br/><a href = 'ControlPanel.html'>Back to control panel</a>");
			else 
				die( "<br/><a href = 'AdminControlPanel.html'>Back to control panel</a>");
		}
		
	//header
	echo "<table border = '1' width='100%' cellpadding='3' cellspacing='3'>
		
		<th>
		FirstName
		</th>
		
		<th>
		LastName
		</th>
		
		<th>
		phoneNumber
		</th>
		
		<th>
		Email
		</th>
		
		<th>
		Address
		</th>
		
		<th>
		add friend
		</th>
		";
  

while ($row = mysql_fetch_assoc($resultfirst)) {
	
	echo"<tr>
		
		<td>
		$row[firstName]
		</td>
		
		<td>
		$row[lastName]
		</td>
		
		<td>
		$row[phoneNumber]
		</td>
		
		<td>
		$row[email]
		</td>
		
		<td>
		$row[address]
		</td>";
		
		$sql11 = "SELECT * FROM `contact` WHERE SystemUserID = '$_SESSION[id]' AND ContactUserID = '$row[userid]'";
		$result11 = mysql_query($sql11, $conn);
		$rows11 = mysql_num_rows($result11);
		
		if ($rows11 == 0 && $_SESSION['id'] != $row['userid'])
		{
		echo"
		<td>
		<form name='input' action='addFriend.php' method='post'>
			<input type='submit'  name ='addfriend' value='$row[userid]'>
		</form>
		</td>";
		}else
		{
			echo"
		<td>
			already a friend 
		</td>";
		}
		
		echo"</tr>";
}


while ($row = mysql_fetch_assoc($resultlast)) {
	
	echo"<tr>
		
		<td>
		$row[firstName] 
		</td>
		
		<td>
		$row[lastName] 
		</td>
		
		<td>
		$row[phoneNumber] 
		</td>
		
		<td>
		$row[email] 
		</td>
		
		<td>
		$row[address] 
		</td>";
		
		$sql11 = "SELECT * FROM `contact` WHERE SystemUserID = '$_SESSION[id]' AND ContactUserID = '$row[userid]'";
		$result11 = mysql_query($sql11, $conn);
		$rows11 = mysql_num_rows($result11);
		
		if ($rows11 == 0 && $_SESSION['id'] != $row['userid'])
		{
		echo"
		<td>
		<form name='input' action='addFriend.php' method='post'>
			<input type='submit' name ='addfriend' value='$row[userid]'>
		</form>
		</td>";
		}else
		{
			echo"
		<td>
			already a friend 
		</td>";
		}
		echo"</tr>";
}

while ($row = mysql_fetch_assoc($resultphone)) {
	
	echo"<tr>
		
		<td>
		$row[firstName]
		</td>
		
		<td>
		$row[lastName]
		</td>
		
		<td>
		$row[phoneNumber]
		</td>
		
		<td>
		$row[email]
		</td>
		
		<td>
		$row[address]
		</td>";
		
		$sql11 = "SELECT * FROM `contact` WHERE SystemUserID = '$_SESSION[id]' AND ContactUserID = '$row[userid]'";
		$result11 = mysql_query($sql11, $conn);
		$rows11 = mysql_num_rows($result11);
		
		if ($rows11 == 0 && $_SESSION['id'] != $row['userid'])
		{
		echo"
		<td>
		<form name='input' action='addFriend.php' method='post'>
			<input type='submit'  name ='addfriend' value='$row[userid]'>
		</form>
		</td>";
		}else
		{
			echo"
		<td>
			already a friend 
		</td>";
		}
		echo"</tr>";
	
}

while ($row = mysql_fetch_assoc($resultemail)) {
	
	echo"<tr>
		
		<td>
		$row[firstName]
		</td>
		
		<td>
		$row[lastName]
		</td>
		
		<td>
		$row[phoneNumber]
		</td>
		
		<td>
		$row[email]
		</td>
		
		<td>
		$row[address]
		</td>";
		$sql11 = "SELECT * FROM `contact` WHERE SystemUserID = '$_SESSION[id]' AND ContactUserID = '$row[userid]'";
		$result11 = mysql_query($sql11, $conn);
		$rows11 = mysql_num_rows($result11);
		
		if ($rows11 == 0 && $_SESSION['id'] != $row['userid'])
		{
		echo"
		<td>
		<form name='input' action='addFriend.php' method='post'>
			<input type='submit' name ='addfriend' value='$row[userid]'>
		</form>
		</td>";
		}else
		{
			echo"
		<td>
			already a friend 
		</td>";
		}
		echo"</tr>";
	
	
}

echo " </table>" ;

if ($_SESSION['flag'] == 0)
				die ("<br/><a href = 'ControlPanel.html'>Back to control panel</a>");
			else 
				die( "<br/><a href = 'AdminControlPanel.html'>Back to control panel</a>");
}
else 
{
header("location: http://localhost/PhoneBook/login.html");
}
?>