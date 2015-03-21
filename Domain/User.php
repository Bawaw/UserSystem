<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Admin
 */
class User {
    private $_userName; //naming convention
    private $_password;
    private $_salt;
    private $_value;
    private $_userID;
    const ID_SIZE = 8;

    public function __construct($username,$password){
        $this->setUserId($this->generateRandomID(User::ID_SIZE));
        $this->setUsername($username);
        $this->setPassword($password);
        $this->_value = 0;
        $this->_salt = 'randomText';
    }

    function addToValue($value) {
        if ($value == NULL) {throw new DomainException('Value expected');}
        setValue(getValue() + $value);
    }
    
    public function getUsername() {
        return $this->_userName;
    }
    
    public function setUsername($username) {
        if ($username == NULL || $username == '') {throw new DomainException('Username expected');}
        $this->_userName = $username;
    }
    
    public function getPassword() {
        return $this->_password;
    }
    
    public function setPassword($password) {
        if ($password == NULL || $password == '') {throw new DomainException('Password expected');}
        $this->_password = $password;
    }
    
    public function getSalt() {
        return $this->_salt;
    }
    
    public function setSalt($salt) {
        if ($salt == NULL || $salt == '') {throw new DomainException('Salt expected');}
        $this->_salt = $salt;
    }
    
    public function getValue() {
        return $this->_value;
    }
    
    public function setValue($value) {
         if ($value == NULL) {throw new DomainException('Value expected');}
        $this->_value = $value;
    }
    
    public function getUserId() {
        return $this->_userID;
    }
    
    public function setUserId($userId) { 
        if ($userId == NULL) {throw new DomainException('Value expected');}
        $this->_userID = $userId;
    }
    
    public function generateRandomID($length) {
         if ($length == NULL || $length == 0) {throw new DomainException('Value expected');}
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
