<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR . "database/complexes.php");

    if (isset ($_GET["complexID"] ))
         $complexID = trim(strip_tags($_GET['complexID']));
    else
    {
        $_SESSION['error_messages'][] = "Complex id is not set.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    if(!is_numeric($complexID))
    {
        $_SESSION['error_messages'][] = "Complex id is invalid.";
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

        if(!empty($complexInfo))
        {
            $infoArray = array(
                'name' => $complexInfo['complexName'],
                'location' => $complexInfo['complexLocation'],
                'openOnWeekends' => $complexInfo['complexOpenOnWeekends'],
                'email' => $complexInfo['complexEmail'],
                'contact' => $complexInfo['complexPhone'],
                'description' => $complexInfo['complexDescription'],
                'openingHour' => $complexInfo['complexOpeningHour'],
                'closingHour' => $complexInfo['complexClosingHour']
            );
            echo json_encode($infoArray);
           // $_SESSION['success_messages'] = "Complex page sucessfully loaded.";
        }
        else
            echo 'ERROR';
    }

