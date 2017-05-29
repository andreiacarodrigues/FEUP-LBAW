<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/users.php");
    include_once($BASE_DIR."database/validations.php");

    $condition1 = isset($_POST['username']);
    $condition2 = isset($_POST['password']);

    if(!$condition1 || !$condition2)
    {
        $_SESSION['error_messages'] = "Required field not set.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $username = trim(strip_tags($_POST['username']));
    $password = trim(strip_tags($_POST['password']));


    if(!is_username($username)  || !is_password($password))
    {
        $_SESSION['error_messages'] = "Invalid field.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    if(verifyAdmin($username, $password) && adminAccepted($username, $password))
    {
        $_SESSION['username'] = $username;

        $_SESSION['userID'] = getAdminID($username);
        header("Location: ".$BASE_URL."pages/admins/adminUsers.php");
    }
    else
    {
        if(verifyAdmin($username, $password) && !adminAccepted($username, $password))
            $_SESSION['error_messages'] = "Your account haven't been accepted yet.";
        else
            {
            if (empty($_POST['username']) || empty($_POST['password']))
                $_SESSION['error_messages'] = "Required field wasn't filled.";
            else if (!adminUsernameExists($username))
                $_SESSION['error_messages'] = "Username inserted doesn't exist.";
            else
                $_SESSION['error_messages'] = "Password doesn't match.";
        }

        header("Location: ".$BASE_URL."pages/admins/admin.php");
        die();
    }

    $_SESSION['success_messages'] = "Login successful.";