<?php
    require_once 'config.php';
    require_once HEAD;
    require_once SMS;
    if(!isset($_SESSION['email'])) header("location:index.php");
?>
<?php
    if(isset($_SESSION['Error'])){
        ErrorMessage($_SESSION['Error']);
        unset($_SESSION['Error']);
    }elseif(isset($_SESSION['Success'])){
        SuccessMessage($_SESSION['Success']);
        unset($_SESSION['Success']);
    }
?>
<div class="col-sm-6 offset-sm-3 border p-3">
        <h3 class="text-center p-3 bg-success text-white">Add Product</h3>
        <form method="POST" action="http://localhost/Shopping/handler/add_product.php" enctype="multipart/form-data">
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
            <input type="submit" name="submit" class="btn btn-success" value="Add">
        </form>
    </div>
<?php require_once FOOT;?>