<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR . "database/users.php");

    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'][] = "You can't have acess to this page;";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }

    $userID = $_SESSION['userID'];

    $name = $_POST['name'];
    $username = $_POST['username'];
    $municipality = $_POST['municipality'];
    $email = $_POST['email'];
    $contact = $_POST['tel'];

    $required = [$name, $municipality, $email, $contact];

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
            editProfile($userID, $name, $username, $municipality, $email, $contact);
            $_SESSION['success_messages'][] = "Profile edited sucessfully.";
            header("Location: ".$BASE_URL."pages/users/profile.php");
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


