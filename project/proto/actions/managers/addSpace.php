<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR . "database/complexes.php");
    include_once($BASE_DIR . "database/users.php");

    $complexID = $_POST['complexID'];
    $name = $_POST['name'];
    $surface = $_POST['surface'];
    $coverage = true;
    if($_POST['coverage'] == "Uncovered")
        $coverage = false;
    $price = $_POST['price'];
    if(empty($price))
        $price = 0;
    $sports = $_POST['sports'];

    $required = [$name, $surface, $coverage, $sports];

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
        if ($spaceID = addSpace($complexID, $name, $surface, $coverage, $price, $sports))
        {
            echo $spaceID;
            $_SESSION['success_messages'][] = "Space registry successful";
            //header("Location: ".$BASE_URL."pages/users/space.php/?spaceID=".$spaceID);
        }
        else
        {
            echo "deu merda";
            $_SESSION['error_messages'][] = "Unknown error occurred;";
           // header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
    catch (PDOException $e)
    {
        echo "deu merda2";
        throw $e;
        $_SESSION['error_messages'][] = "Unknown error occurred;";
        //header('Location: ' . $_SERVER['HTTP_REFERER']);
    }