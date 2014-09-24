function validateForm()
{
// checking the username for validity 

var x = document.forms["MyForm"]["username"].value;

if (x == null || x == "")
  {
  alert("Username must be filled");
  return false;
  }
  
  // checking the two passwords for validity 
  
  var z = document.forms["MyForm"]["password"].value;
  
  var u = document.forms["MyForm"]["password_confirm"].value;
  
  if (z == null || z == "" || u == null || u == ""  || z != u || z.length < 3)
  {
  alert("the password you enterd does not match the requirements,the two passwords should be identical ,and it's length is not less than 3 charachters");
  return false;
  }
  
  
  //checking the phone number for validity 
  var numberr = document.forms["MyForm"]["phone_number"].value;
  
  if (numberr == null || numberr == "" || numberr.length < 5)
  {
	alert("Wrong Phone Number");
	
	return false ;
  }
   var possible  = "0123456789";

  for (var i = 0 ; i < numberr.length ; i++)
  {	
  
	var numpos= possible.indexOf(numberr[i]);
		
		if (numpos < 0)
		{
			alert("Wrong Phone Number");
			return false ;
		}	
	
  }
  
  //checking the first name and last name for validity
  var firstName = document.forms["MyForm"]["first_name"].value;
  var lastName = document.forms["MyForm"]["last_name"].value;
  
  if (firstName == null || firstName == "" || firstName.length < 3  || numberr.length > 15 || lastName == null || lastName == "" || lastName.length < 3  || lastName.length > 15)
  {
	alert("please input a proper First name and Last name");
	return false ;
  }
  
   var possibleChars  = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

  for (var i = 0 ; i < firstName.length ; i++)
  {	
  
		var letterpos= possibleChars.indexOf(firstName[i]);
		
		if (letterpos < 0)
		{
			alert("please input a proper First name and Last name");
			return false ;
		}	
	
  }
  
  for (var i = 0 ; i < lastName.length ; i++)
  {	
  
	var letterpos= possibleChars.indexOf(lastName[i]);
		
		if (letterpos < 0)
		{
			alert("please input a proper First name and Last name");
			return false ;
		}	
	
  }
  
  
  // checking the email for validity
  
 var y = document.forms["MyForm"]["email"].value;
	
	if (y != null && y != ""){
	
	var atpos= y.indexOf("@");
 
	var dotpos= y.lastIndexOf(".");

	if (atpos < 1 || dotpos < atpos + 3 || dotpos + 3 >= y.length)
	{
	alert("Not a valid e-mail address");
	return false;
	}
	
	}
   
}