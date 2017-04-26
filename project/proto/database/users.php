<?php
    function verifyUser($username, $password)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "userPassword" FROM "User" WHERE "userUsername" = ?');
        $stmt->execute(array($username));
        $user = $stmt->fetch();

        echo $user;

        return ($user !== false && $password == $user['userPassword']);
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

    function userExists($username)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "userUsername" FROM "User" WHERE "userUsername" = ?');
        $stmt->execute(array($username));
        $user = $stmt->fetch();

        return $user ? true : false;
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
        Select "rentalDate", "rentalDurationInMinutes", "rentalState", "spaceName", "complexName", "rentalStartTime"

        From "Rental", "User", "Space", "SportsComplex"
        
        Where
        "userUsername" = ?
        AND "userID" = "rentalUserID"
        AND "rentalSpaceID" = "spaceID"
        AND "spaceComplexID" = "complexID"
        
        ORDER BY "rentalDate", "rentalStartTime" DESC;
        ');

        $stmt->execute(array($username));
        return $stmt;
    }

    function getUserID($username)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "userID" FROM "User" WHERE "userUsername" = ?');
        $stmt->execute(array($username));

        return $stmt->fetch()['userID'];
    }