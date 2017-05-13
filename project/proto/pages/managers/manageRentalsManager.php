<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");

    if (isset ($_GET['complexID'] ))
        $complexID = trim(strip_tags($_GET['complexID']));
    else
    {
        $_SESSION['error_messages'][] = "Complex id is not set.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    $rentals = getComplexRentals($complexID);


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

        array_push($final,$rental);
    }

    $smarty->assign('RENTALS', $final);







   // $smarty->assign('RENTALS', $rentals);
    $smarty->assign('complexID', $complexID);

    $smarty->display('pages/managers/manageRentalsManager.tpl');
?>