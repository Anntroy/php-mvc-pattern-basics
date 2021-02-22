<?php
//You must create a File call condb.php in ./config/. It must containd definitions of three constants DB_HOST, DB_USER and DB_PASSWORD
//You can see an example in Readme.

$condb = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, 'MVC_Pattern_Basics');

//CONTROLLERS
define("CONTROLLERS", BASE_PATH . '/controllers/');

//VIEWS
define("VIEWS", BASE_PATH . '/views/');

//MODELS
define("MODELS", BASE_PATH . '/models/');

//RESOURCES
define("RESOURCES", BASE_PATH . '/resources/');

//ASSETS
define("ASSETS", BASE_PATH . '/assets/');


