<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR . "database/users.php");

    if (isset ($_SESSION["userID"] ))
        $userID = $_SESSION["userID"];
    else
    {
        $_SESSION['error_messages'][] = "User id is not set.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

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



