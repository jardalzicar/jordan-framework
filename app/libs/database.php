<?php
/**
 * Created by IntelliJ IDEA.
 * User: jaroslavlzicar
 * Date: 19/11/15
 * Time: 18:24
 *
 *
 * JF Database library
 *
 */
class Database{

    private $dbFile;
    private $database;

    public function __construct($dbFile){
        $this->dbFile = $dbFile;
        try{
            $this->database = new PDO("sqlite:$this->dbFile");
            $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function executeStasement($statement){
        try{
            $this->database->exec($statement);
            return true;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function executeParametrized($statement, $parameters = []){
        try{
            $stmt = $this->database->prepare($statement);
            for($i=0; $i<count($parameters); $i++){
                $stmt->bindParam($i+1, $parameters[$i]);
            }
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function selectData($statement, $parameters = []){
        try{
            $stmt = $this->database->prepare($statement);
            for($i=0; $i<count($parameters); $i++){
                $stmt->bindParam($i+1, $parameters[$i]);
            }
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function count($table){
        $result = $this->database->query("SELECT COUNT(*) FROM $table");
        return (int) $result->fetch()[0];
    }

    public function isEmpty($table){
        return !((bool) $this->count($table));
    }

    public function __destruct(){
        $this->database = null;
    }
















}