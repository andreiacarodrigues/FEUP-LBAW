<?php
    function getAllSports()
    {
        global $conn;

        $stmt = $conn->prepare('SELECT * FROM "Sport"');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function complexExists($complexID)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "complexName" FROM "SportsComplex" WHERE "complexID" = ?');
        $stmt->execute(array($complexID));
        $complex = $stmt->fetch();

        return $complex ? true : false;
    }

    function getComplexInfo($complexID)
    {
        global $conn;

        $stmt = $conn->prepare('SELECT * FROM "SportsComplex" WHERE "complexID" = ?');
        return $stmt->execute($complexID);
    }