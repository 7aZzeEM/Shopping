<?php require_once '../config.php'; ?>
<?php require_once '../'.FUN.'functions.php'; ?>
<?php if(!isset($_SESSION['email'])) header("location:index.php");?>
<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $old_pass = trim($_POST['old_pass']);
        $new_pass = trim($_POST['new_pass']);
        $new_pass2 = trim($_POST['new_pass2']);
        if(!empty($old_pass)){
            if(!empty($new_pass)){
                if(!empty($new_pass2)){
                    $bool = getPassword($_SESSION['id'], $old_pass,$T_emails);
                    if($bool == "True"){
                        if($new_pass == $new_pass2){
                            $id = $_SESSION['id'];
                            $db->exec("UPDATE emails SET `password` = '$new_pass' WHERE id = $id");
                            $_SESSION['Success'] = "Edit Password Success";
                            header("location:../setting/change_password.php");
                        }else{
                            $_SESSION['Error'] = "The Passwords Is Defirent";
                            header("location:../setting/change_password.php");
                        }
                    }else{
                        $_SESSION['Error'] = "The Password Is Wrong";
                        header("location:../setting/change_password.php");
                    }
                }else{
                    $_SESSION['Error'] = "Type Your New Password again";
                    header("location:../setting/change_password.php");
                }
            }else{
                $_SESSION['Error'] = "Type Your New Password";
                header("location:../setting/change_password.php");
            }
        }else{
            $_SESSION['Error'] = "Type Your Old Password";
            header("location:../setting/change_password.php");
        }
    }else header("location:../home.php");
?>