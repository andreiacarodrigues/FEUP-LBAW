<?php
    function getAllSports()
    {
        global $conn;

        $stmt = $conn->prepare('SELECT * FROM "Sport"');
        $stmt->execute();
        return $stmt->fetchAll();
    }

