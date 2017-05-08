<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR . "database/users.php");
    include_once($BASE_DIR . "database/complexes.php");


    $rentalID =  $_POST['id'];

    $subject = $_POST['subject'];
    $to = $_POST['to'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    $required = [$rentalID, $subject, $to, $category, $description];

    foreach ($required as $item)
    {
        if (empty($item))
        {
            $_SESSION['error_messages'][] = "Required field wasn't filled.";
            header("Location: " . $BASE_URL . "pages/users/manageRentals.php");
            die();
        }
    }

    try
    {
      if (rentalExists($rentalID))
        {
            if(addIssue($rentalID, $subject, $category, $description, $to))
            {

                $_SESSION['success_messages'][] = "Issue sent sucessfully.";
                header("Location: " . $BASE_URL . "pages/users/manageRentals.php");
            }
            else{
                $_SESSION['error_messages'][] = "Error sending issue;";
                header("Location: " . $BASE_URL . "pages/users/manageRentals.php");
            }
        }
        else
        {
            $_SESSION['error_messages'][] = "Rental doesn't exist;";
            header("Location: " . $BASE_URL . "pages/users/manageRentals.php");
        }
    }
    catch (PDOException $e)
    {
        echo $e;
        $_SESSION['error_messages'][] = "Unknown error occurred;";
       // header("Location: " . $BASE_URL . "pages/users/manageRentals.php");
    }


