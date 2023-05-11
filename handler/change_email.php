<?php require_once '../config.php'; ?>
<?php if(!isset($_SESSION['email'])) header("location:../index.php");?>
<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $new_email = trim($_POST['New_email']);
        if(!empty($new_email)){
            if(filter_var($new_email, FILTER_VALIDATE_EMAIL)){
                if(checkEmailTrue($new_email)){
                    $id = $_SESSION['id'];
                    $db->exec("UPDATE emails SET email = '$new_email' WHERE id = $id");
                    $_SESSION['Success'] = "Edit Success";
                    header("location:../setting/change_email.php");
                }else{
                    $_SESSION['Error'] = "This Is Not Email";
                    header("location:../setting/change_email.php");
                }
            }else{
                $_SESSION['Error'] = "This Is Not Email";
                header("location:../setting/change_email.php");
            }
        }else{
            $_SESSION['Error'] = "Type Your New Email";
            header("location:../setting/change_email.php");
        }
    }else header("location:../home.php");
?>