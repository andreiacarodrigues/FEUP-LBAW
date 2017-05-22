<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR . "database/complexes.php");
    include_once($BASE_DIR . "database/users.php");

    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'][] = "You can't have acess to this page;";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }

    $userID = $_SESSION['userID'];

    $condition1 = isset($_POST['complexID']);
    $condition2 = isset($_POST['name']);
    $condition3 = isset($_POST['surface']);
    $condition4 = isset($_POST['price']);
    $condition5 = isset($_POST['sports']);

    if(!$condition1 || !$condition2 || !$condition3 || !$condition4 || !$condition5)
    {
        $_SESSION['error_messages'][] = "Required field wasn't filled.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $complexID = trim(strip_tags($_POST['complexID']));
    $name = strip_tags($_POST['name']);
    $surface = strip_tags($_POST['surface']);
    $coverage = "true";

    if($_POST['coverage'] == "Uncovered")
        $coverage = "false";

    $price = trim(strip_tags($_POST['price']));
    $sports = $_POST['sports'];

    if(!is_numeric($complexID) || !is_numeric($price))
    {
        $_SESSION['error_messages'][] = "Invalid variables.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    if($price <= 0)
    {
        $_SESSION['error_messages'][] = "Invalid price.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $condition6 = isset($_FILES['photo']);
    $photo = null;
    if($condition6)
        $photo = $_FILES['photo']['tmp_name'];

    $required = [$name, $surface, $_POST['coverage'], $sports, $price];

    foreach ($required as $item)
    {
        if (empty($item))
        {

            $_SESSION['error_messages'][] = "Required field wasn't filled.";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            die();
        }
    }

    try
    {
        if (!isComplexManager($complexID, $userID))
        {
            $_SESSION['error_messages'][] = "You cannot acess this page.";
            header("Location: " . $BASE_URL . "pages/users/home.php");
            die();
        }
        else if ($spaceID = addSpace($complexID, $name, $surface, $coverage, $price, $sports))
        {
            if($photo != null)
            {
                if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
                    addSpacePhoto($spaceID);
                }
            }

            $_SESSION['success_messages'][] = "Space registry successful";
            header("Location: " . $BASE_URL."pages/managers/manageSpaces.php/?complexID=" . $complexID);
        }
        else
        {
            $_SESSION['error_messages'][] = "Unknown error occurred;";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    catch (PDOException $e)
    {
        throw $e;
        $_SESSION['error_messages'][] = "Unknown error occurred;";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }