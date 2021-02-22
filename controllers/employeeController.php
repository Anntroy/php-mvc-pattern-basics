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
    if ($employee = getById($request['id'])) {
      require_once VIEWS . "employee/employee.php";
    } else {

      error('We can not connect correctly with database');
    }
  } else {
    error('We can not perform this action whitout correct parameters');
  }
}

function updateEmployee($request)
{
  if (isset($request['id']) and isset($request['first_name']) and isset($request['last_name']) and isset($request['gender'])) {
    require_once MODELS . "employeeModel.php";
    if ($message = updateById($request['id'], $request['first_name'], $request['last_name'], $request['gender'])) {
      header("Refresh:0; url=index.php?controller=employee&action=getAllEmployees&message=$message");
    } else {

      error('We can not connect correctly with database');
    }
  } else {
    error('We can not perform this action whitout correct parameters');
  }
}

function createEmployee($request)
{
  require_once MODELS . "employeeModel.php";
  if ($message = createNew($request['first_name'], $request['last_name'], $request['gender'])) {
    header("Location: index.php?controller=employee&action=getAllEmployees&message=$message");
  } else {
    error('We can not connect correctly with database');
  }
}

function newEmployee()
{
  require_once "./views/employee/employee.php";
}

function deleteEmployee($request)
{
  require_once MODELS . "employeeModel.php";
  if (isset($request['id'])) {
    if ($message = deleteById($request['id'])) {
      header("Location: index.php?controller=employee&action=getAllEmployees&message=$message");
    } else {
      error('We can not connect correctly with database');
    }
  } else {
    error('We can not perform this action whitout correct parameters');
  }
}
