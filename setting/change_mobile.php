<?php require_once '../config.php'; ?>
<?php require_once '../'.HEAD; ?>
<?php require_once '../'.SMS; ?>
<?php if(!isset($_SESSION['email'])) header("location:../index.php"); ?>
<?php if(isset($_SESSION['admin'])) header("location:../Admin/index.php"); ?>
<?php
    if(isset($_SESSION['Error'])){
        $value = $_SESSION['Error'];
        ErrorMessage($value);
        unset($_SESSION['Error']);
    }elseif(isset($_SESSION['Success'])){
        $value = $_SESSION['Success'];
        SuccessMessage($value);
        unset($_SESSION['Success']);
    }
?>
<div class="col-sm-6 offset-sm-3 border p-3">
        <h3 class="text-center p-3 bg-primary text-white">Change Mobile</h3>
        <form method="POST" action="http://localhost/Shopping/handler/change_mobile.php">
            <div class="form-group">
                <label >New Mobile</label>
                <input type="text" name="mobile" class="form-control" >
            </div>
            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </form>
    </div>
<?php require_once '../'.FOOT; ?>