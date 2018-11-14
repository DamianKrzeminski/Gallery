<?php
class Session{
    
    private $signed_in = false;
    public $user_id;
    public $message;
    public $count;
    
    function __construct(){
        session_start();
        $this->visitorsCount();
        $this->checkTheLogin();
        $this->checkMessage();
    }
    
    public function isAdmin(){
        $user = User::findById($this->user_id);
        return ($user->role == 'Admin') ? true : false;
    }
    
    public function visitorsCount(){
        if(isset($_SESSION['count'])){
            return $this->count = $_SESSION['count']++;
        }else{
            return $_SESSION['count'] = 1;
        }
    }
    
    private function checkTheLogin(){
        if(isset($_SESSION['user_id'])){
            $this->user_id = $_SESSION['user_id'];
            $this->signed_in = true;
        }else{
            unset($this->user_id);
            $this->user_id = false;
        }
    }
    
    public function isSignedIn(){
        return $this->signed_in;
    }
    
    public function login($user){
        $this->user_id = $_SESSION['user_id'] = $user;
        $this->signed_in = true;
    }
    
    public function logout(){
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;
    }
    
    public function message($msg=""){
        if(!empty($msg)){
            $_SESSION['message'] = $msg;
        }else{
            return $this->message;
        }
    }
    
    private function checkMessage(){
        if(isset($_SESSION['message'])){
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        }else{
            $this->message = "";
        }
    }
}
$session = new Session();
$message = $session->message();
?>