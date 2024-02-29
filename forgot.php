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
        <h1>Forgot Password</h1>
        <form method="POST" onsubmit="return validatePassword()">
            <label>Email</label>
            <input type="text" name="mail" require autofocus>


            <label>Password</label>
            <input type="password" name="pass" id="myInput" require>
            <label>Confirm </label>
            <input type="password" name="pass" id="myInput1" require>



            <input type="checkbox" id="check" onclick="myFunction()"><a>Show Password</a>
            <button type="submit" id="reg" name="submit">Forgot Password</button>
        </form>

        <!--function for hide and show passward -->
        <script>
            function myFunction() {
                var x = document.getElementById("myInput");
                var y = document.getElementById("myInput1");
                if (x.type === "password" && y.type === "password") {
                    x.type = "text";
                    y.type = "text";
                }
                else {
                    x.type = "password";
                    y.type = "password";
                }
            }
            function validatePassword() {
                var pass = document.getElementById("myInput").value;
                var confirmPass = document.getElementById("myInput1").value;
                if (pass != confirmPass) {
                    alert("Passwords do not match.");
                    return false;
                }
                return true;
            }

        </script>
</body>

</html>