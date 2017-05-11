<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");

    if(!isset($_SESSION['userID']) || !isset($_POST['rentalID']) || !isset($_POST['complexID']))
    {
        header('Location: ' . $BASE_URL . "pages/users/home.php");
        die();
    }

    $userID = $_SESSION['userID'];
    $rentalID = $_POST['rentalID'];
    $complexID = $_POST['complexID'];


    if(empty($userID) || empty($rentalID) || empty($complexID))
    {
        $_SESSION['error_messages'][] = "Required variables not set.";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }
    try
    {
        if (!isComplexManager($complexID, $userID))
        {
            $_SESSION['error_messages'][] = "You cannot acess this page.";
            header("Location: " . $BASE_URL . "pages/users/home.php");
            die();
        }
        else
        {
            if (rentalExists($rentalID)) {
                if (cancelRentalByManager($rentalID)) {
                    $_SESSION['success_messages'][] = "Rental cancelled successfully";
                    header("Location: " . $BASE_URL . "pages/managers/manageRentalsManager.php?complexID=" . $complexID);
                } else {
                    $_SESSION['error_messages'][] = "Error cancelling the rental.";
                    header("Location: " . $BASE_URL . "pages/managers/manageRentalsManager.php?complexID=" . $complexID);
                }
            }
            else
            {
                $_SESSION['error_messages'][] = "Rental doesn't exist;";
                header("Location: " . $BASE_URL . "pages/users/home.php");
            }
        }
    }
    catch (PDOException $e)
    {
        $_SESSION['error_messages'][] = "Unknown error occurred;";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
