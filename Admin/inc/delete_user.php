<?php
    require_once '../../config.php';
    if(!isset($_SESSION['admin'])) header("location:../../index.php");
    if(isset($_GET['id'])){
        $tmp = []; $id = trim($_GET['id']);
        foreach($T_product as $row){
            if($row['user_id'] == $id){
                $path = $row['photo'];
                unlink("../../".$path);
                $db->exec("DELETE FROM products WHERE user_id = $id");
            }
        }
        $db->exec("DELETE FROM emails WHERE id = $id");
        header("location:../AllUsers.php");
    }else header("location:../AllUsers.php");
?>