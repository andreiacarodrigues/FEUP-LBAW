<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR . "database/users.php");
    include_once($BASE_DIR . "database/complexes.php");


    $rentalID = null; // rental related issue
    $complexID = null; // complex manager related issue

    $condition1 = isset($_POST['id']);
    $condition2 = isset($_POST['complexID']);

    if($condition1 || $condition2)
    {
        if($condition1)
        {
            $rentalID = $_POST['id'];
        }
        else if($condition2)
        {
            $complexID = $_POST['complexID'];
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

        $subject = $_POST['subject'];
        $to = $_POST['to'];
        $category = $_POST['category'];
        $description = $_POST['description'];

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


