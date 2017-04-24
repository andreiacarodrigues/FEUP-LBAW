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

    function addComplex($name, $location, $municipality, $email, $contact, $description, $openingHour, $closingHour, $openOnWeekends, $paypal)
    {
        global $conn;

        $stmt = $conn->prepare('
        INSERT INTO
        "SportsComplex"("complexName","complexLocation","complexEmail","complexPhone","complexDescription","complexOpeningHour","complexClosingHour","complexOpenOnWeekends","complexPaypal", "complexMunicipalityID")
        VALUES (?,?,?,?,?,?,?,?,?,?)
        RETURNING "complexID";');

        $stmt->execute(array($name, $location, $email, $contact, $description, $openingHour, $closingHour, $openOnWeekends, $paypal, $municipality));
        return $stmt->fetch()['complexID'];
    }

    function addManager($complexID, $userID)
    {
        global $conn;

        $stmt = $conn->prepare('INSERT INTO "Manager"("managerComplexID", "managerID") VALUES (?,?)');
        return $stmt->execute(array($complexID, $userID));
    }

    function complexExists($complexID)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "complexName" FROM "SportsComplex" WHERE "complexID" = ?');
        $stmt->execute(array($complexID));
        $complex = $stmt->fetch();

        return $complex ? true : false;
    }

    function getComplexName($complexID){
        global $conn;

        $stmt = $conn->prepare('SELECT "complexName" FROM "SportsComplex" WHERE "complexID" = ?');
        $stmt->execute(array($complexID));
        return $complex = $stmt->fetch();
    }

    function getComplexInfo($complexID)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT * FROM "SportsComplex" WHERE "complexID" = ?');
        $stmt->execute(array($complexID));
        return $complex = $stmt->fetch();
    }

    function getSpaceRating($spaceID){
        global $conn;

        $stmt = $conn->prepare('
        SELECT AVG("rentalRating")
        FROM "Rental" 
        WHERE "rentalSpaceID" = ?');
        $stmt->execute(array($spaceID));
        return $stmt->fetch();
    }

    function getComplexRating($complexID){
        global $conn;

        $stmt = $conn->prepare('
           SELECT AVG("rentalRating")
           FROM "Rental"
           JOIN "Space"
           ON "rentalSpaceID" = "spaceID"
           WHERE
           "spaceComplexID" = ?');
        $stmt->execute(array($complexID));
        return $stmt->fetch();
    }

    function getComplexSpaces($complexID)
    {
        global $conn;

        $stmt = $conn->prepare('
        SELECT "spaceID", "spaceName", "spaceIsCovered", "spaceSurfaceType", "spacePrice" FROM "Space" 
        WHERE "spaceComplexID" = ? AND "spaceIsAvailable" = true;');
        $stmt->execute(array($complexID));
        return $spaces = $stmt->fetchAll();
    }

    function addSpace($complexID, $name, $surface, $coverage, $price, $sports)
    {
         global $conn;

          $stmt = $conn->prepare('
              INSERT INTO
              "Space"("spaceName","spaceSurfaceType","spaceIsCovered", "spaceIsAvailable", "spacePrice", "spaceComplexID")
              VALUES (?,?,?,?,?,?)
              RETURNING "spaceID";');

          $stmt->execute(array($name, $surface, $coverage, "true", $price, $complexID));
          $spaceID = $stmt->fetch()['spaceID'];

          foreach ($sports as $sport)
          {
              $stmt = $conn->prepare('
              INSERT INTO
              "SpaceSports"("spaceSportsSpaceID","spaceSportsSportID")
              VALUES (?,?);');

              $stmt->execute(array($spaceID, $sport));
          }
          return $spaceID;
    }