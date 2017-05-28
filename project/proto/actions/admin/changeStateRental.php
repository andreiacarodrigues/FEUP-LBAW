<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR."database/complexes.php");


    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'][] = "You don't have acess to this page;";
        header("Location: " . $BASE_URL . "pages/admins/admin.php");
        die();
    }

    if(!isset($_POST['rentalID']) || !isset($_POST['type']))
    {
        $_SESSION['error_messages'][] = "Requested variables not set.";
        header("Location: " . $BASE_URL . "pages/admins/adminRentals.php");
        die();
    }

    $rentalID = trim(strip_tags($_POST['rentalID']));
    $type = trim(strip_tags($_POST['type']));

    if(empty($rentalID) || empty($type))
    {
        $_SESSION['error_messages'][] = "Requested variables not set.";
        header("Location: " . $BASE_URL . "pages/admins/adminRentals.php");
        die();
    }

    if(!is_numeric($rentalID) || !(($type == "suspend") || ($type == "conclude") || ($type == "cancel")))
    {
        $_SESSION['error_messages'][] = "Invalid variable.";
        header("Location: " . $BASE_URL . "pages/admins/adminRentals.php");
        die();
    }

    try
    {
        if (rentalExists($rentalID)) {

            if($type == "suspend")
            {
                if(!adminExists($_SESSION['userID']))
                {
                    $_SESSION['error_messages'] = "You need to be an admin to acess this page";
                    header("Location: " . $BASE_URL . "pages/admins/admin.php");
                    die();
                }

                if(adminSuspendRental($rentalID))
                {
                    $_SESSION['success_messages'][] = "Rental sucessfully suspended.";
                    header("Location: " . $BASE_URL . "pages/admins/adminRentals.php");
                }
                else
                {
                    $_SESSION['error_messages'][] = "Error suspending rental.";
                    header("Location: " . $BASE_URL . "pages/admins/adminRentals.php");
                    die();
                }
            }
            else if($type == "conclude")
            {
                if(concludeRental($rentalID))
                {
                    $_SESSION['success_messages'][] = "Rental sucessfully concluded.";
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
                else
                {
                    $_SESSION['error_messages'][] = "Error concluding rental.";
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    die();
                }
            }
            else if($type == "cancel")
            {
                if(!adminExists($_SESSION['userID']))
                {
                    $_SESSION['error_messages'] = "You need to be an admin to acess this page";
                    header("Location: " . $BASE_URL . "pages/admins/admin.php");
                    die();
                }

                if(adminCancelRental($rentalID))
                {
                    $_SESSION['success_messages'][] = "Rental sucessfully canceled.";
                    header("Location: " . $BASE_URL . "pages/admins/adminRentals.php");
                }
                else
                {
                    $_SESSION['error_messages'][] = "Error canceling rental.";
                    header("Location: " . $BASE_URL . "pages/admins/adminRentals.php");
                    die();
                }
            }
            else
            {
                $_SESSION['error_messages'][] = "Invalid rental state.";
                header("Location: " . $BASE_URL . "pages/admins/adminRentals.php");
                die();
            }
        }
        else
        {
            $_SESSION['error_messages'][] = "Rental doesn't exist;";
            header("Location: " . $BASE_URL . "pages/admins/adminRentals.php");
            die();
        }
    }
    catch (PDOException $e)
    {
        $_SESSION['error_messages'][] = "Unknown error occurred;";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        die();
    }
