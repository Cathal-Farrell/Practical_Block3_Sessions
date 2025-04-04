<?php 
    session_start();
    require_once ('config.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
    
<link rel="stylesheet" type="text/css" href="../css/signin.css">
    <title>Sign up</title>

    <script>
        function formValidate() {

            let user = document.getElementById("inputUsername").value.trim();
            let pass = document.getElementById("inputPassword").value;
            
            let text;
            let isValid = true;

            if (!user || !pass) {
                isValid = false;
                text = "Please input a username and password";
            } else if (pass.length < 8) {
                isValid = false;
                text = "Password should be at least 8 characters long";
            } 

            if (isValid == false) {
                event.preventDefault();
            }
            document.getElementById("errorMessage").innerHTML = text;
        }
    </script>
</head>

<body>
<div class="container">
    <form action="" method="post" name="Login_Form" class="form-signin">
        <h2 class="form-signin-heading">Please create a username and password</h2>
        <label for="inputUsername" >Username</label>
        <input name="Username" type="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword">Password</label>
        <input name="Password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button name="Submit" value="Login" class="button" type="submit" onclick="formValidate()">Sign up</button>
        <p id="errorMessage"></p>
        <?php
        if(isset($_POST['Submit'])) {
            $inputUser = $_POST['Username'];
            $inputPass = $_POST['Password'];

            $inputUser = testInput($inputUser);
            $inputPass = testInput($inputPass);

            $_SESSION['users'][$inputUser] = $inputPass;
            header('Location:login.php');
        }

        function testInput($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
    </form>
</div>
</body>
</html>
