<?php
/**
 * Created by IntelliJ IDEA.
 * User: jaroslavlzicar
 * Date: 09/12/15
 * Time: 15:48
 */

class Session{
    private static $database;

    public static function start(){
        ini_set("session.use_only_cookies", 1);
        session_start();
        session_regenerate_id();
        self::$database = new Database(DBFILE);
    }

    public static function register($username, $password){
        $salt = self::generateSalt();
        $password = hash('sha512', $password.$salt);
        if(self::$database->executeParametrized("INSERT INTO users(username, password, salt) VALUES(?,?,?)", [$username, $password, $salt]))
            return true;
        else return false;
    }

    public static function login($username, $password){
        $result = self::$database->selectData("SELECT * FROM users WHERE username = ?", [$username]);
        if (count($result) == 1){
            $password = hash('sha512', $password.$result[0]["salt"]);
            $truePassword = $result[0]["password"];
            if($password == $truePassword){
                $_SESSION['username'] = $result[0]["username"];
                $_SESSION['user_id'] = $result[0]["user_id"];
                return true;
            }
            else return "Špatné heslo";
        }
        else return "Uživatel nenalezen";
    }

    public static function checkLoggedIn(){
        if (isset($_SESSION['username']) && isset($_SESSION['user_id']))
            return true;
        else return false;
    }


    public static function logout(){
        session_unset();
        session_destroy();
    }

    private static function generateSalt(){
        $characters = "0123456789abcdefghijklmnopqrstuvwxyz.,-?:_!()/`[]{}@#$~^&*+=|";
        $salt = substr(str_shuffle($characters), 0, 20);
        return $salt;
    }


}