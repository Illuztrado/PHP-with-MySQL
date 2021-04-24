<?php

session_start();
require("qd-new-connection.php");

// $query = "SELECT email FROM users";
// $result = fetch_record($query);
// var_dump($result);


if(isset($_POST["action"]) && $_POST["action"] === "addQuote") {
    $errors = array();
    if(!isset($_SESSION["quoteList"])) {
        $_SESSION["quoteList"] = array();
    } else {
    }
    if(empty($_POST["name"])) {
        $errors[] = "Your name cannot be blank.";
    }
    if(empty($_POST["quote"])) {
        $errors[] = "Your quote cannot be blank.";
    }
    if(count($errors) > 0) {
        $_SESSION["errors"] = $errors;
        header("Location: home.php");
    }
    else {
        $name = $_POST["name"];
        $quote = escape_this_string($_POST["quote"]);
        $insertQuery = "INSERT INTO quotes (full_name, quote, created_at)
                        VALUES ('$name', '\"$quote\"', NOW())";
        $newRowID = run_mysql_query($insertQuery);
        $selectQuery = "SELECT full_name, quote, created_at FROM quotes ORDER BY created_at DESC";
        $quoteList = fetch_all($selectQuery);
        if ($newRowID > 0 && $quoteList > 0) {
            $_SESSION["quoteList"] = $quoteList;
            header("Location: main.php");
            die();
        }
    }
}
if(isset($_POST["action"]) && $_POST["action"] === "skipQuote") {
    header("Location: main.php");
}

?>