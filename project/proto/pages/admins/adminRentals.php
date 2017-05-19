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

    $page = 0;

    if(isset($_GET['page']))
    {
        $page = trim(strip_tags($_GET['page']));
        if(!is_numeric($page))
        {
            $_SESSION['error_messages'][] = "Invalid page parameter";
            header("Location: " . $BASE_URL . "pages/users/manageRentals.php?page=0");
            die();
        }
    }

    $rentals = getRentals($page);

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

    $totalRentals = getNrRentals();

    $pagination = pagination($totalRentals, 10, ($page+1), 6);

    $smarty->assign('PAGINATION', $pagination);

    $smarty->assign('PAGE', $page);

    $smarty->assign('RENTALS', $final);

    $smarty->display('pages/admins/adminRentals.tpl');
?>