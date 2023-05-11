<?php
    try{
        $db = new PDO("mysql:host=localhost;dbname=shopping","root","");
    }catch(PDOException $e){
        echo "Faild".$e->getMessage();
    }
    $stmt = $db->prepare("SELECT * FROM emails");
    $stmt->execute();
    $T_emails = $stmt->fetchAll();

    $stmt2 = $db->prepare("SELECT * FROM products");
    $stmt2->execute();
    $T_product = $stmt2->fetchAll();

    $tmt = $db->prepare("SELECT * FROM `admin`");
    $tmt->execute();
    $T_admin = $tmt->fetchAll();

    $tmt2 = $db->prepare("SELECT * FROM orders");
    $tmt2->execute();
    $T_orders = $tmt2->fetchAll();
?>