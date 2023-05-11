<?php
    session_start();
    define ("HEAD","inc/header.php");
    define ("FOOT","inc/footer.php");
    define ("IMG","images/");
    define ("FUN","functions/");
    define ("HAN","http://localhost/Shopping/setting/handler/");
    define ("SMS", FUN.'messages.php');
    define ("STE", "setting/");

    define ("HOME","http://localhost/Shopping/home.php");

    require_once FUN.'PDO_Connect.php';
?>