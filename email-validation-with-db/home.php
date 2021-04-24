<?php

session_start();
require_once("email-valid-connection.php");

// $query = "SELECT email FROM users";
// $result = fetch_all($query);
// var_dump($result);
// echo $result["email"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is the 'Home' page for the Email Validation with DB PHP exercise.">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="">
</head>
<body>
    <form action="email-valid-process.php" method="post">
        <label for="email">Email:</label>
        <input type="text" name="email">
        <input type="hidden" name="action" value="login">
        <input type="submit" value="Log in">
    </form>
<?php   if(isset($_SESSION["errors"]))
        {
            foreach($_SESSION["errors"] as $error) {    ?>
                <?= "<p>$error<p>"; ?>
<?php       }
        }   ?>
</body>
</html>

