<?php require_once '../config.php'; ?>
<?php if(!isset($_SESSION['email'])) header("location:index.php");?>
<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $mobile = trim($_POST['mobile']);
        if(!empty($mobile)){
            if(strlen($mobile) == 11 && checkMobileTrue($mobile)){
                $id = $_SESSION['id'];
                $db->exec("UPDATE emails SET mobile = '$mobile' WHERE id = $id");
                $_SESSION['Success'] = "Edit Mobile Success";
                header("location:../setting/change_mobile.php");
            }else{
                $_SESSION['Error'] = "This Is Not Number";
                header("location:../setting/change_mobile.php");
            }
        }else{
            $_SESSION['Error'] = "Type Your Mobile";
            header("location:../setting/change_mobile.php");
        }
    }else header("location:../home.php");
?>