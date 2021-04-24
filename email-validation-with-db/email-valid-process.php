<?php

session_start();

require_once("email-valid-connection.php");

// $query = "SELECT email FROM users";
// $result = fetch_record($query);
// var_dump($result);


if(isset($_POST["action"]) && $_POST["action"] === "login") {
    $errors = array();
    if(!isset($_SESSION["emailList"])) {
        $_SESSION["emailList"] = array();
    } else {
    }
    if(empty($_POST["email"])) {
        $errors[] = "Email is not valid!";
    }
    else {
        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email is not valid!";
        }
    }
    if(count($errors) > 0) {
        $_SESSION["errors"] = $errors;
        header("Location: home.php");
    }
    else {
        $email = $_POST["email"];
        $insertQuery = "INSERT INTO users (email)
                        VALUES ('$email')";
        $newRowID = run_mysql_query($insertQuery);
        if ($newRowID > 0) {
            $query = "SELECT email FROM users";
            $result = fetch_all($query);
            $_SESSION["emailList"] = $result;
            $_SESSION["lastEmail"] = $result[count($_SESSION["emailList"])-1]["email"];
            header("Location: success.php");
        }
    }
}


?>