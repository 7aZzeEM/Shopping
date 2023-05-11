<?php
    require_once '../config.php';
    require_once '../'.FUN.'functions.php';


    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = trim($_POST['email']); $password = trim($_POST['password']);
        if(!empty($email)){
            if(!empty($password)){
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $bool = LoginEmail($email, $password, $T_emails);
                    if($bool == "True"){
                        $_SESSION['email'] = $email;
                        $id = getId($email ,$T_emails);
                        $_SESSION['id'] = $id;
                        header("location:../home.php");
                    }else{
                        $_SESSION['Error'] = "Not Found";
                        header("location:../login.php");
                    }
                }else{
                    $_SESSION['Error'] = "This Is Not Email";
                    header("location:../login.php");
                }
            }else{
                $_SESSION['Error'] = "Type Your Password";
                header("location:../login.php");
            }
        }else{
            $_SESSION['Error'] = "Type Your Email";
            header("location:../login.php");
        }
    }else header("location: ../login.php");
?>