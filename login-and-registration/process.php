<?php

session_start();
require("new-connection.php");

if(isset($_POST["action"]) && $_POST["action"] === "register") {
    $_SESSION["errors"] = array();
    if(empty($_POST["first_name"])) {
        $_SESSION["errors"][] = "First name cannot be blank.";
    }
    else {
        if(! ctype_alpha($_POST["first_name"])) {
            $_SESSION["errors"][] = "First name must only contain letters.";
        }
        if(strlen($_POST["first_name"]) < 2) {
            $_SESSION["errors"][] = "First name must be at least 2 characters long.";
        }
    }
    if(empty($_POST["last_name"])) {
        $_SESSION["errors"][] = "Last name cannot be blank.";
    }
    else {
        if(! ctype_alpha($_POST["last_name"])) {
            $_SESSION["errors"][] = "Last name must only contain letters.";
        }
        if(strlen($_POST["first_name"]) < 2) {
            $_SESSION["errors"][] = "First name must be at least 2 characters long.";
        }
    }
    if(empty($_POST["email"])) {
        $_SESSION["errors"][] = "Email cannot be blank.";
    }
    else {
        if(! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $_SESSION["errors"][] = "This is not a valid email.";
        }
    }
    if(empty($_POST["password"])) {
        $_SESSION["errors"][] = "Password cannot be blank.";
    }
    else {
        if(strlen($_POST["password"]) < 8) {
            $_SESSION["errors"][] = "Password must be at least 8 characters long.";
        }
    }
    if(empty($_POST["confirm_password"])) {
        $_SESSION["errors"][] = "Password confirmation cannot be blank.";
    }
    else {
        if($_POST["confirm_password"] !== $_POST["password"]) {
            $_SESSION["errors"][] = "Password entered does not match.";
        }
    }
    if(count($_SESSION["errors"]) > 0) {
        header("Location: home.php");
        die();
    }
    else {
        $password = escape_this_string($_POST["password"]);
        $salt = bin2hex(openssl_random_pseudo_bytes(22));
        $encrypted_password = md5($password . "" . $salt);
        $insertQuery = "INSERT INTO users (first_name, last_name, email, password, salt, created_at, updated_at)
                        VALUES ('{$_POST['first_name']}', '{$_POST['last_name']}', '{$_POST['email']}', '$encrypted_password', '$salt', NOW(), NOW())";
        $newRowID = run_mysql_query($insertQuery);
        if ($newRowID > 0) {
            $_SESSION["success_message"] = "User sucessfully registered!";
            header("Location: home.php");
        }
    }
}
else if(isset($_POST["action"]) && $_POST["action"] === "login") {
    $password = escape_this_string($_POST["password"]);
    $loginQuery = "SELECT * FROM users WHERE email = '{$_POST["email"]}'";
    $user = fetch_record($loginQuery);
    if(! empty($user)) {
        $encrypted_password = md5($password . "" . $user["salt"]);
        if($user["password"] === $encrypted_password) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["first_name"] = $user["first_name"];
            $_SESSION["logged_in"] = TRUE;
            header("Location: success.php");
        }
        else {
            $_SESSION["errors"][] = "Invalid password";
            header("Location: home.php");
            die();
        }
    }
    else {
        $_SESSION["errors"][] = "Invalid email";
        header("Location: home.php");
        die();
    }
}
else if(isset($_POST["action"]) && $_POST["action"] === "logoff") {
    session_destroy();
    header("Location: home.php");
    die();
}

?>