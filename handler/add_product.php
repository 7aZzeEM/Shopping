<?php require_once '../config.php'; ?>
<?php require_once '../'.FUN.'functions.php'; ?>
<?php require_once '../'.SMS; ?>
<?php if(!isset($_SESSION['email'])) header("location:index.php");?>
<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
        $price = trim(filter_var($_POST['price'], FILTER_SANITIZE_STRING));
        $image = $_FILES['image']; $image_name = $image['name']; $image_location = $image['tmp_name'];
        echo  "<pre>";
            print_r($image);
        echo "</pre>";
        if(!empty($name) && !empty($price) && !empty($image_name) && !empty($image_location)){
            if(strlen($name) < 20 && checkPrice($price)){
                if(strtolower(end(explode(".", $image_name))) == "jpg" || strtolower(end(explode(".", $image_name))) == "png"){
                    $path = end(explode(".",$image_name));
                    $new_name_img = rand(0,1000000000000).'.'.$path;
                    $upload = 'product_users/'.$new_name_img; $id_user = $_SESSION['id'];
                    if(existsImg($upload, $T_product)){
                        move_uploaded_file($image_location, "../product_users/".$new_name_img);
                        $db->exec("INSERT INTO products (`name`, `price`, `photo`,`user_id`) VALUES
                        ('$name', '$price', '$upload', '$id_user')");
                        $_SESSION['Success'] = "Added Success"; header("location:../add_product.php");
                    }else{
                        $_SESSION['Error'] = "Please Change Name Photo Because Exists"; header("location:../add_product.php");
                    }
                }else $_SESSION['Error'] = "Please Type Your Photo With Path JPG Or PNG"; header("location:../add_product.php");
            }else $_SESSION['Error'] = "Please Type Data True"; header("location:../add_product.php");
        }else $_SESSION['Error'] = "Please Type All Data"; header("location:../add_product.php");
    }else header("location:../home.php");
?>