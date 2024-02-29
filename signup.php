<?php
session_start();
include("db.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$gender = $_POST['gender'];
$gmail = $_POST['mail'];
$password = $_POST['pass'];

$query="select * from form where mail='$gmail' limit 1";
$result = mysqli_query($con, $query);
if($result)
{
  if($result && mysqli_num_rows($result)>0)
  {
    $user_data = mysqli_fetch_assoc($result);
  }



  if (!empty($gmail) && !empty($password) && !is_numeric($gmail))
  {
    $query = "insert into form (fname,lname,gender,mail,pass) values('$firstname','$lastname','$gender','$gmail','$password')";
    mysqli_query($con, $query);
    echo "<script type='text/javascript'> alert('Successfully Register')</script>";
    header("location:login.php");
  }
  else
  {
    echo "<script type='text/javascript'> alert('Please Enter valid information')</script>"; 
  }
}
}




?>
<!------------------------------------------------------------ HTML START  ---------------------------------------------------------------------->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> </title>
  <link rel="stylesheet" href="styleLS.css">
</head>

<body>
  <div class="signup">
    <h1>Sign Up</h1>
    <form method="POST">
      <label>First Name</label>
      <input type="text" name="fname" required autofocus>
      <label>Last Name</label>
      <input type="text" name="lname" required>
      <label>Gender</label>
      <input type="text" name="gender" required>
      <label>Email</label>
      <input type="email" id="email" name="mail" required>
      <label>Password</label>
      <input type="password" name="pass" id= "myInput"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required >
      <input type="checkbox" id="check" onclick="myFunction()"><a>Show Password</a>
      <button type="submit" id = "reg" name="submit">Signup</button>
     </form>
      <p><a href="login.php">Already have an account   </a> </p>
  </div>
 <!--------------------------------------------------------- JAVA SCRIPT START ---------------------------------------------------------------->
 <script>
   function myFunction() 
   {
     var x = document.getElementById("myInput");
     if (x.type === "password") 
     {
       x.type = "text";
     } 
     else  
     {
       x.type = "password";
     }
   }
 </script>
 
</body>
</html>
