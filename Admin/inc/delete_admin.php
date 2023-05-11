<?php
    require_once '../../config.php';
    require_once '../../'.FUN.'functions.php';
    if(!isset($_SESSION['admin'])) header("location:../../index.php");
    if(isset($_GET['id'])){
        $id = trim($_GET['id']); $id_admin = $_SESSION['id_admin'];
        if(premission($id_admin, $T_admin)){
            $db->exec("DELETE FROM `admin` WHERE id = $id");
            $_SESSION['Success'] = "Delete Success";
            header("location:../admins/ShowAdmin.php");
        }else{
            $_SESSION['Error'] = "You Are Not Super Admin";
            header("location:../admins/ShowAdmin.php");
        }
    }else header("location:../index.php");