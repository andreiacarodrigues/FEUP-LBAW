<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");
    include_once($BASE_DIR."database/users.php");

    $userID = $_SESSION['userID'];
    $managerEmail = $_POST['managerEmail'];
    $complexID = $_POST['complexID'];

    if(!isComplexManager($complexID, $userID))
    {
        header("Location: ".$BASE_URL."pages/users/home.php");
        die();
    }

    if(!$managerID = getUserIDByEmail($managerEmail))
    {
        $_SESSION['error_messages'][] = 'Email not found.';
        header("Location: ".$_SERVER['HTTP_REFERER']);
        die();
    }

    addManager($complexID, $managerID);
    header("Location: ".$_SERVER['HTTP_REFERER']);