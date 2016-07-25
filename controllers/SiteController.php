<?php 

class SiteController{

    public function actionIndex(){
        require_once(ROOT.'/views/site/index.php');
        return true;
    }
    
    public function actionSignup(){

        if(isset($_POST['submit'])){
            $name=trim(htmlspecialchars($_POST['name']));
            $surname=trim(htmlspecialchars($_POST['surname']));
            $email=trim(htmlspecialchars($_POST['email']));
            $pol=$_POST['pol'];
            $birthday=$_POST['date'];
 
            $errors=false;

            if(!User::checkName($name)){
              $errors[]='Введите имя не менее 2-х и не более 30 символов, используя русский или латинский алфавит!';			
            }
            if(!User::checkName($surname)){
                $errors[]='Введите фамилию не менее 2-х и не более 30 символов, используя русский или латинский алфавит!';			
            }
              if(!User::checkEmail($email)){
                 $errors[]='Введите корректный email!';			
              }
              if($birthday){
                 if(!User::checkBirthday($birthday)){
                    $errors[]='Введите корректную дату!';			
                }
              }
               if(!$errors){
                 $result=User::signup($name,$surname,$email,$pol,$birthday);
              }
            
        }
        require_once(ROOT.'/views/site/signup.php');
        return true;
    }
    
    public function actionLogin(){
        $name='';
        $email='';
        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $email=$_POST['email']; 
          
             $user=User::checkUserData($name,$email);
                if(!$user){
                        $errors[]='Не верные данные для входа на сайт!';
               }else{
                  User::auth($user['id']);
                }
        }
        require_once(ROOT.'/views/site/login.php');
        return true;
    }
    public function actionLogout(){
        unset($_SESSION['user']);
        header('Location:/');
        return true;
    }
    
    public function actionWeather(){
        if(!User::isGest()){
            $weather = file_get_contents('http://www.gismeteo.ua/city/daily/5093/');
        }else{
            $error='Доступ только зарегистрированным пользователям';
        }
        require_once (ROOT.'/views/site/weather.php');
        return true;
    }
    
    public function actionFeedback(){
        $errors=false;
        if(isset($_POST['captcha'])){
            $name=trim(htmlspecialchars($_POST['name']));
            $email=trim(htmlspecialchars($_POST['email']));
            $message=trim(htmlspecialchars($_POST['message']));
        }
        
        if(isset($_POST['submit'])){
            
            $name=trim(htmlspecialchars($_POST['name']));
            $email=trim(htmlspecialchars($_POST['email']));
            $message=trim(htmlspecialchars($_POST['message']));
            $captcha=$_SESSION['captcha'];
            $captcha_user=$_POST['captcha'];
            
            if($captcha != $captcha_user){
               $errors[]='Введите правильно код!'; 
            }
            if(!User::checkName($name)){
                $errors[]='Имя может содержать только русские и английские буквы, длинной не менее 2-х и не более 30-ти символов!';
            }
            if(!User::checkEmail($email)){
                 $errors[]='Введите корректный email!';			
            }
            if(!User::checkMessage($message)){
                 $errors[]='Напишите сообщение длинной от 3-х до 2000 символов!';			
            }

            if(!$errors){
                 $result = Contact::message($name,$email,$message);
            }
        }
        require_once (ROOT.'/views/site/feedback.php');
        return true;
    }
    
     public function actionMessage(){
        if(!User::isGest()){
            $messages=Contact::getMessage(); 
        }else{
            $error='Доступ только зарегистрированным пользователям';
        }
        require_once (ROOT.'/views/site/message.php');
        return true;
     }
}
	
