<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");
include_once($BASE_DIR."database/users.php");
include_once($BASE_DIR."database/info.php");

    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'][] = "You don't have acess to this page;";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }

    $condition1 = isset($_POST['managerID']);
    $condition2 = isset($_POST['complexID']);

    if(!$condition1 || !$condition2)
    {
        $_SESSION['error_messages'][] = "Required variables not set.";
        header("Location: ".$BASE_URL."pages/users/home.php");
        die();
    }

    $userID = $_SESSION['userID'];
    $managerID = trim(strip_tags($_POST['managerID']));
    $complexID = trim(strip_tags($_POST['complexID']));

    if(!is_numeric($managerID) || !is_numeric($complexID))
    {
        $_SESSION['error_messages'][] = "Invalid variables.";
        header("Location: ".$BASE_URL."pages/users/home.php");
        die();
    }

    if(!isComplexManager($complexID, $userID))
    {
        $_SESSION['error_messages'][] = "You dont have access to this page.";
        header("Location: ".$BASE_URL."pages/users/home.php");
        die();
    }

    try
    {
        removeManager($complexID, $managerID);

        addNotification($managerID, "You were removed from manager of the complex with the id " . $complexID . ".");

        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
    catch (PDOException $e)
    {
        $_SESSION['error_messages'][] = "Unknown error occurred;";
         header('Location: ' . $_SERVER['HTTP_REFERER']);
    }