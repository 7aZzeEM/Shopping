<?php
    require_once '../../config.php';
    if(!isset($_SESSION['admin'])) header("location:../../index.php");
    if(isset($_GET['id'])){
        $id = trim($_GET['id']);
        foreach($T_product as $row){
            if($row['id'] == $id){
                $path = $row['photo'];
                unlink("../../".$path);
                $db->exec("DELETE FROM products WHERE id = $id");
                break;
            }
        }
        header("location:http://localhost/Shopping/Admin/AllProducts.php");
    }else header("location:http://localhost/Shopping/Admin/index.php");