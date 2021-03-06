<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");
    include_once($BASE_DIR."database/users.php");
    include_once($BASE_DIR."database/info.php");

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

    if(!isset($_GET['complex']))
    {
        $_SESSION['error_messages'] = "Required variable not set.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $complexID = trim(strip_tags($_GET['complex']));

    if(!is_numeric($complexID))
    {
        $_SESSION['error_messages'] = "Invalid field.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    if(!complexExists($complexID))
    {
       $_SESSION['error_messages'] = "User with sent user id doesn't exist.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }
    else
    {
        try {
            if (setComplexInactive($complexID)) {

                $managers = getManagersInformation($complexID);

                foreach($managers as $manager)
                {
                    addNotification($manager['managerID'], "Your complex with the id " . $complexID . " was recently blocked by the website administrator.");
                }

                $_SESSION['success_messages'] = "Complex was blocked sucessfully.";
                header("Location: " . $BASE_URL . "pages/admins/adminComplexes.php");
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
