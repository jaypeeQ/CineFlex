<?php
namespace CineFlex\Classes\DBcommands;
use PDO;

class DBcommands{

    private $connection = null;

    // this function is called everytime this class is instantiated
    public function __construct( $dbhost = "localhost", $dbname = "cineflex", $username = "cineflex", $password    = ""){

        try{

            $this->connection = new PDO("mysql:host={$dbhost};dbname={$dbname};", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }

    }

    //Selects ALL in a table.
    public function SelectAll($table) {
        $sql = 'SELECT * FROM ' . $table . ' ';
        $sth = $this->connection->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        echo '<pre>', print_r($result), '</pre>';
        return $result;
        }


    //Selects ALL in a table with a WHERE statement.
    public function SelectAllWhere($table, $where, $value) {
        $sql = 'SELECT * FROM ' . $table . ' WHERE ' .  $where . ' = ' . $value . ' ';
        $sth = $conn->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        echo '<pre>', print_r($result), '</pre>';
        return $result;
    }

    //Selects Specific Columns in a table.
    public function SelectSpecific($array, $table) {

        foreach($array AS $key => $value) {
            if($lastvalue != $value) {
                $statement = $statement . $comma;
            }
            $comma = ', ';
            $statement = $statement . $value;
            $lastvalue = $value;
        }
        echo $statement;
        $sql = 'SELECT ' . $statement . ' FROM ' . $table . ' ';
        $sth = $conn->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        echo '<pre>', print_r($result), '</pre>';
        return $result;
    }

    //Selects Specific Columns in a table with a WHERE statement.
    public function SelectSpecificWhere($array, $table, $where, $value) {

        foreach($array AS $key => $value) {
            if($lastvalue != $value) {
                $statement = $statement . $comma;
            }
            $comma = ', ';
            $statement = $statement . $value;
            $lastvalue = $value;
        }
        echo $statement;
        $sql = 'SELECT ' . $statement . ' FROM ' . $table . ' WHERE ' .  $where . ' = ' . $value . ' ';
        $sth = $conn->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        echo '<pre>', print_r($result), '</pre>';
        return $result;
    }
    public function AddImageBLOB($postername, $imageblob) {

        //$photo= fopen('photos/1.png', 'rb'); // reading binary data
        $photo= file_get_contents('photos/1.png'); // reading binary data

        $sql = "INSERT INTO posters (PosterName,ImageBlob) 
                    VALUES (:postername, :imageblob)";
        $sth=$conn->prepare($sql);
        $sth->bindParam(":postername", $postername);
        $sth->bindParam(":imageblob", $imageblob);
        if($sth->execute()){
            echo " Data with Photo is added ";
        }
        else{
            echo " Not able to add data please contact Admin ";
            print_r($sth->errorInfo());
        }
    }

    public function ViewImageBLOBWhere($posterid) {

        //$photo= fopen('photos/1.png', 'rb'); // reading binary data
        $photo= file_get_contents('photos/1.png'); // reading binary data

        $sql = "SELECT * FROM posters WHERE PosterId = :posterid";
        $sth=$conn->prepare($sql);
        $sth->bindParam(":posterid", $posterid);
        if($sth->execute()){
            echo " Data with Photo is added ";
        }
        else{
            echo " Not able to add data please contact Admin ";
            print_r($sth->errorInfo());
        }
    }
}

