<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="login">
        <form action="" method="post" name="login">
            <fieldset>
                <legend class="heading">Admin Login</legend>
                <input type="text" name="userid" placeholder="Username" autocomplete="off">
                <input type="password" name="password" placeholder="Password" autocomplete="off">
                <input type="submit" value="Login">
            </fieldset>
        </form>
    </div>

    <div class="main">
        <div class="footer--info">
            <a href="index.html">Home</a>
            <a href="login.php">Results</a>
        </div>
    </div>

</body>

</html>

<?php

if (isset($_POST["userid"], $_POST["password"])) {
    $username = $_POST["userid"];
    $password = $_POST["password"];

    if ($username == "admin" and $password == "admin") {
        $_SESSION['login_user'] = $username;
        header("Location: dashboard.php");
    } else {
        echo '<script language="javascript">';
        echo 'alert("Invalid Username or Password")';
        echo '</script>';
    }
}

?>