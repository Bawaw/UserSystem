<?php

require_once 'Service/DataManager.php';
class Controller {
    private $_service;
    private $_users;
    private $_messages;
    const DB = 'memory';
  
    public function __construct(){
        $this->_messages = array();
        session_start();
        $this->_service = new DataManager('MySQL');
        if(Controller::DB == 'memory'){
            if($this->getSession('service') != NULL){
                $this->_service = $this->getSession('service');
            }
            else {
                $this->_service = new DataManager('memory');
                try {
                    $this->createSession('service', $this->_service);
                } catch (Exception $ex) {
                     $this->addMessage($ex->getMessage());
                }
            }
        }
        else{
            $this->_service = new DataManager('MySQL');
        }
     }
    
    public function processRequest(){
        $nextpage = 'index.php';
        if(isset($_GET['action'])){
            $action = $_GET['action'];
        }
        if($action == 'Login'){
            $this->login($_POST['username'],$_POST['password']);
            $nextpage = $this->toOverview();
        }
        
        if($action == 'RequestOverview'){
            $nextpage = $this->toOverview();
        }
        
        if($action == 'RequestRegisterUser'){
            $nextpage = 'CreateUserForm.php';
        }
        if($action == 'Register'){
            $nextpage = $this->addUser($_POST['username'],$_POST['password']);
        }
        if($action == 'Remove'){
            $this->remove($_GET['id']);
            $nextpage = $this->toOverview();
        }
        if($action == 'RequestEditUser'){
            $nextpage = 'EditUserForm.php';
        }
        if($action == 'Edit'){
           $this->editUser($_POST['id'],$_POST['username'],$_POST['password']);
           $nextpage = $this->toOverview();
        }
        if($action == 'Logout'){
            $this->logout();
            $nextpage = 'index.php';
        }
        require_once('View/'.$nextpage);
    }
    
    public function login($username,$password){
        $this->logout();
        try {
            $user = $this->_service->getUser($username, $password);
            if($user != null){
                $this->addMessage('Signed in');
                $this->createSession('user',$user);
            }else{
            $this->addMessage('Invalid username or password');}
        } catch (Exception $ex) {
            $this->addMessage($ex->getMessage());
        }
    }
    
    public function logout(){
        $this->removeSession('user');
    }
    
    public function remove($userID){
        if($this->signedIn()){
            try {
                $this->_service->removeUser($userID);
            } catch (Exception $ex) {
                $this->addMessage($ex->getMessage());
            }
        }
    }
    
    public function editUser($userID,$username,$password) {
        try{
            $this->_service->updateUser($userID,$username,$password);
        } catch (Exception $ex) {
            $this->addMessage($ex->getMessage());
        }
    }
    
    public function toOverview(){
        if($this->signedIn()){
            $this->_users = $this->_service->getUsers();
            return 'Overview.php';
        }
        return 'index.php';
    }
    
    public function signedIn(){
        return $this->getSession('user');
    }
    
    private function addUser($username,$password){
        try{
            $this->_service->addUser($username, $password);
            $this->addMessage('user succesfully added');
            if(!$this->signedIn()){
                $this->login($username, $password);
            }
        } catch (Exception $ex) {
            $this->addMessage($ex->getMessage());
        }
        return $this->toOverview();
    }
    
    public function addMessage($message){
        array_push($this->_messages, $message);
    }
    
    public function createSession($sessionname,$value){
        $_SESSION[$sessionname] = $value;
    }
    
    public function getSession($sessionname){
        return $_SESSION[$sessionname];
    }
    
    public function removeSession($sessionname){
        unset($_SESSION[$sessionname]);
    }
}
