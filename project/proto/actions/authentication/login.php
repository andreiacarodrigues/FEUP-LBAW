<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/users.php");

    $username = trim(strip_tags($_POST['username']));
    $password = $_POST['password'];

    echo $username;
    echo $password;

    if(verifyUser($username, $password))
    {
        $_SESSION['username'] = $username;
        $_SESSION['userID'] = getUserID($username);
        header("Location: ".$BASE_URL."pages/users/home.php");
    }
    else
    {
        if(empty($_POST['username']) || empty($_POST['password']))
            $_SESSION['error_messages'] = "Required field wasn't filled.";
        else if(!userExists($username))
            $_SESSION['error_messages'] = "Username inserted doesn't exist.";
        else
            $_SESSION['error_messages'] = "Password doesn't match.";


        header("Location: ".$BASE_URL."pages/authentication/login.php");
    }



    $_SESSION['success_messages'] = "Login successful.";