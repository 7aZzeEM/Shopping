<?php
    require_once '../config.php';
    if(!isset($_SESSION['admin'])) header("location:../index.php");
    if(isset($_GET['title']) && isset($_GET['price']) && isset($_GET['owner']) && isset($_GET['id'])){
        $title = $_GET['title']; $price = $_GET['price']; $owner = $_GET['owner']; $done_product = false;
        $user_id; $done_email = false; $path; $id_delete; $id_order = $_GET['id'];
        foreach($T_product as $row){
            if($row['name'] == $title && $row['price'] == $price){
                $done_product = true;
                $user_id = $row['user_id'];
                $path = $row['photo'];
                $id_delete = $row['id'];
            }
        }
        foreach($T_emails as $row){
            if($row['id'] == $user_id){
                $tmp_owner = $row['FirstName'].' '.$row['LastName'];
                if($tmp_owner == $owner) $done_email = true;
            }
        }
        if($done_product == true && $done_email == true){
            unlink('../'.$path);
            $db->exec("DELETE FROM products WHERE id = $id_delete");
            $db->exec("DELETE FROM orders WHERE id = $id_order");
            $_SESSION['Success'] = "Good Jop";
            header("location:../Admin/orders.php");
        }else echo "Error";
    }else header("location:../Admin/orders.php");