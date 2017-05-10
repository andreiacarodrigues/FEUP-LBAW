<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR . "database/complexes.php");

    $complexID = $_POST['complexID'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $municipality = $_POST['municipality'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $description = $_POST['description'];
    $openingHour = $_POST['openingHour'];
    $closingHour = $_POST['closingHour'];

    $openOnWeekends = "true";
    $paypal = $_POST['paypal'];
    $inactive = "false";

    $required = [$complexID, $name, $location, $municipality, $email, $contact, $openingHour, $closingHour, $_POST['openOnWeekends'], $paypal, $_POST['active']];

    foreach ($required as $item)
    {
        if (empty($item))
        {
            $_SESSION['error_messages'][] = "Required field wasn't filled.";
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
if (empty($description))
    {
        $description = '';
    }

    try
    {
        if (editComplex($complexID, $name, $location, $municipality, $email, $contact, $description, $openingHour, $closingHour, $openOnWeekends, $paypal, $inactive))
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