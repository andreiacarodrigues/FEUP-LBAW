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

    if(!isset($_POST['adminID']) || !isset($_POST['todo']))
    {
        $_SESSION['error_messages'] = "Required variable not set.";
        header("Location: " . $BASE_URL . "pages/admins/adminRequests.php");
        die();
    }

    $adminID = trim(strip_tags($_POST['adminID']));
    $todo = trim(strip_tags($_POST['todo']));

    if(!is_numeric($adminID))
    {
        $_SESSION['error_messages'] = "Invalid field.";
        header("Location: " . $BASE_URL . "pages/admins/adminRequests.php");
        die();
    }

    if(!adminExists($adminID))
    {
       $_SESSION['error_messages'] = "User with sent user id doesn't exist.";
        header("Location: " . $BASE_URL . "pages/admins/adminRequests.php");
        die();
    }
    else
    {
        try {
            if($todo == "accept")
            {
                if(acceptAdmin($adminID))
                {
                    $_SESSION['success_messages'] = "Admin request accepted successfully.";
                    header("Location: " . $BASE_URL . "pages/admins/adminRequests.php");
                }
                else
                {
                    $_SESSION['error_messages'] = "Error accepting admin request.";
                    header("Location: " . $BASE_URL . "pages/admins/adminRequests.php");
                    die();
                }
            }
            else if($todo == "remove")
            {
                if(removeRequest($adminID))
                {
                    $_SESSION['success_messages'] = "Admin request removed successfully.";
                    header("Location: " . $BASE_URL . "pages/admins/adminRequests.php");
                }
                else
                {
                    $_SESSION['error_messages'] = "Error removing admin request.";
                    header("Location: " . $BASE_URL . "pages/admins/adminRequests.php");
                    die();
                }

            }
            else
            {
                $_SESSION['error_messages'] = "Invalid operation.";
                header("Location: " . $BASE_URL . "pages/admins/adminRequests.php");
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
