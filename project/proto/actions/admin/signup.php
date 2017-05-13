<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/users.php");

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

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
            header("Location: ".$BASE_URL."pages/admin/adminSignup.php");
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