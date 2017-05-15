<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/users.php");
    include_once($BASE_DIR."database/validations.php");

    $condition1 = isset( $_POST['username']);
    $condition2 = isset( $_POST['password']);
    $condition3 = isset( $_POST['confirm']);
    $condition4 = isset( $_POST['name']);
    $condition5 = isset( $_POST['email']);
    $condition6 = isset( $_POST['contact']);
    $condition7 = isset( $_POST['municipality']);

    if(!$condition1 || !$condition2 || !$condition3 || !$condition4 || !$condition5 || !$condition6 || !$condition7)
    {
        $_SESSION['error_messages'][] = "Required field wasn't filled.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $username =  trim(strip_tags($_POST['username']));
    $password =  trim(strip_tags($_POST['password']));
    $confirm =  trim(strip_tags($_POST['confirm']));
    $name =  strip_tags($_POST['name']);
    $email =  trim(strip_tags($_POST['email']));
    $contact =  trim(strip_tags($_POST['contact']));
    $municipality =  trim(strip_tags($_POST['municipality']));

    $required = [$username, $password, $name, $email];

    foreach($required as $item)
    {
        if(empty($item))
        {
            $_SESSION['error_messages'][] = "Required field wasn't filled.";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            die();
        }
    }

    if(!is_username($username) || !is_password($password) || !is_password($confirm) || !is_email($email)
        || !is_contact($contact) || !is_numeric($municipality) || !is_name($name))
    {
        $_SESSION['error_messages'][] = "Invalid field.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    try
    {
        $error = false;

        if (userUsernameExists($username))
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

        if (registerUser($username, $password, $name, $email, $contact, $municipality))
        {
            $_SESSION['success_messages'][] = "Sign up successful";
            header("Location: ".$BASE_URL."pages/users/home.php");
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