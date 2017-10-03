<?php
    session_start();
    $_SESSION["id"] = 123;
    echo $_SESSION["id"];
?>