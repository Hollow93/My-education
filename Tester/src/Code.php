<?php



    function getCode()
    {
        $text = mt_rand(10000, 99999);
        // $_SESSION['sertif'] = $text;
        return $text;
    }

    function location($loc)
    {
        header ("Location: $loc.php");
        die;
    }

    function login($login,$password){


    }