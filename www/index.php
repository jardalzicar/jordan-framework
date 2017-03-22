<?php
/**
 * ~~~~~~~~~~~~~~~~~~~~
 * JORDAN FRAMEWORK }{}
 * ~~~~~~~~~~~~~~~~~~~~
 *
 * Index file...
 *
 */

    require_once "../app/config.php";

    if (isset($_GET['controller']) && isset($_GET['action'])) {
        $controller = $_GET['controller'];
        $action     = $_GET['action'];
    } else {
        $controller = 'demo';
        $action     = 'showDefault';
    }

    require_once APPDIR."core.php";

?>