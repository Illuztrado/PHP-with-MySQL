<?php

session_start();
require_once("email-valid-connection.php");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="This is the 'Success' page for the Email Validation with DB PHP exercise.">
        <title>Document</title>
    </head>
    <body>
        <h4>The email address you entered (<?= $_SESSION["lastEmail"] ?>) is a VALID email address! Thank you!</h4>
        <p>Email Adresses entered:</p>
<?php   if(isset($_SESSION["emailList"])) {
            foreach($_SESSION["emailList"] as $row) { ?>
                <p><?= $row["email"] . " (" . date("m-d-Y h:ia") . ")"; ?></p>
<?php       }            
        }   ?>
    </body>
</html>