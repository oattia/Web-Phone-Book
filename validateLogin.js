function validateLogin()
{
// checking the username for validity 

var x = document.forms["MyForm"]["username"].value;

if (x == null || x == "" || x.length = 0)
  {
  alert("Username must be filled");
  return false;
  }
  
  // checking the password for validity 
  
  var z = document.forms["MyForm"]["password"].value;
  
  if (z == null || z == "" ||z.length < 3)
  {
  alert("the password must be filled");
  return false;
  }
  
  return true ;
  
}