<?php


require_once 'Database/InMemoryDatabase.php';
require_once 'Database/MySqlDatabase.php';
require_once 'Database/DatabaseException.php';
    

class DBFactory {
    function createDB($dbType){
        if($dbType == 'memory'){
            return new InMemoryDatabase();
        }
        else if($dbType == 'MySQL'){
            return new MySqlDatabase();
        }
        else{
            throw new DatabaseException("invalid db type");
        }
    }
}
