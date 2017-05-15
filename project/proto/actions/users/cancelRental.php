<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR . "database/complexes.php");

    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'][] = "You can't have acess to this page;";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }

    if (isset ($_GET["rentalID"] ))
        $rentalID = trim(strip_tags($_GET['rentalID']));
    else
    {
        $_SESSION['error_messages'][] = "Rental id is not set.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }

    try
    {
      if (rentalExists($rentalID))
        {
            if(cancelRentalByUser($rentalID))
            {
                $_SESSION['success_messages'][] = "Rental cancelled sucessfully.";
                header("Location: " . $BASE_URL . "pages/users/manageRentals.php");
            }
            else{
                $_SESSION['error_messages'][] = "Error canceling rental;";
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
        $_SESSION['error_messages'][] = "Unknown error occurred;";
        header("Location: " . $BASE_URL . "pages/users/manageRentals.php");
    }


