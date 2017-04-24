<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/sports.php");

    if (isset ($_GET["complexID"] ))
         $complexID = trim(strip_tags($_GET['complexID']));
    else
    {
        $_SESSION['error_messages'][] = "Complex id is not set.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    if(!complexExists($complexID))
    {
        $_SESSION['error_messages'][] = "Complex with id sent doesn't exist.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else
    {
        $complexInfo = getComplexInfo($complexID);

        if(!empty($info))
        {
            $infoArray = array(
                0 => $info['complexName'],
                1 => $info['complexLocation'],
                2 => $info['complexOpenOnWeekends'],
                3 => $info['complexEmail'],
                4 => $info['complexPhone'],
                5 => $info['complexPaypal'],
                6 => $info['complexDescription'],
                7 => $info['complexOpeningHour'],
                8 => $info['complexClosingHour'],
                9 => $info['complexMunicipalityID']
            );
            echo json_encode($infoArray);
            $_SESSION['success_messages'] = "Complex page sucessfully loaded.";
        }
        else
            echo 'ERROR';
    }

