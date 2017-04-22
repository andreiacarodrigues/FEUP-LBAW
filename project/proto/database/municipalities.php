<?php
    function getMunicipalities()
    {
        global $conn;

        $stmt = $conn->prepare('SELECT "municipalityID","municipalityName" FROM "Municipality";');
        $stmt->execute();

        return $stmt;
    }