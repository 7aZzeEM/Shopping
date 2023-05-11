<?php
    require_once '../config.php';
    if(!isset($_SESSION['email'])) header("location:../index.php");
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $id_product = trim($_GET['id']); $id_user = $_SESSION['id'];
        $title;$price;$id_owner;$owner_name;$owner_mobile;$buyers_name;$buyers_mobile;
        foreach($T_product as $row){
            if($row['id'] == $id_product){
                $title = $row['name'];
                $price = $row['price'];
                $id_owner = $row['user_id'];
            }
        }
        foreach($T_emails as $row){
            if($row['id'] == $id_owner){
                $owner_name = $row['FirstName'].' '.$row['LastName'];
                $owner_mobile = $row['mobile'];
            }
            if($row['id'] == $id_user){
                $buyers_name = $row['FirstName'].' '.$row['LastName'];
                $buyers_mobile = $row['mobile'];
            }
        }
        if(!empty($title) && !empty($price) && !empty($owner_name) && !empty($owner_mobile) && !empty($buyers_name) && !empty($buyers_mobile)){
            $db->exec("INSERT INTO orders (title, price, owner_name, owner_mobile, buyers_name, buyers_mobile)
            VALUES ('$title', '$price', '$owner_name', '$owner_mobile', '$buyers_name', '$buyers_mobile')");
            $_SESSION['Success'] = "We will contact you on the phone to receive the product ".$title;
            header("location:../home.php");
        }
    }else header("location:../home.php");
