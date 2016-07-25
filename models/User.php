<?php

class User{
    
    public static function checkName($name){
        $pattern='/^[a-zа-яё]{2,30}$/ui';
         if(preg_match($pattern, $name)){
             return true;
        }
        return false;
    }
    
    public static function checkEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }
    
    public static function checkBirthday($birthday){
        $pattern='/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/';
        $split = explode('-', $birthday);
        if(preg_match($pattern, $birthday)){
            if (checkdate($split[1], $split[2], $split[0])){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    public static function checkMessage($message){
        if (mb_strlen($message) > 2 && mb_strlen($message) < 2000){
            return true;
        }
        return false;
    }
    
    public static function signup($name,$surname,$email,$pol,$birthday){
        $db=Db::getConnection();
        $sql='INSERT INTO user (name,surname,email,pol,birthday) VALUES (:name,:surname,:email,:pol,:birthday)';
        $result=$db->prepare($sql);
        $result->bindParam(':name',$name,PDO::PARAM_STR);
        $result->bindParam(':surname',$surname,PDO::PARAM_STR);
        $result->bindParam(':email',$email,PDO::PARAM_STR);
        $result->bindParam(':pol',$pol,PDO::PARAM_STR);
        $result->bindParam(':birthday',$birthday,PDO::PARAM_STR);
        return $result->execute();
    }
    
    public static function checkUserData($name,$email){
        $db=Db::getConnection();
        $sql='SELECT * FROM user WHERE email=:email AND name=:name';
        $result=$db->prepare($sql);
        $result->bindParam(':name',$name,PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $row=$result->fetch();
        return $row;
    }
    
    public static function message($name,$email,$message){
        $db=Db::getConnection();
        $sql='INSERT INTO message (name,email,message) VALUES (:name,:email,:message)';
        $result=$db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':message', $message, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function auth($id){
        $_SESSION['user']=$id;
    }
    
    public static function isGest(){
        if(isset($_SESSION['user'])){
            return false;
        }
         return true;
    }
    
}

