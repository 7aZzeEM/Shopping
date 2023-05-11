<?php
    require_once '../../config.php';
    if(!isset($_SESSION['admin'])) header("location:../../index.php");
    require_once '../../'.HEAD;
    require_once '../../'.SMS;
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
        $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
        $permission = $_POST['permission']; $id_admin = $_SESSION['id_admin']; $id;
        $DONE = false;
        if(!empty($email) && !empty($password)){
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $pth = explode("@", $email); $check = strtolower(end($pth));
                if($check == 'gmail.com' || $check == 'yahoo.com' || $check == 'hotmail.com'){
                    foreach($T_admin as $row){
                        if($row['email'] == $email && $row['password'] == $password) $id = $row['id'];
                    }
                    if($id != NULL && is_numeric($id)){
                        foreach($T_admin as $row){
                            if($row['id'] == $id_admin && $row['premission'] == 'super admin') $DONE = true;
                        }
                        if($DONE == true){
                            $db->exec("UPDATE `admin` SET premission = '$permission' WHERE id = $id");
                            $_SESSION['Success'] = "Edit Permission Success";
                        }else $_SESSION['Error'] = "You Are Not Super Admin";
                    }else $_SESSION['Error'] = "The Email Is Not True";
                }else $_SESSION['Error'] = "This Is Not Email";
            }else $_SESSION['Error'] = "This Is Not Email";
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
        <h3 class="text-center p-3 bg-success text-white">New Permission</h3>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="form-group">
                <label >Email</label>
                <input type="email" name="email" class="form-control" >
            </div>
            <div class="form-group">
                <label >password</label>
                <input type="password" name="password" class="form-control" >
            </div>
            <div class="form-group mt-3">
                <label for="serv" class="font-1">Choose Permission</label>
                <select name="permission" id="serv" class="form-control font-1">
                    <option value="super admin">Super Admin</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </form>
    </div>
<?php require_once '../../'.FOOT; ?>