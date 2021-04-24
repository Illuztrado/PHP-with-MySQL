<?php

session_start();
require_once("new-connection.php");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="This is the 'Main' page for the Quoting Dojo PHP exercise.">
        <title>Quoting Dojo Main</title>
        <link rel="stylesheet" type="text/css" href="qd-style.css">
    </head>
    <body>
        <h4><?= "Hey there, {$_SESSION['first_name']}!"; ?></h4>
        <form action="process.php" method="post">
            <input type="hidden" name="action" value="logoff">
            <input type="submit" value="Log off">
        </form>
    </body>
</html>