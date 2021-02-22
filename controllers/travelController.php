<?php

if (isset($_REQUEST['action'])) {
  function_exists($_REQUEST['action']) ?
    call_user_func($_REQUEST['action']) :
    error('We can not perform this action');
} else {
  error('There is no such action');
}


function getAllTravel()
{
  require_once MODELS . "travelModel.php";
  $travelAll = get();
  require_once VIEWS . "employee/employeeDashboard.php";
}

function getTravel($request)
{
  if (isset($request['id'])) {
  require_once MODELS . "travelModel.php";
    $employee = getById($request['id']) ?
      require_once VIEWS . "employee/employee.php" :
      error('We can not connect correctly with database');
  } else {
    error('We can not perform this action whitout correct parameters');
  }
}
