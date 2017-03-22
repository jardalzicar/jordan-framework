<?php
/**
 * Created by IntelliJ IDEA.
 * User: jaroslavlzicar
 * Date: 29/11/15
 * Time: 19:04
 *
 * ~~~~~~~~~~~~~~~~~~~~
 * JORDAN FRAMEWORK }{}
 * ~~~~~~~~~~~~~~~~~~~~
 *
 */


//Include libraries
require_once LIBS."util.php";
require_once LIBS."database.php";
require_once LIBS."session.php";

//Array of allowed controllers and their actions
$controllers = [
    "demo" => ["showDefault"]
];

$protected = [

];


//Start session
//Session::start();

//Check protected methods
if(array_key_exists($controller, $protected) && in_array($action, $protected[$controller]) && !Session::checkLoggedIn())
    error("Nejste přihlášen");

//Call controller and action
if(array_key_exists($controller, $controllers) && in_array($action, $controllers[$controller]))
    call($controller, $action);
else
    error("Stránka nenalezena");






