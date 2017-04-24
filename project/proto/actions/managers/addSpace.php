<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR . "database/complexes.php");
    include_once($BASE_DIR . "database/users.php");

    $name = $_POST['name'];
    $surface = $_POST['surface'];
    $coverage = $_POST['coverage'];
    $price = $_POST['price'];
    $sports = $_POST['sports'];

    $required = [$name, $surface, $coverage, $price, $sports];


    echo $name . " " . $surface . " " . $coverage . " " . $price . " " . $sports;

  /*  foreach ($required as $item)
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
        if ($spaceID = addSpace($complexID, $name, $surface, $coverage, $price, $sports))
        {
            $_SESSION['success_messages'][] = "Space registry successful";
            header("Location: ".$BASE_URL."pages/users/space.php/?spaceID=".$spaceID);
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
    }*/