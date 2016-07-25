<?php
class Contact{
    
    public static function message($name,$email,$message){
        $db=Db::getConnection();
        $sql='INSERT INTO contact (name,email,message) VALUES (:name,:email,:message)';
        $result=$db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':message', $message, PDO::PARAM_STR);
        return $result->execute();
    }
    
   
     public static function getMessage(){
         $db=Db::getConnection();
         $result=$db->query('SELECT * FROM contact');
         $result->setFetchMode(PDO::FETCH_ASSOC);
         $messages=array();
         $i=0;
         while($row=$result->fetch()){
             $messages[$i]['date']=$row['date'];
             $messages[$i]['name']=$row['name'];
             $messages[$i]['message']=$row['message'];
             $i++;
         }
         return $messages;
     }
}

