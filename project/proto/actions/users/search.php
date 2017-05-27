<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR . "database/complexes.php");

       $name = $_GET['name'];
       $municipality = $_GET['municipality'];
       $sport = $_GET['sport'];
       $date = $_GET['date'];
       $startingTime = $_GET['startingTime'];
       $duration = $_GET['duration'];
       $surface = $_GET['surface'];
       $coverage = $_GET['coverage'];

       if($name == '')
           $name = null;
        if($municipality == '')
         $municipality = null;
         if($sport == '')
          $sport = null;
        if($date == '')
            $date = null;
        if($startingTime == '')
            $startingTime = null;
        if($duration == '')
            $duration = null;
    if($surface == '')
        $surface = null;
        if($coverage == '')
            $coverage = null;

       // validações php

        $complexes = getSearchComplexes($name, $municipality, $sport, $date, $startingTime, $duration, $surface, $coverage);

        echo json_encode($complexes);




