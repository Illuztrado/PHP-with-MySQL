<?php

session_start();
require_once("new-connection.php");

// $query = "SELECT first_name, last_name, email FROM users";
// $result = fetch_all($query);
// var_dump($result);
// echo $result[0]["email"];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="This is the 'Home' page for the Login and Registration PHP exercise.">
        <title>Login and Registration</title>
        <link rel="stylesheet" type="text/css" href="log-reg-style.css">
    </head>
    <body>
<?php   if(isset($_SESSION["errors"])) {
            foreach($_SESSION["errors"] as $error) {    ?>
                <?= "<p>".$error."<p>"; ?>
<?php       }
            unset($_SESSION["errors"]); 
        }
        if(isset($_SESSION["success_message"])) {   ?>
            <?= "<p>".$_SESSION["success_message"]."<p>";
            unset($_SESSION["success_message"]);
        }   ?>
        <h2>Register</h2>
        <form action="process.php" method="post">
            <label for="first_name">First name: 
                <input type="text" name="first_name">
            </label>
            <label for="last_name">Last name: 
                <input type="text" name="last_name">
            </label>
            <label for="email">Email: 
                <input type="text" name="email">
            </label>
            <label for="password">Password: 
                <input type="password" name="password">
            </label>
            <label for="confirm_password">Confirm Password: 
                <input type="password" name="confirm_password">
            </label>
            <input type="hidden" name="action" value="register"> 
            <input type="submit" value="Register">
        </form>
        <h2>Log in</h2>
        <form action="process.php" method="post">
            <label for="email">Email: 
                <input type="text" name="email">
            </label>
            <label for="password">Password: 
                <input type="password" name="password">
            </label>
            <input type="hidden" name="action" value="login">
            <input type="submit" value="Log in">
        </form>
    </body>
</html>