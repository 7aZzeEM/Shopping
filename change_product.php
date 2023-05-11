<?php
    require_once 'config.php';
    require_once HEAD;
    require_once SMS;
?>
<?php if(!isset($_GET['id'])) header("location:home.php"); ?>
<?php if(isset($_GET['id'])) $id_product = trim($_GET['id']); ?>
<?php
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $id = $_SESSION['id'];
        $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
        $price = trim(filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_INT));
        $image = $_FILES['image']; $image_name = $image['name']; $image_location = $image['tmp_name'];
        if(!empty($name) && !empty($price) && !empty($image_name) && !empty($image_location)){
            $tmp = explode(".", $image_name); $path = strtolower(end($tmp));
            if($path == "jpg" || $path == "png"){
                if(strlen($name) < 20 && strlen($price) < 7){
                    foreach($T_product as $row){
                        if($row['id'] == $id_product && $row['user_id'] == $id){
                            $upload = "product_users/".rand(0,100000000).'.'.$path;
                            move_uploaded_file($image_location, $upload);
                            $tm = explode("product_users/",$row['photo']); $tmt = end($tm);
                            unlink('product_users/'.$tmt);
                            $db->exec("UPDATE products SET `name` = '$name' WHERE id = $id_product");
                            $db->exec("UPDATE products SET `price` = '$price' WHERE id = $id_product");
                            $db->exec("UPDATE products SET `photo` = '$upload' WHERE id = $id_product");
                            SuccessMessage("Update Success");
                        }
                    }
                }else ErrorMessage("The Name Is Big");
            }else ErrorMessage("Please Type Photo Is JPG Or PNG");
        }else ErrorMessage("Please Type All Data");
    }
?>
<div class="col-sm-6 offset-sm-3 border p-3">
        <h3 class="text-center p-3 bg-success text-white">Change Product</h3>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label >Name</label>
                <input type="text" name="name" class="form-control" >
            </div>
            <div class="form-group">
                <label >Price</label>
                <input type="number" name="price" class="form-control" >
            </div>
            <div class="form-group">
                <label >Upload Photo</label>
                <input type="file" name="image" class="form-control" >
            </div>
            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </form>
    </div>
<?php require_once FOOT;?>