<?php

define("BASE_PATH", dirname(__FILE__));
require_once 'config/condb.php';
require_once "config/constants.php";
require_once "helpers/helpers.php";


// This is the entry point of your application, all your application must be executed in
// the "index.php", in such a way that you must include the controller passed by the URL
// dynamically so that it ends up including the view.


if (isset($_REQUEST['controller'])) {

  file_exists(CONTROLLERS . $_REQUEST['controller'] . "Controller.php") ?
    require_once CONTROLLERS . $_REQUEST['controller'] . "Controller.php" :
    error("This controller does not exist");
} else {

  empty($_REQUEST) ? require_once VIEWS . "/main/main.php" : header('Location: index.php');
}




// TODO Implement the logic to include the controller passed by the URL dynamically
// In the event that the controller passed by URL does not exist, you must show the error view.
