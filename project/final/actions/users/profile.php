<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR . "database/users.php");

    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'][] = "You can't have acess to this page;";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }

    $userID = $_SESSION["userID"];

    if(!userExists($userID))
    {
        $_SESSION['error_messages'][] = "User with id sent doesn't exist.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else {
        $info = getUserInfo($userID);
        if(!empty($info)) {
            echo json_encode($info);
        }
        else
            echo 'ERROR';
    }



