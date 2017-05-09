<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");
    include_once($BASE_DIR."database/sports.php");

    if(!isset($_SESSION['userID']))
    {
        header("Location: ".$BASE_URL."pages/users/home.php");
        die();
    }

    $complexID = $_GET['complexID'];
    $userID = $_SESSION['userID'];

    if(!isComplexManager($complexID, $userID))
    {
        header("Location: ".$BASE_URL."pages/users/home.php");
        die();
    }

    $equipmentInformation = getComplexEquipmentInfo($complexID);

    $parsedInformation = [];
    if(!empty($equipmentInformation))
    {
        foreach ($equipmentInformation as $row)
        {
            $equipmentID = $row['equipmentID'];
            if (!isset($parsedInformation[$equipmentID]))
            {
                $info = [];
                $info['name'] = $row['equipmentName'];
                $info['quantity'] = $row['equipmentQuantity'];
                $info['price'] = $row['equipmentPrice'];
                $info['details'] = $row['equipmentDetails'];
                $info['quantityUnavailable'] = $row['equipmentQuantityUnavailable'];
                $info['inactive'] = $row['equipmentInactive'];
                $info['sports'] = [];
                $parsedInformation[$equipmentID] = $info;
            }

            $parsedInformation[$equipmentID]['sports'][] = $row['equipmentSportsSportID'];
        }
    }

    $sports = getAllSports();

    $smarty->assign('EQUIPMENT_INFORMATION', $parsedInformation);
    $smarty->assign('SPORTS', $sports);
    $smarty->assign('COMPLEX_ID', $complexID);

    $smarty->display('pages/managers/manageEquipment.tpl');
?>
