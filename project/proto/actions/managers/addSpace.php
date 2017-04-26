<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR . "database/complexes.php");
    include_once($BASE_DIR . "database/users.php");

    $complexID = $_POST['complexID'];
    $name = $_POST['name'];
    $surface = $_POST['surface'];
    $coverage = "true";

    if($_POST['coverage'] == "Uncovered")
        $coverage = "false";

    $price = $_POST['price'];
    $sports = $_POST['sports'];


    $required = [$name, $surface, $_POST['coverage'], $sports, $price];

    foreach ($required as $item)
    {
        var_dump($item);
        if (empty($item))
        {
            var_dump($item);
            $_SESSION['error_messages'][] = "Required field wasn't filled.";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            die();
        }
    }

    try
    {
        if ($spaceID = addSpace($complexID, $name, $surface, $coverage, $price, $sports))
        {
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