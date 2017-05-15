<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR . "database/users.php");
    include_once($BASE_DIR . "database/complexes.php");

    if(!isset($_SESSION['userID']))
    {
        $_SESSION['error_messages'][] = "You can't have acess to this page;";
        header("Location: " . $BASE_URL . "pages/users/home.php");
        die();
    }

    $rentalID = null; // rental related issue
    $complexID = null; // complex manager related issue


    $condition1 = isset($_POST['id']);
    $condition2 = isset($_POST['complexID']);

    if($condition1 || $condition2)
    {
        if($condition1)
        {
            $rentalID = trim(strip_tags($_POST['id']));
        }
        else if($condition2)
        {
            $complexID = trim(strip_tags($_POST['complexID']));
        }

        $condition3 = isset($_POST['subject']);
        $condition4 = isset($_POST['to']);
        $condition5= isset($_POST['category']);
        $condition6 = isset($_POST['description']);

        if(!$condition3 || !$condition4 || !$condition5 || !$condition6)
        {
            $_SESSION['error_messages'][] = "Required field is empty.";
            header("Location: " . $BASE_URL . "pages/users/manageRentals.php");
        }

        $subject = strip_tags($_POST['subject']);
        $to = strip_tags($_POST['to']);
        $category = strip_tags($_POST['category']);
        $description = strip_tags($_POST['description']);

        $required = [$subject, $to, $category, $description];

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
            if ($rentalID != null) {
                if (rentalExists($rentalID)) {

                    if(rentalConcluded($rentalID))
                    {
                        if (addIssue($rentalID, $subject, $category, $description, $to, $complexID)) {

                            $_SESSION['success_messages'][] = "Issue sent sucessfully.";
                            header("Location: " . $BASE_URL . "pages/users/manageRentals.php");
                        } else {
                            $_SESSION['error_messages'][] = "Error sending issue;";
                            header("Location: " . $BASE_URL . "pages/users/manageRentals.php");
                        }
                    }
                    else
                    {
                        $_SESSION['error_messages'][] = "Rental not finished or has already been concluded;";
                        header("Location: " . $BASE_URL . "pages/users/manageRentals.php");
                    }
                }
                else
                {
                    $_SESSION['error_messages'][] = "Rental doesn't exist;";
                    header("Location: " . $BASE_URL . "pages/users/manageRentals.php");
                }
            }
            else if($complexID != null)
            {
                if(complexExists($complexID))
                {
                    if (addIssue($rentalID, $subject, $category, $description, $to, $complexID)) {

                        $_SESSION['success_messages'][] = "Issue sent sucessfully.";
                        header("Location: " . $BASE_URL . "pages/managers/issuesManagement.php?complexID=" . $complexID);
                    } else {
                        $_SESSION['error_messages'][] = "Error sending issue;";
                        header("Location: " . $BASE_URL . "pages/managers/issuesManagement.php?complexID=" . $complexID);
                    }
                }
                else
                {
                    $_SESSION['error_messages'][] = "Complex doesn't exist;";
                    header("Location: " . $BASE_URL . "pages/managers/issuesManagement.php?complexID=" . $complexID);
                }
            }
        }
        catch (PDOException $e)
        {
            echo $e;
            $_SESSION['error_messages'][] = "Unknown error occurred;";
            if($complexID != null)
                header("Location: " . $BASE_URL . "pages/managers/issuesManagement.php?complexID=" . $complexID);
            else if($rentalID != null)
                header("Location: " . $BASE_URL . "pages/users/manageRentals.php");
            else
                header("Location: " . $BASE_URL . "pages/users/home.php");
        }

    }
    else
    {
        $_SESSION['error_messages'][] = "Rental id or complex id must be specified;";
        header("Location: " . $BASE_URL . "pages/users/manageRentals.php");
    }


