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

    $userID = $_SESSION['userID'];

    $condition1 = isset($_POST['complexID']);
    $condition2 = isset($_POST['spaceID']);
    $condition3 = isset($_POST['name']);
    $condition4 = isset($_POST['surface']);
    $condition5 = isset($_POST['price']);
    $condition6 = isset($_POST['sports']);
    $condition7 = isset($_POST['availability']);
    $condition8 = isset($_POST['coverage']);

    if(!$condition1 || !$condition2 || !$condition3 || !$condition4 || !$condition5 || !$condition6 || !$condition7 || !$condition8)
    {
        echo "." . !$condition1 . "." . ' ' . !$condition2 . "." .' ' . !$condition3 . "." .' ' . !$condition4 . "." .' ' . !$condition5 . "." .' ' . !$condition6 . "." .' ' . !$condition7 . "." .' ' . !$condition8;
        $_SESSION['error_messages'][] = "Required field is not set.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $complexID = trim(strip_tags($_POST['complexID']));
    $spaceID = trim(strip_tags($_POST['spaceID']));
    $name = strip_tags($_POST['name']);
    $surface = trim(strip_tags($_POST['surface']));
    $coverage = "true";
    $price = trim(strip_tags($_POST['price']));
    $isAvailable = "true";
    $sports = $_POST['sports'];

    $required = [$complexID, $spaceID, $name, $surface, $_POST['coverage'], $_POST['availability'], $price];

    foreach ($required as $item)
    {
        if (empty($item))
        {
            $_SESSION['error_messages'][] = "Required field wasn't filled.";
            if(!empty($complexID))
                header("Location: " . $BASE_URL."pages/managers/manageSpaces.php/?complexID=" . $complexID);
            else header('Location: ' . $_SERVER['HTTP_REFERER']);
            die();
        }
    }

    if(!is_available($_POST['availability']) || !is_coverage($_POST['coverage']) || !is_numeric($complexID) || !is_numeric($spaceID)
        || !is_name($name) || !is_numeric($price))
    {
        $_SESSION['error_messages'][] = "Invalid field";
        header("Location: " . $BASE_URL."pages/managers/manageSpaces.php/?complexID=" . $complexID);
        die();
    }
    if($price <= 0)
    {
        $_SESSION['error_messages'][] = "Invalid price";
        header("Location: " . $BASE_URL."pages/managers/manageSpaces.php/?complexID=" . $complexID);
        die();
    }

    if($_POST['availability']=="Unavailable")
        $isAvailable = "false";

    if($_POST['coverage'] == "Uncovered")
        $coverage = "false";

    $condition9 = isset($_FILES['photo']);

    $photo = null;
    if($condition9)
        $photo = $_FILES['photo']['tmp_name'];

    try
    {
        if (!isComplexManager($complexID, $userID))
        {
            $_SESSION['error_messages'][] = "You cannot acess this page.";
            header("Location: " . $BASE_URL . "pages/users/home.php");
            die();
        }
        else if (editSpace($spaceID, $name, $surface, $coverage, $isAvailable, $price, $sports))
        {
            if($photo != null)
            {
                if (is_uploaded_file($_FILES['photo']['tmp_name'])) {

                    if(file_exists("../../res/img/originals/space_" . $spaceID . ".jpg"))
                     destroySpacePhoto($spaceID);
                    addSpacePhoto($spaceID);
                }
            }

            $_SESSION['success_messages'][] = "Space edited successful";
            header("Location: " . $BASE_URL."pages/managers/manageSpaces.php/?complexID=" . $complexID);
        }
        else
        {
            $_SESSION['error_messages'][] = "Unknown error occurred;";
            header("Location: " . $BASE_URL."pages/managers/manageSpaces.php/?complexID=" . $complexID);
            die();
        }
    }
    catch (PDOException $e)
    {
        throw $e;
        $_SESSION['error_messages'][] = "Unknown error occurred;";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }