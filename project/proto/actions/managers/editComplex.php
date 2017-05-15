<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR . "database/complexes.php");
    include_once($BASE_DIR . "database/validations.php");

    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'][] = "You can't have acess to this page;";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }

    $condition1 = isset($_POST['complexID']);
    $condition2 = isset($_POST['name']);
    $condition3 = isset($_POST['location']);
    $condition4 = isset($_POST['municipality']);
    $condition5 = isset($_POST['email']);
    $condition6 = isset($_POST['contact']);
    $condition7 = isset($_POST['description']);
    $condition8 = isset($_POST['openingHour']);
    $condition9 = isset($_POST['closingHour']);

    if(!$condition1 || !$condition2 || !$condition3 || !$condition4 || !$condition5 || !$condition6 || !$condition7 || !$condition8 || !$condition9)
    {
        $_SESSION['error_messages'][] = "Required field is not set.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $complexID = trim(strip_tags($_POST['complexID']));
    $name = strip_tags($_POST['name']);
    $location = strip_tags($_POST['location']);
    $municipality = trim(strip_tags($_POST['municipality']));
    $email = trim(strip_tags($_POST['email']));
    $contact = trim(strip_tags($_POST['contact']));
    $description = strip_tags($_POST['description']);
    $openingHour = trim(strip_tags($_POST['openingHour']));
    $closingHour = trim(strip_tags($_POST['closingHour']));

    $openOnWeekends = "true";
    $paypal = trim(strip_tags($_POST['paypal']));
    $inactive = "false";

    $required = [$complexID, $name, $location, $municipality, $email, $contact, $openingHour, $closingHour, $_POST['openOnWeekends'], $paypal, $_POST['active']];

    foreach ($required as $item)
    {
        if (empty($item))
        {
            $_SESSION['error_messages'][] = "Required field wasn't filled.";
            if(!empty($complexID))
              header("Location: ".$BASE_URL. "pages/managers/editComplex.php?complexID=" . $complexID);
            else
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            die();
        }
    }

    if($_POST['active'] == "No")
        $inactive = "true";

    if($_POST['openOnWeekends'] == "No")
        $openOnWeekends = "false";

    $openingHour = $openingHour . ':00';
    $closingHour = $closingHour . ':00';




    if(!is_numeric($complexID) || !is_numeric($municipality) || !is_numeric($contact) ||
    !is_contact($contact) || !is_name($name) || !is_location($location) || !is_email($email) || !is_email($paypal))
    {
        $_SESSION['error_messages'][] = "Invalid Field.";
        if(is_numeric($complexID))
            header("Location: ".$BASE_URL. "pages/managers/editComplex.php?complexID=" . $complexID);
        else
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    if (empty($description))
    {
        $description = '';
    }

    try
    {
        if (!isComplexManager($complexID, $userID))
        {
            $_SESSION['error_messages'][] = "You cannot acess this page.";
            header("Location: " . $BASE_URL . "pages/users/home.php");
            die();
        }
        else if (editComplex($complexID, $name, $location, $municipality, $email, $contact, $description, $openingHour, $closingHour, $openOnWeekends, $paypal, $inactive))
        {
            $_SESSION['success_messages'][] = "Complex edited successfully";
           header("Location: ".$BASE_URL."pages/managers/manageComplexes.php");
        }
        else
        {
            $_SESSION['error_messages'][] = "Unknown error occurred;";
           header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    catch (PDOException $e)
    {
        $_SESSION['error_messages'][] = "Unknown error occurred;";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }