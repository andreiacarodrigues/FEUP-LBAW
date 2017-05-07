<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/users.php");

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $municipality = $_POST['municipality'];

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

    try
    {
        $error = false;

        if (userExists($_SESSION['userID']))
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