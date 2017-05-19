<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");
    include_once($BASE_DIR."database/info.php");

    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'][] = "You can't have acess to this page;";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }

    if (isset ($_GET['complexID'] ))
        $complexID = trim(strip_tags($_GET['complexID']));
    else
    {
        $_SESSION['error_messages'][] = "Complex id is not set.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
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

    $rentals = getComplexRentals($complexID, $page);


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


    $totalRentals = getNrComplexRentals($complexID);

    $pagination = pagination($totalRentals, 10, ($page+1), 6);

    $smarty->assign('PAGINATION', $pagination);

    $smarty->assign('PAGE', $page);

    $smarty->assign('RENTALS', $final);







   // $smarty->assign('RENTALS', $rentals);
    $smarty->assign('complexID', $complexID);

    $smarty->display('pages/managers/manageRentalsManager.tpl');
?>