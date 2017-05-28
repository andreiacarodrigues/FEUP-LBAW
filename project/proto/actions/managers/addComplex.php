<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR . "database/complexes.php");
    include_once($BASE_DIR . "database/users.php");
    include_once($BASE_DIR . "database/validations.php");

    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'][] = "You can't have acess to this page;";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }

    $condition1 = isset($_POST['name']);
    $condition2 = isset($_POST['location']);
    $condition3 = isset($_POST['municipality']);
    $condition4 = isset($_POST['email']);
    $condition5 = isset($_POST['contact']);
    $condition6 = isset($_POST['description']);
    $condition7 = isset($_POST['openingHour']);
    $condition8 = isset($_POST['closingHour']);
    $condition9 = isset($_POST['openOnWeekends']);
    $condition10 = isset($_POST['paypal']);

    if(!$condition1 || !$condition2 || !$condition3 || !$condition4 || !$condition5 || !$condition6 || !$condition7 || !$condition8 || !$condition9 || !$condition10)
    {
        $_SESSION['error_messages'][] = "Required field wasn't filled.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $name = strip_tags($_POST['name']);
    $location = strip_tags($_POST['location']);
    $municipality = trim(strip_tags($_POST['municipality']));
    $email = trim(strip_tags($_POST['email']));
    $contact = trim(strip_tags($_POST['contact']));
    $description = strip_tags($_POST['description']);
    $openingHour = strip_tags($_POST['openingHour']);
    $closingHour = strip_tags($_POST['closingHour']);
    $openOnWeekends = trim(strip_tags($_POST['openOnWeekends']));
    $paypal = trim(strip_tags($_POST['paypal']));

    $condition11 = isset($_FILES['photo']);

    $photo = null;
    if($condition11)
        $photo = $_FILES['photo']['tmp_name'];

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

    $condition11 = is_name($_POST['name']);
    $condition12 = is_location($_POST['location']);
    $condition13 = is_numeric($_POST['municipality']);
    $condition14 = is_email($_POST['email']);
    $condition15 = is_numeric($_POST['contact']);
    $condition16 = is_email($_POST['paypal']);


    if(!$condition11 || !$condition12 || !$condition13 || !$condition14 || !$condition15 || !$condition16)
    {
        $_SESSION['error_messages'][] = "Invalid field.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }


    try
    {
        $userID = $_SESSION['userID'];
        if ($complexID = addComplex($name, $location, $municipality, $email, $contact, $description, $openingHour, $closingHour, $openOnWeekends, $paypal))
        {
            addManager($complexID, $userID);

            if($photo != null)
            {
                if (is_uploaded_file($_FILES['photo']['tmp_name'])) {

                    addPhoto($complexID, 'complex');
                }
            }

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