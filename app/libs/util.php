<?php
/**
 * Created by IntelliJ IDEA.
 * User: jaroslavlzicar
 * Date: 01/12/15
 * Time: 15:19
 *
 * JF Utilities library
 *
 */

/*
spl_autoload_register("load");

function load($class){
    require_once "$class.php";
}
*/

function call($controller, $action, $param = null){
    require_once(CONTROLLERS.$controller.'_controller.php');

    $controller .= "Controller";
    $controller = new $controller();

    if(isset($param))
        $controller->{ $action }($param);
    else
        $controller->{ $action }();
}

function view($arg1 = null, $arg2 = null, $srg3 = null){
    $dir = debug_backtrace()[2]["args"][0];
    $file = strtolower(str_replace("show","", debug_backtrace()[1]["function"]));

    $viewFile = VIEWS.$dir."/".$file.".php";
    require_once LAYOUT;
}

function viewFile($file, $arg1 = null, $arg2 = null, $srg3 = null){
    $viewFile = $file;
    require_once LAYOUT;
}

function viewString($string){
    $viewString = $string;
    require_once LAYOUT;
}

function error($message){
    viewFile(VIEWS."pages/error.php", [$message, $_SERVER['HTTP_REFERER']]);
}

function success($message){
    viewFile(VIEWS."pages/success.php", [$message, $_SERVER['HTTP_REFERER']]);
}

function sanitize($str){
    return trim(htmlspecialchars($str));
}
















