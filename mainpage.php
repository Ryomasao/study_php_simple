<?php

    /*
    session_start();
    if (!isset($_SESSION["NAME"])){
        echo "Nothing";
    }else{
        echo $_SESSION["NAME"];
    }
    */

    if(!isset($_SESSION["NAME"])){
        header("Location:login.php");
    }
