<?php

if (isset($_REQUEST['action'])) {
  function_exists($_REQUEST['action']) ?
    call_user_func($_REQUEST['action'], $_REQUEST) :
    error('We can not perform this action');
} else {
  error('There is no such action');
}

function getAllProducts()
{
  require_once MODELS . "productsModel.php";
  $products = get();
  require_once VIEWS . "products/productsDashboard.php";
}

function getProduct($request)
{
  if (isset($request['id'])) {
    require_once MODELS . "productsModel.php";
    if ($products = getProductById($request['id'])) {
      require_once VIEWS . "products/productsDashboard.php";
    } else {
      error('We can not connect correctly with database');
    }
  } else {
    error('We can not perform this action whitout correct parameters');
  }
}

function getSalesEmployee($request)
{
  if (isset($request['id'])) {
    require_once MODELS . "productsModel.php";
    if ($products = getEmployeeSalesById($request['id'])) {
      require_once VIEWS . "products/productsDashboard.php";
    } else {
      error('We can not connect correctly with database');
    }
  } else {
    error('We can not perform this action whitout correct parameters');
  }
}

function newSale()
{
  try {
    require_once MODELS . "productsModel.php";
    $employees = getAllEmployees();
    $products =  getAll();
    require_once VIEWS . "products/product.php";
  } catch (Throwable $th) {
    error('We can not connect correctly with database');
  }
}

function createNewSale($request)
{
  require_once MODELS . "productsModel.php";
  if ($message = createNew($request)) {
    header("Location: index.php?controller=products&action=getAllProducts&message=$message");
  } else {
    error('We can not connect correctly with database');
  }
}
