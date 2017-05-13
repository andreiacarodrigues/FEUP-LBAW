<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/users.php");
include_once($BASE_DIR."database/complexes.php");

updateRentalsState();

    $userRentals = getUserRentals($_SESSION['username'])->fetchAll();

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

    $smarty->display('pages/users/manageRentals.tpl');
?>