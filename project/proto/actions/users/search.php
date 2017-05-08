<?php // ACABAR ESTE
    include_once('../../config/init.php');
    include_once($BASE_DIR . "database/complexes.php");

    if (isset ($_SESSION["userID"] )) { // search home page mas user está logged in

        $userID = $_SESSION["userID"];
    }
    else // search home page
    {
       $name = $_GET['name'];
       $municipality = $_GET['municipality'];
       $sport = $_GET['sport'];
       $date = $_GET['date'];
       $startingTime = $_GET['startingTime'];
       $duration = $_GET['duration'];

       // validações php

        $complexes = getHomePageSearchComplexes($name, $municipality, $sport, $date, $startingTime, $duration);

    }


