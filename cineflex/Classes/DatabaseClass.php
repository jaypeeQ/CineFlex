<?php
namespace CineFlex\Classes\Database;

use PDO;
/*
Using the Database Class:
Create/Instantiate the Database Class.
    $db = new Database(
        "MySQLHost",
        "myDatabaseName",
        "myUserName",
        "myUserPassword"
    );
Insert Example:
    $id = $db->Insert("Insert into `TableName`( `column1` , `column2`) values ( :column1 , :column2 )", [
        'column1' => 'column1 Value',
        'column2' => 'column2 Value',
    ]);

Select Example
    $db->Select("Select * from TableName");
Update Example
    $db->Update("Update TableName set `column1` = :column1 where id = :id",[
        'id' => 1,
        'column1' => 'a new column1 value'
    ]);
Remove Example
    $db->Remove("Delete from TableName where id = :id",[
        'id' => 1
    ]);*/

class DatabaseClass {

    private $connection = null;

    // this function is called everytime this class is instantiated
    public function __construct( $dbhost = "localhost", $dbname = "cineflex", $username = "cineflex", $password    = ""){

        try{

            $this->connection = new PDO("mysql:host={$dbhost};dbname={$dbname};", $username, $password);

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }

    }

    // Insert a row/s in a Database Table
    public function Insert( $statement = "" , $parameters = [] ){

            $this->executeStatement( $statement , $parameters );
            return $this->connection->lastInsertId();


    }

    // Select a row/s in a Database Table
    public function Select( $statement = "" , $parameters = [] ){

            $stmt = $this->executeStatement( $statement , $parameters );
            return $stmt->fetchAll();

    }

    // Update a row/s in a Database Table
    public function Update( $statement = "" , $parameters = [] ){

            $this->executeStatement( $statement , $parameters );

    }

    // Remove a row/s in a Database Table
    public function Remove( $statement = "" , $parameters = [] ){

        $this->executeStatement( $statement , $parameters );

    }

    // execute statement
    private function executeStatement( $statement = "" , $parameters = [] ){

            $stmt = $this->connection->prepare($statement);
            $stmt->execute($parameters);
            return $stmt;

    }

}