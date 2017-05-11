<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");
    include_once($BASE_DIR."database/users.php");

    $condition1 = isset($_SESSION['userID']);
    $condition2 = isset($_POST['spaceID']);
    $condition3 = isset($_POST['date']);
    $condition4 = isset($_POST['startingTime']);
    $condition5 = isset($_POST['duration']);
    $condition6 = isset($_POST['IDs']);

    $userID = $_SESSION['userID'];
    $spaceID = $_POST['spaceID'];
    $date = $_POST['date'];
    $startTime = $_POST['startingTime'];
    $duration = $_POST['duration'];
    $equipmentIDs = $_POST['IDs'];


    if(!$condition1 || !$condition2 || !$condition3 || !$condition4 || !$condition5 || !$condition6)
    {
        $_SESSION['error_messages'][] = "Required variables not set.";
        header('Location: ' . $BASE_URL . "pages/users/home.php");
        die();
    }



    if(empty($userID) || empty($spaceID) || empty($date) || empty($startTime) || empty($duration) || empty($equipmentIDs))
    {
        $_SESSION['error_messages'][] = "Required variables not set.";
        if(!empty($spaceID))
            header("Location: " . $BASE_URL . "pages/users/space.php?spaceID=" . $spaceID);
        else
            header('Location: ' . $BASE_URL . "pages/users/home.php");
        die();
    }
    try
    {

        if(spaceExists($spaceID))
        {
            if(userExists($userID))
            {
                $equipmentIDsArray = explode (';', $equipmentIDs);
                array_splice($equipmentIDsArray, 0, 1);
                $equipment = array();

                foreach($equipmentIDsArray as $equipmentID)
                {
                    $quantityID = 'quantity' . $equipmentID;
                    $quantity = $_POST[$quantityID];
                    if(isset($quantity))
                    {
                        if(!empty($quantity))
                        {
                            if($quantity > 0)
                            {
                                $myEquipment['equipmentID'] = $equipmentID;
                                $myEquipment['equipmentQuantity'] = $quantity;
                                array_push($equipment, $myEquipment);

                            }
                        }
                    }
                }

                if(makeRental($spaceID, $userID, $date, $startTime, $duration, $equipment))
                {
                    $_SESSION['success_messages'][] = "Rental made successfully";
                    header("Location: " . $BASE_URL . "pages/users/manageRentals.php");
                }
            }
            else{
                $_SESSION['error_messages'][] = "You cannot acess this page.";
                header("Location: " . $BASE_URL . "pages/users/space.php?spaceID=" . $spaceID);
                die();
            }
        }
        else{
            $_SESSION['error_messages'][] = "Space id insert doesn't exist.";
            header("Location: " . $BASE_URL . "pages/users/home.php");
            die();
        }
    }
    catch (PDOException $e)
    {
        var_dump($e);
        $_SESSION['error_messages'][] = "Unknown error occurred;";
       // header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
