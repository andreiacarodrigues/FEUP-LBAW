<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/info.php");
    include_once($BASE_DIR."database/complexes.php");
include_once($BASE_DIR."database/users.php");

    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'] = "You need to be logged in to acess this page";
        header("Location: " . $BASE_URL . "pages/admins/admin.php");
        die();
    }

    if(!adminExists($_SESSION['userID']))
    {
        $_SESSION['error_messages'] = "You need to be an admin to acess this page";
        header("Location: " . $BASE_URL . "pages/admins/admin.php");
        die();
    }

$rentals = getRentals();

    $final = array();

    foreach ($rentals as $rental)
    {
        $rentalID = $rental['rentalID'];

        $result = "";

        $equipmentInfo = getRentalEquipment($rentalID);

        foreach ($equipmentInfo as $equipment)
        {
            if($result == "")
                $result = $equipment['equipmentName'] . '(' . $equipment['rentalEquipmentQuantity'] . ')';
            else
                $result = $result . ", " .  $equipment['equipmentName'] . '(' . $equipment['rentalEquipmentQuantity'] . ')';
        }

        $rental['equipment'] = $result;

        $issue = getRentalIssue($rentalID);

       if(!empty($issue)) {
           $rental['issueSubject'] = $issue['issueSubject'];
           $rental['issueDescription'] = $issue['issueDescription'];
           $rental['issueCategory'] = $issue['issueCategory'];
       }
       else
           $rental['issueSubject'] = "NO_ISSUE";

        array_push($final,$rental);
    }


$smarty->assign('RENTALS', $final);

    $smarty->display('pages/admins/adminRentals.tpl');
?>