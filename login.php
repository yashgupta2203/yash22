<?php
session_start();
include("db.php");
if(isset($_POST["submit"]))
{
  $captcha = $_POST['captcha'];
  $confiramcaptcha = $_POST['confirmcaptcha'];
  $gmail = $_POST['mail'];
  $password = $_POST['pass'];
  if($confiramcaptcha != $captcha)
  {
   echo "<script type='text/javascript'> alert('incorrect captcha please try again..')</script>";
  } 
    else
    if (!empty($gmail) && !empty($password) && !is_numeric($gmail))
    {
      $query ="select * from form where mail = '$gmail' limit 1";
      $result = mysqli_query($con, $query);
      if($result)
      {
        if($result && mysqli_num_rows($result) > 0)
        {
          $user_data = mysqli_fetch_assoc($result);
          if($user_data['pass'] == $password ) 
          {
            header("location:index.php");
            die;
          }
        }
      }  
       echo "<script type='text/javascript'> alert('wrong user name and password')</script>";
    }
    else
    {
      echo "<script type='text/javascript'> alert('wrong user name and password')</script>";
    }
}

?>
<!-------------------------------------------------------start html------------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> </title>
  <link rel="stylesheet" href="styleLS.css">
  </head>
  
  <body>
    <div class="login">
        <h1>Login</h1>
        <form  method="POST">
          <label>Email</label>
          <input type="text" name="mail" require autofocus>
          <label>Password</label>
          <input type="password" name="pass" id="myInput" require>
          <input type="checkbox" id="check" onclick="myFunction()"><a>Show Password</a>
          <input type="textc" class = "captcha2" name = "captcha"  value ="<?php echo substr(uniqid(), 5); ?>" >
          <input type="text"  class="captcha1" name = "confirmcaptcha" placeholder="Enter captcha" >
          <button type="submit" id = "reg" name="submit">Login</button>
        </form>
        <p><a href="signup.php">I don't have an account </a> </p>
        <p><a href="forgot.php">Forgot Password </a> </p>
         
         <!--function for hide and show passward -->
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







     







  
