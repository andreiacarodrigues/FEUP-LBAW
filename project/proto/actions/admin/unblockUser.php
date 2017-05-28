<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/users.php");

    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'] = "You need to be logged in to acess this page";
        header("Location: " . $BASE_URL . "pages/admins/admin.php");
        die();
    }

    if(!adminExists($_SESSION['userID']))
    {
        $_SESSION['error_messages'] = "You need to be an admin to acess this page";
        header("Location: " . $BASE_URL . "pages/admins/admin.php");
        die();
    }

    if(!isset($_GET['user']))
    {
        $_SESSION['error_messages'] = "Required variable not set.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $userID = trim(strip_tags($_GET['user']));

    if(!is_numeric($userID))
    {
        $_SESSION['error_messages'] = "Invalid field.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    if(!userExists($userID))
    {
       $_SESSION['error_messages'] = "User with sent user id doesn't exist.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }
    else
    {
        try {
            if (unblockUser($userID)) {

                addNotification($userID, "Your account is active again. You can now make rentals. For more information contact administration.");

                $_SESSION['success_messages'] = "User was unblocked sucessfully.";
                header("Location: " . $BASE_URL . "pages/admins/adminUsers.php");
            } else {
                $_SESSION['error_messages'] = "Error blocking user.";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                die();
            }
        }
        catch (PDOException $e)
        {
            echo $e;
            $_SESSION['error_messages'] = "Unknown error occurred;";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
