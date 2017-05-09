<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");

    if(!isset($_SESSION['userID']))
    {
        header('Location: ' . $BASE_URL . "pages/home.php");
        die();
    }

    $check1 = isset($_POST['name']);
    $check2 = isset($_POST['quantity']);
    $check3 = isset($_POST['details']);
    $check4 = isset($_POST['price']);
    $check5 = isset($_POST['complexID']);

    $complexID = $_POST['complexID'];
    $managerID = $_SESSION['userID'];

    if(!isComplexManager($complexID, $managerID))
    {
        header('Location: ' . $BASE_URL . "pages/home.php");
        die();
    }

    if(!($check1 && $check2 && $check3 && $check4 && $check5))
    {
        header('Location: ' . $BASE_URL . "pages/home.php");
        die();
    }

    if(!isset($_POST['sports']) || empty($_POST['sports']))
    {
        $_SESSION['error_messages'][] = 'Include at least one sport.';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $details = $_POST['details'];
    $price = $_POST['price'];

    $check1 = !empty($name);
    $check2 = !empty($quantity);
    $check3 = !empty($price);

    if(!($check1 && $check2 && $check3))
    {
        echo $check1.'-'.$check2.'-'.$check3;
        die();
        $_SESSION['error_messages'][] = "A required field wasn't filled.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $check1 = is_numeric($quantity);
    $check2 = is_numeric($price);

    if(!($check1 && $check2))
    {
        $_SESSION['error_messages'][] = "Invalid field input.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $check1 = $price > 0;

    if(!($check1))
    {
        $_SESSION['error_messages'][] = "Price must be positive.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $sports = $_POST['sports'];

    if(!addEquipment($complexID, $name, $quantity, $details, $price, $sports))
    {
        $_SESSION['error_messages'][] = "Unknown error occurred.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $_SESSION['success_messages'][] = "Success!";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();