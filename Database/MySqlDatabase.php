<?php

require_once 'Domain/User.php';
class MySqlDatabase implements iDatabaseStrategy {
    private $_db;
    public function __construct(){
        $dsn = 'mysql:host=localhost;dbname=userdatabase;port=3306';
        try {
            $this->_db = new PDO($dsn,'root','root');
            $this->_db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $ex) {
            throw new DatabaseException($ex->getMessage());
        }        
    }
    
    public function addUser($user){
        $query = 'INSERT INTO user (id,password,salt,value,username) VALUES(:id,:password,:salt,:value,:username);';
        $statement = $this->_db->prepare($query);
        $queryArguments = array(
            ':id' => $user->getUserId(),
            ':password' => $user->getPassword(),
            ':salt' => $user->getSalt(),
            ':value' => $user->getValue(),
            ':username' => $user->getUsername(),
        );
        $statement->execute($queryArguments);
    }
    
    public function updateUser($user){
        $query = 'UPDATE user SET username = :username, password = :password, value = :value WHERE id = :id' ;
        $statement = $this->_db->prepare($query);
        $queryArguments = array(
            ':id' => $user->getUserId(),
            ':password' => $user->getPassword(),
            ':value' => $user->getValue(),
            ':username' => $user->getUsername(),
        );
        
        $statement->execute($queryArguments);
    }
    
    public function deleteUser($userID){
        $query = 'DELETE FROM user WHERE id = :userid';
        $statement = $this->_db->prepare($query);
        $queryArguments = array(
            ':userid' => $userID,
        );
   
        $statement->execute($queryArguments);
    }
    
    public function getUser($username,$password){  
        $query = 'SELECT * FROM user WHERE username = :username AND password = :password';
        $statement = $this->_db->prepare($query);
        $queryArguments = array(
            ':username' => $username,
            ':password' => $password,
        );
        
        $statement->execute($queryArguments);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $user = new User($result['username'],$result['password']);
        $user->setSalt($result['salt']);
        $user->setUserId($result['id']);
        $user->setValue($result['value']);
        return $user;
    }
    
    public function getUsers(){
        $query = 'SELECT * FROM user';
        $statement = $this->_db->prepare($query);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $result = $statement->fetchAll();
        $users = array();
        foreach($result as $row){
            $user = new User($row['username'],$row['password']);
            $user->setSalt($row['salt']);
            $user->setUserId($row['id']);
            $user->setValue($row['value']);
            array_push($users, $user);
        }
        return $users;
    }
}
