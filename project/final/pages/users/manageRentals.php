<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/users.php");
    include_once($BASE_DIR."database/complexes.php");
include_once($BASE_DIR."database/info.php");


    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'][] = "You can't have acess to this page;";
        header("Location: " . $BASE_URL . "pages/users/home.php");
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

    updateRentalsState();

    $userRentals = getUserRentals($_SESSION['userID'], $page)->fetchAll();

    $numRentals = getUserNrRentals($_SESSION['userID']);

    $pagination = pagination($numRentals, 10, ($page+1), 6);

    $final = array();

    foreach ($userRentals as $rental)
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

        array_push($final,$rental);
    }

    $smarty->assign('RENTALS', $final);

    $smarty->assign('PAGINATION', $pagination);

    $smarty->assign('PAGE', $page);

    $smarty->display('pages/users/manageRentals.tpl');
?>