<?php


//OBTAIN THE ACCION PASSED IN THE URL AND EXECUTE IT AS A FUNCTION


//Keep in mind that the function to be executed has to be one of the ones declared in this controller
// TODO Implement the logic
if (isset($_REQUEST['action'])) {
  function_exists($_REQUEST['action']) ?
    call_user_func($_REQUEST['action'], $_REQUEST) :
    error('We can not perform this action');
} else {
  error('There is no such action');
}


/* ~~~ CONTROLLER FUNCTIONS ~~~ */

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getAllEmployees()
{
  require_once MODELS . "employeeModel.php";
  $employees = get();
  require_once VIEWS . "employee/employeeDashboard.php";
}

/**
 * This function calls the corresponding model function and includes the corresponding view
 */
function getEmployee($request)
{
  if (isset($request['id'])) {
    require_once MODELS . "employeeModel.php";
    if($employee = getById($request['id'])){
      require_once VIEWS . "employee/employee.php";
    }
    else {

      error('We can not connect correctly with database');
    }
  } else {
    error('We can not perform this action whitout correct parameters');
  }
}
