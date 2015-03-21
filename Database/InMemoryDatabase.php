<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Database/iDatabaseStrategy.php';
require_once 'Database/DatabaseException.php';
require_once 'Domain/User.php';
/**
 * Description of InMemoryDatabase
 *
 * @author Admin
 */
class InMemoryDatabase implements iDatabaseStrategy {
    private $_userDB = array();
    
    public function __construct(){
        $admin = new User('admin','t');
        $user1 = new User('Wendy_Miller','t');
        $user2 = new User('Patricia_Allen','t');
        $user3 = new User("Jacob_Philips",'t'); //dummy users
        $this->_userDB[$admin->getUserID()] = $admin;
        $this->_userDB[$user1->getUserID()] = $user1;
        $this->_userDB[$user2->getUserID()] = $user2;
        $this->_userDB[$user3->getUserID()] = $user3;
    }
    
    public function addUser($user){
        if($user == NULL){
            throw new DatabaseException('user expected');}
        if(array_key_exists( $user , $this->_userDB )){
            throw new DatabaseException('key exists');}
        $this->_userDB[$user->getUserID()] = $user;//TODO:CHECK KEY UNIQUE
    }
    
    public function updateUser($user){
         if($user == NULL){throw new DatabaseException('user expected');}
        $this->_userDB[$user->getUserID()] = $user; 
    }
    
    public function deleteUser($userID){
        if($userID == NULL){throw new DatabaseException('user id expected');}
        unset($this->_userDB[$userID]);
    }
    
    public function getUser($username,$password){  
        if($username == NULL || $password == NULL){
            throw new DatabaseException('username and password can not be empty');}
        foreach (array_values($this->_userDB) as $u){
            if($u->getUsername() == $username && $u->getPassword() == $password){
                return $u;
            }
        }
    }
    
    public function getUsers(){
       return array_values($this->_userDB);
    }
}
