<?php

session_start();
require_once("qd-new-connection.php");

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
        <h1>Here are the awesome quotes!</h1>
<?php   if(isset($_SESSION["quoteList"])) {
            foreach($_SESSION["quoteList"] as $row) { ?>
                <section class="mainSection">
                    <p><?= $row["quote"]; ?></p>
                    <p class="quoteName"><?= "-" . $row["full_name"]. " at " . $row["created_at"]; ?></p>
                </section>
<?php       }            
        }   ?>
    </body>
</html>