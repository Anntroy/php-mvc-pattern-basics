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