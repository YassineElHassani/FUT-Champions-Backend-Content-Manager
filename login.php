<?php
    $usernameError = "";
    $passwordError = "";
    $loginError = "";

    $trueLoginUsername = "admin";
    $trueLoginPassword = "Admin123";

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username)) {
            $usernameError = "Username is required!";
        }

        if (empty($password)) {
            $passwordError = "Password is required!";
        }

        if (empty($usernameError) && empty($passwordError)) {
            if ($username === $trueLoginUsername && $password === $trueLoginPassword) {
                header("Location: dashboard.php");
                exit();
            } else {
                $loginError = "Invalid username or password!";
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./src/img/logo.png" type="image/x-icon"/>
    <link rel="stylesheet" href="./style/loginStyle.css">
    <link rel="stylesheet" href="./style/style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="formContainer">
            <center><h3>Dashboard Login</h3></center><br><br>
            <form method="POST">
                <p>
                    <label for="username">Username:</label><br>
                    <input id="username" type="text" name="username" placeholder="Enter your username"/>
                    <p style="color: red;"><?php echo $usernameError; ?></p>
                </p><br>
                <p>
                    <label for="password">Password:</label><br>
                    <input id="password" type="password" name="password" placeholder="Enter your password"/>
                    <p style="color: red;"><?php echo $passwordError; ?></p>
                </p><br>
                <p style="color: red;"><?php echo $loginError; ?></p>
                <button name="submit" type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
