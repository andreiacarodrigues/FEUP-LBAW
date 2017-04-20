<?php
    function getComplexes($username)
    {
        global $conn;

        $stmt = $conn->prepare('
        Select "complexName", "complexID"
        
        From "SportsComplex", "User", "Manager"
        
        Where
        "complexID" = "managerComplexID"
        AND "managerID" = "userID"
        AND "userUsername" = ?;
        
        ');
        $stmt->execute(array($username));
        return $stmt;
    }

    function addComplex($name, $location, $email, $contact, $description, $openingHour, $closingHour, $openOnWeekends, $paypal)
    {
        global $conn;

        $stmt = $conn->prepare('
        INSERT INTO
        "SportsComplex"("complexName","complexLocation","complexEmail","complexPhone","complexDescription","complexOpeningHour","complexClosingHour","complexOpenOnWeekends","complexPaypal", "complexMunicipalityID")
        VALUES (?,?,?,?,?,?,?,?,?,?)
        RETURNING "complexID";');

        $stmt->execute(array($name, $location, $email, $contact, $description, $openingHour, $closingHour, $openOnWeekends, $paypal, 1));
        return $stmt->fetch()['complexID'];
    }

    function addManager($complexID, $userID)
    {
        global $conn;

        $stmt = $conn->prepare('INSERT INTO "Manager"("managerComplexID", "managerID") VALUES (?,?)');
        return $stmt->execute(array($complexID, $userID));
    }