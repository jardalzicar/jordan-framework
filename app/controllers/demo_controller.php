<?php

/**
 * Created by IntelliJ IDEA.
 * User: jaroslavlzicar
 * Date: 09/03/16
 * Time: 21:51
 */
class demoController{

    public $string;

    public function __construct(){
        $this->string = "Hello World";
    }

    public function showDefault(){
        view($this->string);
    }

}