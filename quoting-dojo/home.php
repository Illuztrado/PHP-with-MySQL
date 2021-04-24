<?php

session_start();
require_once("qd-new-connection.php");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="This is the 'Home' page for the Quoting Dojo PHP exercise.">
        <title>Quoting Dojo Home</title>
        <link rel="stylesheet" type="text/css" href="qd-style.css">
    </head>
    <body>
        <h1>Welcome to Quoting Dojo</h1>
        <form class="addQuote" action="qd-process.php" method="post">
            <section class="nameInput" class="homeSection">
                <label for="name">Your name:</label>
                <input type="text" name="name">
            </section>
            <section class="homeSection">
                <label for="quote">Your quote:</label>
                <input class="quoteField" type="text" name="quote">
            </section>
            <input type="hidden" name="action" value="addQuote">
            <input type="submit" value="Add my quote!">
        </form>
        <form class="skipQuote" action="qd-process.php" method="post">
            <input type="hidden" name="action" value="skipQuote">
            <input type="submit" value="Skip to quotes!">
        </form>
<?php   if(isset($_SESSION["errors"]))
        {
            foreach($_SESSION["errors"] as $error) {    ?>
                <?= "<p>".$error."<p>"; ?>
<?php       }
            unset($_SESSION["errors"]);
        }
           ?>
    </body>
</html>