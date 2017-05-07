<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR . "database/users.php");

    $userID = $_SESSION['userID'];

    $password = $_POST['password'];
    $newPassword = $_POST['newPassword'];
    $newPasswordConfirmation = $_POST['newPasswordConfirm'];

    $required = [$password, $newPassword, $newPasswordConfirmation];

    foreach ($required as $item)
    {
        if (empty($item))
        {
            $_SESSION['error_messages'][] = "Required field wasn't filled.";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            die();
        }
    }

    try
    {
        if (userExists($userID))
        {
            $username = getUsername($userID);

            if(verifyUser($username, $password)) {

                $_SESSION['success_messages'][] = "Profile edited sucessfully.";
                header("Location: " . $BASE_URL . "pages/users/profile.php");
            }
            else{
                $_SESSION['error_messages'][] = "Password inserted doesn't match;";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
        else
        {
            $_SESSION['error_messages'][] = "Unknown error occurred1;";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    catch (PDOException $e)
    {
        echo $e;
        $_SESSION['error_messages'][] = "Unknown error occurred2;";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }


