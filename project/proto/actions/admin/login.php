<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/users.php");

    $username = trim(strip_tags($_POST['username']));
    $password = $_POST['password'];

    if(verifyAdmin($username, $password) && adminAccepted($username, $password))
    {
        $_SESSION['username'] = $username;
        $_SESSION['userID'] = getUserID($username);
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
    }

    $_SESSION['success_messages'] = "Login successful.";