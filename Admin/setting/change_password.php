<?php
    require_once '../../config.php';
    if(!isset($_SESSION['admin'])) header("location:../../index.php");
    require_once '../../'.HEAD;
    require_once '../../'.SMS;
    require_once '../../'.FUN.'functions.php';
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $old_pass = trim(filter_var($_POST['old_pass'], FILTER_SANITIZE_STRING));
        $new_pass = trim(filter_var($_POST['new_pass'], FILTER_SANITIZE_STRING));
        $new_pass2 = trim(filter_var($_POST['new_pass2'], FILTER_SANITIZE_STRING));
        $id = $_SESSION['id_admin'];
        if(!empty($old_pass) && !empty($new_pass) && !empty($new_pass2)){
            $bool = false;
            foreach($T_admin as $row){
                if($row['id'] == $id){
                    if($row['password'] == $old_pass) $bool = true;
                }
            }
            if($bool == true){
                if($new_pass == $new_pass2){
                    $db->exec("UPDATE `admin` SET `password` = '$new_pass' WHERE id = $id");
                    $_SESSION['Success'] = "Edit Success";
                }else $_SESSION['Error'] = "The Passwords Is Different";
            }else $_SESSION['Error'] = "Password Wrong";
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
        <h3 class="text-center p-3 bg-success text-white">Change Password</h3>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="form-group">
                <label >Old Password</label>
                <input type="password" name="old_pass" class="form-control" >
            </div>
            <div class="form-group">
                <label >New Password</label>
                <input type="password" name="new_pass" class="form-control" >
            </div>
            <div class="form-group">
                <label >New Password Again</label>
                <input type="password" name="new_pass2" class="form-control" >
            </div>
            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </form>
    </div>
<?php require_once '../../'.FOOT; ?>