<?php
    require_once '../../config.php';
    if(!isset($_SESSION['admin'])) header("location:../../index.php");
    require_once '../../'.HEAD;
    require_once '../../'.SMS;
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $FName = trim(filter_var($_POST['FName'], FILTER_SANITIZE_STRING));
        $LName = trim(filter_var($_POST['LName'], FILTER_SANITIZE_STRING));
        $id = $_SESSION['id_admin'];
        if(!empty($FName) && !empty($LName)){
            $db->exec("UPDATE `admin` SET FirstName = '$FName' WHERE id = $id");
            $db->exec("UPDATE `admin` SET LastName = '$LName' WHERE id = $id");
            $_SESSION['Success'] = "Edit Success";
        }else $_SESSION['Error'] = "Please Type All Data";
    }
    if(isset($_SESSION['Error'])){
        ErrorMessage($_SESSION['Error']);
        unset($_SESSION['Error']);
    }elseif(isset($_SESSION['Success'])){
        SuccessMessage($_SESSION['Success']);
        unset($_SESSION['Success']);
    }
?>
<div class="col-sm-6 offset-sm-3 border p-3">
        <h3 class="text-center p-3 bg-success text-white">Change Name</h3>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="form-group">
                <label >New First Name</label>
                <input type="text" name="FName" class="form-control" >
            </div>
            <div class="form-group">
                <label >New Last Name</label>
                <input type="text" name="LName" class="form-control" >
            </div>
            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </form>
    </div>
<?php require_once '../../'.FOOT; ?>