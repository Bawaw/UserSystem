<?php
require_once 'Database/DBFactory.php';
require_once '/Database/iDatabaseStrategy.php';

class DataManager {
    private $_dbStrategy;
    
    public function __construct($dbType){
        $factory = new DBFactory();
        try {
            $this->_dbStrategy = $factory->createDB($dbType);
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }

    function setDbStrategy($dbStrategy) {
        $this->_dbStrategy = $dbStrategy;
    }
    
    function addUser($username, $password){
        $user = new User($username, $password);
        $attempts = 0;
        do{
            $succes = True;
        try {
             $this->_dbStrategy->addUser($user);
        } catch (Exception $ex){
            if($ex->getMessage() == 'key exists'){
                $succes = False;
                $user->setUserId($user->generateRandomID(User::ID_SIZE));
            }
            else{
                throw $ex;
            }
        }} while(!$succes && $attempts < 300);
    }
    
    function removeUser($userID){
        $this->_dbStrategy->deleteUser($userID);
    }
    
    function updateUser($userID,$username,$password){
        $user = new User($username,$password);
        $user->setUserId($userID);
        $this->_dbStrategy->updateUser($user);
    }
    
    function getUser($username, $password){
        return $this->_dbStrategy->getUser($username,$password);
    }
    
    function getUsers(){
        return $this->_dbStrategy->getUsers();
    }

}
