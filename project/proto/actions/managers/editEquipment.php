<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");


    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'][] = "You can't have acess to this page;";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }

    $check1 = isset($_POST['itemName']);
    $check2 = isset($_POST['quantity']);
    $check3 = isset($_POST['details']);
    $check4 = isset($_POST['price']);
    $check5 = isset($_POST['equipmentID']);
    $check6 = isset($_POST['quantityUnavailable']);
    $check7 = isset($_POST['available']);
    $check8 = isset($_POST['complexID']);

  //  echo $_POST['itemName'] . ' ' . $_POST['quantity'] . ' ' . $_POST['details'] . ' ' . $_POST['price'] . ' ' . $_POST['equipmentID'] . ' '
    //    . $_POST['quantityUnavailable'] . ' ' . $_POST['available'] . ' ' . $_POST['complexID'];
//echo $check1 . ' ' . $check2 . ' ' . $check3 . ' ' . $check4 . ' ' . $check5 . ' ' . $check6 . ' ' . $check7 . ' ' . $check8;

    if(!($check1 && $check2 && $check4 && $check5 && $check6 && $check7 && $check8))
    {
        $_SESSION['error_messages'][] = "Required variables not set.";
        header('Location: ' . $BASE_URL . "pages/users/home.php");
        die();
    }

    if(!$check3)
        $details = '';
    else
        $details = strip_tags($_POST['details']);

    $managerID = $_SESSION['userID'];
    $complexID = trim(strip_tags($_POST['complexID']));

    if(!is_numeric($complexID))
    {
        $_SESSION['error_messages'][] = "Invalid complex ID.";
        header('Location: ' . $BASE_URL . "pages/users/home.php");
        die();
    }

    if(!isComplexManager($complexID, $managerID))
    {
        $_SESSION['error_messages'][] = "You cannot access this page.";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }


    if(!isset($_POST['sports']) || empty($_POST['sports']))
    {
        $_SESSION['error_messages'][] = 'Include at least one sport.';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $name = strip_tags($_POST['itemName']);
    $quantity = trim(strip_tags($_POST['quantity']));

    $price = trim(strip_tags($_POST['price']));
    $equipmentID =  trim(strip_tags($_POST['equipmentID']));
    $quantityUnavailable =  trim(strip_tags($_POST['quantityUnavailable']));
    $available =  trim(strip_tags($_POST['available']));

    $check1 = empty($name);
    $check2 = empty($quantity);
    $check3 = empty($price);
    $check4 = empty($equipmentID);

    if($check1 || $check2 || $check3 || $check4 )
    {
        $_SESSION['error_messages'][] = "A required field wasn't filled.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $check1 = is_numeric($quantity);
    $check2 = is_numeric($price);
    $check3 = is_numeric($equipmentID);
    $check4 = is_numeric($quantityUnavailable);

    if(!($check1 && $check2 && $check3 && $check4))
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
    if(($available != "true")&&($available!="false"))
    {
        $_SESSION['error_messages'][] = "Invalid availability.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $isInavailable = "false";
    if($available=="false")
        $isInavailable = "true";

    $check1 = isset($_FILES['photo']);
    $photo = null;
    if($check1)
        $photo = $_FILES['photo']['tmp_name'];

    $sports = $_POST['sports'];

    if(!editEquipment($equipmentID, $name, $quantity, $details, $quantityUnavailable, $price, $sports, $isInavailable))
    {
        $_SESSION['error_messages'][] = "Unknown error occurred.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    if($photo != null)
    {
        if (is_uploaded_file($_FILES['photo']['tmp_name'])) {

            if(file_exists("../../res/img/originals/equipment_$equipmentID.jpg"))
                destroyEquipmentPhoto($equipmentID);
            addEquipmentPhoto($equipmentID);
        }
    }

    $_SESSION['success_messages'][] = "Equipment edited sucessfully.";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
