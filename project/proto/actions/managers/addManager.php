<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");
    include_once($BASE_DIR."database/users.php");

    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'][] = "You can't have acess to this page;";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }

    $userID = $_SESSION['userID'];

    $condition1 = isset($_POST['managerEmail']);
    $condition2 = isset($_POST['complexID']);

    if(!$condition1 || !$condition2)
    {
        $_SESSION['error_messages'][] = 'Required variable is empty.';
        header("Location: ".$_SERVER['HTTP_REFERER']);
        die();
    }

    $managerEmail = trim(strip_tags($_POST['managerEmail']));
    $complexID = trim(strip_tags($_POST['complexID']));

    if(!is_numeric($complexID))
    {
        $_SESSION['error_messages'][] = 'Invalid complex id.';
        header("Location: ".$_SERVER['HTTP_REFERER']);
        die();
    }

    if(!isComplexManager($complexID, $userID)) {
        $_SESSION['error_messages'][] = "You cannot acess this page.";
        header("Location: " . $BASE_URL . "pages/users/home.php");
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