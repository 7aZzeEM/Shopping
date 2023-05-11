<?php
    require_once '../../config.php';
    require_once '../../'.FUN.'functions.php';
    if(!isset($_SESSION['admin'])) header("location:../../index.php");
    $id = $_SESSION['id_admin'];
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $FName = trim(filter_var($_POST['FName'], FILTER_SANITIZE_STRING));
        $LName = trim(filter_var($_POST['LName'], FILTER_SANITIZE_STRING));
        $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
        $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
        $mobile = trim(filter_var($_POST['mobile'], FILTER_SANITIZE_STRING));
        $premission = trim(filter_var($_POST['premission'], FILTER_SANITIZE_STRING));
        if(!empty($FName) && !empty($FName) && !empty($email) && !empty($password) && !empty($mobile) && !empty($premission)){
            if(strlen($FName) < 10 && strlen($LName) < 10){
                if(filter_var($email, FILTER_VALIDATE_EMAIL) && checkEmailTrue($email)){
                    if(checkMobileTrue($mobile) && strlen($mobile) == 11){
                        if(strlen($password) < 21){
                            if(premission($id, $T_admin)){
                                $db->exec("INSERT INTO `admin` (`FirstName`, `LastName`, `email`, `password`, `mobile`, `premission`)
                                VALUES ('$FName', '$LName', '$email', '$password', '$mobile', '$premission')");
                                $_SESSION['Success'] = "Added Success";
                                header("location:../admins/AddAdmin.php");
                            }else{
                                $_SESSION['Error'] = "You Are Not Super Admin";
                                header("location:../admins/AddAdmin.php");
                            }
                        }else{
                            $_SESSION['Error'] = "This Is Password Is Very Big";
                            header("location:../admins/AddAdmin.php");
                        }
                    }else{
                        $_SESSION['Error'] = "This Is Not Number Phone";
                        header("location:../admins/AddAdmin.php");
                    }
                }else{
                    $_SESSION['Error'] = "This Is Not Email";
                    header("location:../admins/AddAdmin.php");
                }
            }else{
                $_SESSION['Error'] = "Please Type Name Small";
                header("location:../admins/AddAdmin.php");
            }
        }else{
            $_SESSION['Error'] = "Please Type All Data";
            header("location:../admins/AddAdmin.php");
        }
    }else header("location:../index.php");