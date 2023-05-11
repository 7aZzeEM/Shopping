<?php require_once '../../config.php';?>
<?php require_once '../../'.HEAD; ?>
<?php require_once '../../'.SMS; ?>
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
        <h3 class="text-center p-3 bg-success text-white">Add Admin</h3>
        <form method="POST" action="../inc/AddAdmin.php">
            <div class="form-group">
                <label >First Name</label>
                <input type="text" name="FName" class="form-control" >
            </div>
            <div class="form-group">
                <label >Last Name</label>
                <input type="text" name="LName" class="form-control" >
            </div>
            <div class="form-group">
                <label >Email</label>
                <input type="email" name="email" class="form-control" >
            </div>
            <div class="form-group">
                <label >Password</label>
                <input type="password" name="password" class="form-control" >
            </div>
            <div class="form-group">
                <label >Mobile</label>
                <input type="number" name="mobile" class="form-control" >
            </div>
            <div class="form-group mt-3">
                <label for="serv" class="font-1">Choose Premission</label>
                <select name="premission" id="serv" class="form-control font-1">
                    <option value="admin">Admin</option>
                    <option value="super admin">Super Admin</option>
                </select>
            </div>
            <input type="submit" name="submit" class="btn btn-success" value="Add">
        </form>
    </div>
<?php require_once '../../'.FOOT; ?>