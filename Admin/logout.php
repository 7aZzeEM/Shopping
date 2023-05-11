<?php
    require_once '../config.php';
    if(isset($_SESSION['admin'])){
        session_destroy();
        header("location:../index.php");
    }else header("location:../index.php");