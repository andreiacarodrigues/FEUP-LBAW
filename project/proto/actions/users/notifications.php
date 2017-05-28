<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR . "database/users.php");

    if (isset ($_SESSION["userID"] )){
         $notifications = getNotifications($_SESSION["userID"]);
         if(count($notifications)> 0)
            echo json_encode($notifications);
    }

