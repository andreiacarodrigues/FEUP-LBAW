<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR . "database/complexes.php");
    include_once($BASE_DIR . "database/users.php");

    $name = $_POST['name'];
    $location = $_POST['location'];
    $municipality = $_POST['municipality'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $description = $_POST['description'];
    $openingHour = $_POST['openingHour'];
    $closingHour = $_POST['closingHour'];
    $openOnWeekends = $_POST['openOnWeekends'];
    $paypal = $_POST['paypal'];

    $required = [$name, $location, $municipality, $email, $contact, $openingHour, $closingHour, $openOnWeekends, $paypal];

    foreach ($required as $item)
    {
        if (empty($item))
        {
            $_SESSION['error_messages'][] = "Required field wasn't filled.";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            die();
        }
    }

    if (empty($description))
    {
        $description = '';
    }

    try
    {
        $username = $_SESSION['username'];
        if ($complexID = addComplex($name, $location, $municipality, $email, $contact, $description, $openingHour, $closingHour, $openOnWeekends, $paypal))
        {
            $userID = getUserID($username);
            addManager($complexID, $userID);
            $_SESSION['success_messages'][] = "Complex registry successful";
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