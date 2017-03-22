<?php
/**
 * Created by IntelliJ IDEA.
 * User: jaroslavlzicar
 * Date: 27/11/15
 * Time: 15:06
 */

define("APPDIR",__DIR__."/");
define("DBFILE", __DIR__."/database/prislovi.sqlite3");

define("VIEWS", __DIR__."/views/");
define("CONTROLLERS", __DIR__."/controllers/");
define("MODELS", __DIR__."/models/");
define("LIBS", __DIR__."/libs/");
define("LAYOUT", VIEWS."layout.php");


date_default_timezone_set('Europe/Prague');
SetLocale(LC_ALL, "Czech");

?>