<?php

	session_start();
	
	if (isset($_SESSION['id']))
{

	$servername = "localhost";
	
	$root = "root";
	
	$password = '';  
	
	$conn = mysql_connect($servername, $root, $password);

	mysql_select_db("phonebook", $conn);
	
		$sqlfrinds = "SELECT * FROM `contact` WHERE SystemUserID = '$_SESSION[id]'";
		
		$resultfrinds = mysql_query($sqlfrinds, $conn) ;
		
		$rows1= mysql_num_rows($resultfrinds);
		

		if (($rows1 == 0 || $rows1 == null))
		{
			echo "You have no registred friends in the system<br/>" ;
			
			if ($_SESSION['flag'] == 0)
				die ("<br/><a href = 'ControlPanel.html'>Back to control panel</a>");
			else 
				die ("<br/><a href = 'AdminControlPanel.html'>Back to control panel</a>");

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
		remove friend
		</th>
		";
  
		
while ($srow = mysql_fetch_assoc($resultfrinds))
{	
		$varvar = $srow['ContactUserID'] ;
		
		$sqler = "SELECT * FROM `users` WHERE userid = '$varvar'";
		
		$resulter = mysql_query($sqler, $conn);

while ($row = mysql_fetch_assoc($resulter)) {
	
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
		</td>
		<td>
		<form name='input' action='deleteFriend.php' method='post'>
			<input type='submit' name ='deletefriend' value='$row[userid]'>
		</form>
		</td>
		
		</tr>";
	
}//while

}
echo " </table>" ;

if ($_SESSION['flag'] == 0)
echo "<br/><a href = 'ControlPanel.html'>Back to control panel</a>";
else 
echo "<br/><a href = 'AdminControlPanel.html'>Back to control panel</a>";

}else 
{
	header("location: http://localhost/PhoneBook/login.html");
}

?>