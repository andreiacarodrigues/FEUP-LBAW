<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");

    $userID = $_SESSION['userID'];
    $managerID = $_POST['managerID'];
    $complexID = $_POST['complexID'];

    if(!isComplexManager($complexID, $userID))
    {
        header("Location: ".$BASE_URL."pages/users/home.php");
        die();
    }

    removeManager($complexID, $managerID);
    header("Location: ".$_SERVER['HTTP_REFERER']);