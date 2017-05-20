<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");
include_once($BASE_DIR."database/users.php");

    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'][] = "You can't have acess to this page;";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }

    $condition1 = isset ($_GET["spaceID"] );
    $condition2 = isset ($_GET["date"] );
    $condition3 = isset ($_GET["startTime"] );
    $condition4 = isset ($_GET["duration"] );

    if ($condition1 && $condition2 && $condition3 && $condition4)
    {
        $spaceID = trim(strip_tags($_GET['spaceID']));
        $date = strip_tags($_GET['date']);
        $startTime = strip_tags($_GET['startTime']);
        $duration = strip_tags($_GET['duration']);
    }
    else
    {
        $_SESSION['error_messages'][] = "Required field is not set.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }


    if(spaceExists($spaceID))
    {
        $equipment = getEquipment($spaceID, $date, $startTime, $duration);

        if(!empty($equipment))
        {

            echo json_encode($equipment);
        }
    }
    else
    {
        $_SESSION['error_messages'][] = "Space with sent id doesn't exist.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }
