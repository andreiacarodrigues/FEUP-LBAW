<?php
    function verifyUser($username, $password)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "userPassword" FROM "User" WHERE "userUsername" = ?');
        $stmt->execute(array($username));
        $user = $stmt->fetch();

        return ($user !== false && $password == $user['userPassword']);
    }

    function verifyAdmin($username, $password)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "adminPassword" FROM "Admin" WHERE "adminUsername" = ?');
        $stmt->execute(array($username));
        $admin = $stmt->fetch();

        return ($admin !== false && $password == $admin['adminPassword']);
    }

    function adminAccepted($username, $password)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "adminPassword" FROM "Admin" WHERE "adminUsername" = ? AND "adminAccepted" = TRUE');
        $stmt->execute(array($username));
        $admin = $stmt->fetch();

        return ($admin !== false && $password == $admin['adminPassword']);
    }

    function registerUser($username, $password, $name, $email, $phone, $municipality)
    {
        global $conn;

        $defaultables = [$phone, $municipality];

        foreach($defaultables as $defaultable)
        {
            $defaultable = empty($defaultable) ? "DEFAULT" : $defaultable;
        }

        $stmt = $conn->prepare('INSERT INTO "User"("userUsername","userPassword","userName","userEmail","userPhone", "userMunicipalityID") VALUES (?,?,?,?,?,?)');

        return $stmt->execute(array($username, $password, $name, $email, $phone, $municipality));
    }

    function registerAdmin($username, $password, $name, $email, $phone, $municipality)
    {
        global $conn;

        $stmt = $conn->prepare('INSERT INTO "Admin"("adminUsername","adminPassword") VALUES (?,?)');

        return $stmt->execute(array($username, $password));
    }

    function userExists($userID)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "userID" FROM "User" WHERE "userID" = ?');
        $stmt->execute(array($userID));
        $user = $stmt->fetch();

        return $user ? true : false;
    }

    function userUsernameExists($username)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "userUsername" FROM "User" WHERE "userUsername" = ?');
        $stmt->execute(array($username));
        $user = $stmt->fetch();

        return $user ? true : false;
    }

    function adminUsernameExists($username)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "adminUsername" FROM "Admin" WHERE "adminUsername" = ?');
        $stmt->execute(array($username));
        $user = $stmt->fetch();

        return $user ? true : false;
    }

    function editProfile($userID, $name, $username, $municipality, $email, $contact)
    {
        global $conn;

        $stmt = $conn->prepare('UPDATE "User"
        SET
        "userName" = ?,
        "userEmail" = ?,
        "userUsername" = ?,
        "userPhone" = ?,
        "userMunicipalityID" = ?
        WHERE
        "userID" = ?;');
        return $stmt->execute(array($name, $email, $username, $contact, $municipality, $userID));
    }

    function editPassword($userID, $password)
    {
        global $conn;

        $stmt = $conn->prepare('UPDATE "User"
            SET
            "userPassword" = ?
            WHERE
            "userID" = ?;');
        return $stmt->execute(array($password, $userID));

    }

    function emailExists($email)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "userUsername" FROM "User" WHERE "userEmail" = ?');
        $stmt->execute(array($email));
        $user = $stmt->fetch();

        return $user ? true : false;
    }

    function getUserRentals($username)
    {
        global $conn;

        $stmt = $conn->prepare('
        Select "rentalID", "rentalDate", "rentalDurationInMinutes", "rentalState", "spaceName", "complexName", "rentalStartTime"

        From "Rental", "User", "Space", "SportsComplex"
        
        Where
        "userUsername" = ?
        AND "userID" = "rentalUserID"
        AND "rentalSpaceID" = "spaceID"
        AND "spaceComplexID" = "complexID"
        
        ORDER BY "rentalDate", "rentalStartTime" DESC;
        ');

        $stmt->execute(array($username));

       // $rentals = $stmt->fetchAll();
        /*$rentalsID = $stmt->fetchAll()['rentalID'];
        foreach ($rentalsID as $ID) {
            $stmt = $conn->prepare('
            Select "equipmentName", "rentalEquipmentQuantity"
            From "Rental"
            JOIN "RentalEquipment" ON "rentalID" = "rentalEquipmentRentalID"
            JOIN "Equipment" ON "rentalEquipmentEquipmentID" = "equipmentID"
            Where
            "rentalID" = ?;
            ');
            $stmt->execute(array($ID));
        }
*/


        return $stmt;
    }

    function getUserID($username)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "userID" FROM "User" WHERE "userUsername" = ?');
        $stmt->execute(array($username));

        return $stmt->fetch()['userID'];
    }

    function getUsername($userID)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "userUsername" FROM "User" WHERE "userID" = ?');
        $stmt->execute(array($userID));

        return $stmt->fetch()['userUsername'];
    }


    function getUserInfo($userID)
    {
        global $conn;

        $stmt = $conn->prepare('
        SELECT "userName", "userUsername","userEmail", "userPhone", "userMunicipalityID"
        FROM "User"
        WHERE "userID" = ?;');
        $stmt->execute(array($userID));

        return $stmt->fetch();
    }

    function getUserIDByEmail($userEmail)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "userID" FROM "User" WHERE "userEmail" = ?');
        $stmt->execute(array($userEmail));

        return $stmt->fetch()['userID'];
    }
