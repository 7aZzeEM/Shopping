<?php
    require_once '../config.php';
    if(!isset($_SESSION['admin'])) header("location:../index.php");
    if(isset($_GET['id'])){
        $id = trim($_GET['id']);
        $db->exec("DELETE FROM orders WHERE id = $id");
        $_SESSION['Success'] = "Delete Success";
        header("location:../Admin/orders.php");
    }else header("location:../Admin/orders.php");