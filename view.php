<?php

session_start();

if (isset($_SESSION['id']))
{
	$servername = "localhost";
	
	$root = "root";
	
	$password = '';  
	
	$conn = mysql_connect($servername, $root, $password);

	mysql_select_db("phonebook", $conn);
		
		$ii = $_POST["query"] ;
		
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
		

		if (($rows1 == 0 || $rows1 == null)  && ($rows2 == 0 || $rows2 == null) && ($rows3 == 0 || $rows3 == null) && ($rows4 == 0 || $rows4 == null) && !($ii =="" || $ii == null) )
		{
			echo "No results found by searching this keyword <br/>" ;
			die ("<a href= 'ControlPanel.html'> Back to your Control Panel</a>");
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
		remove from the system
		</th>
		";
  
  
  if ($ii == "" || $ii == null)
		{
			$sqlall= "SELECT * FROM `users` where 1";
			$resultall = mysql_query($sqlall, $conn) ;
			
while ($row = mysql_fetch_assoc($resultall)) {
	
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
		
		if ($_SESSION['id'] != $row['userid'])
		{
		echo"
		<td>
		<form name='input' action='removefromthesystem.php' method='post'>
			<input type='submit'  name ='removefromthesystem' value='$row[userid]'>
		</form>
		</td>";
		}
		echo"</tr>";
}
			
	echo "</table>"	;

		die("<a href = 'AdminControlPanel.html'>go to admin control panel</a> <br/>");
		
}
		
  

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
	
		
		if ($_SESSION['id'] != $row['userid'])
		{
		echo"
		<td>
		<form name='input' action='removefromthesystem.php' method='post'>
			<input type='submit'  name ='removefromthesystem' value='$row[userid]'>
		</form>
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
		
		if ($_SESSION['id'] != $row['userid'])
		{
		echo"
		<td>
		<form name='input' action='removefromthesystem.php' method='post'>
			<input type='submit'  name ='removefromthesystem' value='$row[userid]'>
		</form>
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
		
		if ($_SESSION['id'] != $row['userid'])
		{
		echo"
		<td>
		<form name='input' action='removefromthesystem.php' method='post'>
			<input type='submit'  name ='removefromthesystem' value='$row[userid]'>
		</form>
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
		
		if ($_SESSION['id'] != $row['userid'])
		{
		echo"
		<td>
		<form name='input' action='removefromthesystem.php' method='post'>
			<input type='submit'  name ='removefromthesystem' value='$row[userid]'>
		</form>
		</td>";
		}
		echo"</tr>";
	
	
}

echo " </table>" ;

}
else 
{
header("location: http://localhost/PhoneBook/login.html");
}
?>