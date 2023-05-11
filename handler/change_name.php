<?php require_once '../config.php'; ?>
<?php require_once '../'.FUN.'functions.php'; ?>
<?php if(!isset($_SESSION['email'])) header("location:index.php");?>
<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $FName = trim($_POST['FName']); $LName = trim($_POST['LName']);
        if(!empty($FName) && filter_var($FName, FILTER_SANITIZE_STRING)){
            if(!empty($LName) && filter_var($LName, FILTER_SANITIZE_STRING)){
                $id = getId($_SESSION['email'] ,$T_emails);
                $db->exec("UPDATE emails SET FirstName = '$FName' WHERE id = $id");
                $db->exec("UPDATE emails SET LastName = '$LName' WHERE id = $id");
                $_SESSION['Success'] = "Edit Success";
                header("location:../setting/change_name.php");
            }else{
                $_SESSION['Error'] = "Type Your Last Name";
                header("location:../setting/change_name.php");
            }
        }else{
            $_SESSION['Error'] = "Type Your First Name";
            header("location:../setting/change_name.php");
        }
    }else header("location:../home.php");
?>