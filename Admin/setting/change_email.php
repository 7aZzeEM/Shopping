<?php
    require_once '../../config.php';
    if(!isset($_SESSION['admin'])) header("location:../../index.php");
    require_once '../../'.HEAD;
    require_once '../../'.SMS;
    require_once '../../'.FUN.'functions.php';
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)); $id = $_SESSION['id_admin'];
        if(!empty($email)){
            if(filter_var($email, FILTER_VALIDATE_EMAIL) && checkEmailTrue($email)){
                $db->exec("UPDATE `admin` SET email = '$email' WHERE id = $id");
                $_SESSION['Success'] = "Edit Success";
            }else $_SESSION['Error'] = "This Is Not Email";
        }else $_SESSION['Error'] = "Please Type Your New Email";
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
        <h3 class="text-center p-3 bg-success text-white">Change Email</h3>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="form-group">
                <label >New Email</label>
                <input type="email" name="email" class="form-control" >
            </div>
            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </form>
    </div>
<?php require_once '../../'.FOOT; ?>