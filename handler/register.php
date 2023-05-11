<?php require_once '../config.php'; ?>
<?php require_once '../'.FUN.'functions.php'; ?>
<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $FName = trim($_POST['FName']); $LName = trim($_POST['LName']);
        $email = trim($_POST['email']); $password = trim($_POST['password']);
        $mobile = trim($_POST['mobile']);
        if(!empty($FName) && !empty($LName) && !empty($email) && !empty($password) && !empty($mobile)){
            if(filter_var($FName, FILTER_SANITIZE_STRING) && filter_var($LName, FILTER_SANITIZE_STRING)
               && filter_var($email, FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL)
               && filter_var($password, FILTER_SANITIZE_STRING) && filter_var($mobile, FILTER_SANITIZE_STRING)){
                    if(checkEmailTrue($email)){
                        if(existsEmail($email, $T_emails)){
                            if(strlen($password) > 6){
                                if(checkMobileTrue($mobile)){
                                    $db->exec("INSERT INTO emails (FirstName, LastName, email, `password`, mobile) VALUES
                                    ('$FName','$LName','$email','$password','$mobile')");
                                    $_SESSION['Success'] = "Completed";
                                    getId($email ,$T_emails);
                                    header("location:../register.php");
                                }else{
                                    $_SESSION['Error'] = "This Is Not Number";
                                    header("location:../register.php");
                                }
                            }else{
                                $_SESSION['Error'] = "The Password Grater Than 6";
                                header("location:../register.php");
                            }
                        }else{
                            $_SESSION['Error'] = "This Is Email Exists";
                            header("location:../register.php");
                        }
                    }else{
                        $_SESSION['Error'] = "This Is Not Email";
                        header("location:../register.php");
                    }
               }else{
                    $_SESSION['Error'] = "Please Type Data Is True";
                    header("location:../register.php");
               }
        }else{
            $_SESSION['Error'] = "Please Fell All Data";
            header("location:../register.php");
        }
    }else header("location:../index.php");
?>