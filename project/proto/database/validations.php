<?php
    function is_contact($contact){
        $pattern = '/^(\d{9}|\d{3}-\d{3}-\d{3})$/';
        return preg_match($pattern,$contact);
    }

    function is_email($email){
        $pattern = '/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
        return preg_match($pattern,$email);
    }

    function is_location($location){
        $pattern = '/^[\w\',-\\/.\sº]+$/';
        return preg_match($pattern,$location);
    }

    function is_password($password){
        $pattern = '/^[a-zA-Z0-9]{6,}$/';
        return preg_match($pattern,$password);
    }

    function is_name($name){
        $pattern = '/^[a-zA-Z0-9º\'\\/, ]{2,30}$/';
        return preg_match($pattern,$name);
    }

    function is_username($username){
        $pattern = '/^[a-zA-Z][\w]{3,20}$/';
        return preg_match($pattern,$username);
    }

    function is_coverage($coverage){
        if(($coverage == "Covered") || ($coverage == "Uncovered"))
            return true;
        else
            return false;
    }

    function is_available($availability){
        if(($availability == "Unavailable") || ($availability == "Available"))
            return true;
        else
            return false;
    }
