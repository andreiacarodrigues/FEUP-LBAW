<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR . "database/users.php");
    include_once($BASE_DIR . "database/validations.php");

    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'][] = "You can't have acess to this page;";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }

    $userID = $_SESSION['userID'];

    $condition1 = isset($_POST['password']);
    $condition2 = isset($_POST['newPassword']);
    $condition3 = isset($_POST['newPasswordConfirm']);

    if(!$condition1 || !$condition2 || !$condition3)
    {
        $_SESSION['error_messages'][] = "Required field wasn't filled.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $password = trim(strip_tags($_POST['password']));
    $newPassword = trim(strip_tags($_POST['newPassword']));
    $newPasswordConfirmation = trim(strip_tags($_POST['newPasswordConfirm']));

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

    if(!is_password($password) || !is_password($newPassword) || !is_password($newPasswordConfirmation))
    {
        $_SESSION['error_messages'][] = "Invalid field.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    try
    {
      if (userExists($userID))
        {
            $username = getUsername($userID);

            if(verifyUser($username, $password)) {

                if($newPassword != $newPasswordConfirmation)
                {
                    $_SESSION['error_messages'][] = "New password and it's confirmation inserted doesn't match;";
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
                else
                    if(editPassword($userID, $newPassword))
                    {
                        $_SESSION['success_messages'][] = "Password changed sucessfully.";
                        header("Location: " . $BASE_URL . "pages/users/profile.php");
                    }
                    else
                    {
                        $_SESSION['error_messages'][] = "Error ocurred. Password was not changed.";
                        header("Location: " . $BASE_URL . "pages/users/profile.php");
                    }
            }
            else{
                $_SESSION['error_messages'][] = "Password inserted doesn't match;";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
        else
        {
            $_SESSION['error_messages'][] = "Unknown error occurred;";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    catch (PDOException $e)
    {
        echo $e;
        $_SESSION['error_messages'][] = "Unknown error occurred;";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }


