<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/users.php");
    include_once($BASE_DIR."database/validations.php");

    $condition1 = isset( $_POST['username']);
    $condition2 = isset( $_POST['password']);
    $condition3 = isset( $_POST['confirm']);


    if(!$condition1 || !$condition2 || !$condition3)
    {
        $_SESSION['error_messages'][] = "Required field wasn't filled.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $username = trim(strip_tags($_POST['username']));
    $password = trim(strip_tags($_POST['password']));
    $confirm = trim(strip_tags($_POST['confirm']));

    $required = [$username, $password, $confirm];

    foreach($required as $item)
    {
        if(empty($item))
        {
            $_SESSION['error_messages'][] = "Required field wasn't filled.";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            die();
        }
    }

    if(!is_username($username) || !is_password($password) || !is_password($confirm))
    {
        $_SESSION['error_messages'][] = "Invalid field.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    try
    {
        $error = false;

        if (adminUsernameExists($username))
        {
            $_SESSION['error_messages'][] = "Username already exists.";
            $error = true;
        }

        if (emailExists($email))
        {
            $_SESSION['error_messages'][] = "Email already exists";
            $error = true;
        }

        if($error)
        {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            die();
        }

        if ($confirm != $password)
        {
            $_SESSION['error_messages'][] = "Passwords don't match.";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            die();
        }

        if (registerAdmin($username, $password))
        {
            $_SESSION['success_messages'][] = "Your register was sent sucessfully. An already registered admin will check on your request to register and you will have access to the administration of the
                    website once you are accepted.";
            header("Location: ".$BASE_URL."pages/admins/adminSignup.php");
        }
        else
        {
            $_SESSION['error_messages'][] = "Unknown error occurred;";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    catch (PDOException $e)
    {
        echo $e->getCode();
        $_SESSION['error_messages'][] = "Unknown error occurred;";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }