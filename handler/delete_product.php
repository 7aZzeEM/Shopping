<?php if(!isset($_SESSION['email'])) header("location:index.php");?>
<?php
    require_once "../config.php";
    if(!isset($_GET['id']) && !isset($_SESSION['email'])) header("location:../home.php");
    $id_product = $_GET['id']; $id = $_SESSION['id'];
    foreach($T_product as $row):
        if($row['id'] == $id_product && $row['user_id'] == $id):
            $photo = $row['photo'];
            unlink("../".$photo);
            $db->exec("DELETE FROM products WHERE id = $id_product");
            header("location:../My_Products.php");
        endif;
    endforeach;
    header("location:../My_Products.php");