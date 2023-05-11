<?php
    function IfExits($email,$T_b){
        foreach($T_b as $row):
            if($row['email'] == $email) return "False";
        endforeach;
        return "True";
    }
    function IfExitsMobile($mobile, $T_b){
        $i = 0;
        foreach($T_b as $row):
            if($row['mobile'] == $mobile) $i++;
            if($i >= 3) return "False";
        endforeach;
        return "True";
    }
    function LoginEmail($email, $pass, $T_b){
        foreach($T_b as $row):
            if($row['email'] == $email){
                if($row['password'] == $pass) return "True";
            }
        endforeach;
        return "False";
    }
    function getId($email ,$T_b){
        foreach($T_b as $row){
            if($row['email'] == $email){
                $id = $row['id'];
                $_SESSION['id'] = $id;
                return $id;
            }
        }
    }
    function getPassword($id,$pass,$T_b){
        foreach($T_b as $row){
            if($row['id'] == $id){
                if($row['password'] == $pass) return "True";
            }
        }
        return "False";
    }
    function checkEmailTrue($email){
        $checkk = explode("@", $email);
        $check = strtolower(end($checkk));
        if($check == "gmail.com" || $check == "yahoo.com" || $check == "hotmail.com") return true;
        else return false;
    }
    function checkMobileTrue($mobile){
        $check = str_split($mobile);
        foreach($check as $l){
            if(!is_numeric($l)) return false;
        }
        if($check['0'] == '0' && $check['1'] == '1') return true;
        else return false;
    }
    function existsEmail($email, $T){
        foreach($T as $row){
            if($row['email'] == $email) return false;
        }
        return true;
    }
    function checkPrice($price){
        $check = str_split($price);
        foreach($check as $l){
            if(!is_numeric($l)) return false;
        }
        return true;
    }
    function existsImg($img, $T){
        foreach($T as $row){
            if($row['photo'] == $img) return false;
        }
        return true;
    }
    function premission($id, $T){
        foreach($T as $row){
            if($row['id'] == $id){
                if($row['premission'] == "super admin") return True;
            }
        }
        return false;
    }