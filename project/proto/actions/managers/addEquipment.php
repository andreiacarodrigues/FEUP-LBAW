<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");

    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'][] = "You can't have acess to this page;";
        header("Location: " . $BASE_URL . "pages/users/home.php");
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
        $_SESSION['error_messages'][] = "You cannot acess this page.";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }

    if(!($check1 && $check2 && $check3 && $check4 && $check5))
    {
        header('Location: ' . $BASE_URL . "pages/users/home.php");
        die();
    }

    if(!isset($_POST['sports']) || empty($_POST['sports']))
    {
        $_SESSION['error_messages'][] = 'Include at least one sport.';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $name = strip_tags($_POST['name']);
    $quantity = trim(strip_tags($_POST['quantity']));
    $details = strip_tags($_POST['details']);
    $price = trim(strip_tags($_POST['price']));

    $check1 = !empty($name);
    $check2 = !empty($quantity);
    $check3 = !empty($price);

    if(!($check1 && $check2 && $check3))
    {
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

    $check1 = isset($_FILES['photo']);

    $photo = null;
    if($check1)
        $photo = $_FILES['photo']['tmp_name'];

    $sports = $_POST['sports'];


    if($equipmentID = addEquipment($complexID, $name, $quantity, $details, $price, $sports, $photo))
    {
        if($photo != null)
        {
            if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
                addPhoto($equipmentID, 'equipment');
            }
        }

        $_SESSION['success_messages'][] = "Equipment added successfully!";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }
    else{
        $_SESSION['error_messages'][] = "Unknown error occurred.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }




