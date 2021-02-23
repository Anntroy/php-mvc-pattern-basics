<?php
function get()
{
  try {
    $condb = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, 'MVC_Pattern_Basics');
    $query = "SELECT CONCAT(e.first_name, ' ', e.last_name) Name, p.prod_name, p.sell_price, s.quantity, (p.sell_price * s.quantity) amount, s.emp_no, s.prod_no FROM employees e INNER JOIN sales s ON e.emp_no=s.emp_no INNER JOIN products p ON s.prod_no=p.prod_no ORDER BY amount DESC;";
    $executeQuery = mysqli_query($condb, $query);
    return mysqli_fetch_all($executeQuery);
  } catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    return false;
  }
}

function getProductById($id)
{
  try {
    $condb = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, 'MVC_Pattern_Basics');
    $query = "SELECT CONCAT(e.first_name, ' ', e.last_name) Name, p.prod_name, p.sell_price, s.quantity, (p.sell_price * s.quantity) amount, s.emp_no, s.prod_no FROM employees e INNER JOIN sales s ON e.emp_no=s.emp_no INNER JOIN products p ON s.prod_no=p.prod_no WHERE s.prod_no=$id ORDER BY amount DESC;";
    $executeQuery = mysqli_query($condb, $query);
    return mysqli_fetch_all($executeQuery);
  } catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    return false;
  }
}

function getEmployeeSalesById($id)
{
  try {
    $condb = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, 'MVC_Pattern_Basics');
    $query = "SELECT CONCAT(e.first_name, ' ', e.last_name) Name, p.prod_name, p.sell_price, s.quantity, (p.sell_price * s.quantity) amount, s.emp_no, s.prod_no FROM employees e INNER JOIN sales s ON e.emp_no=s.emp_no INNER JOIN products p ON s.prod_no=p.prod_no WHERE s.emp_no=$id ORDER BY amount DESC;";
    $executeQuery = mysqli_query($condb, $query);
    return mysqli_fetch_all($executeQuery);
  } catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    return false;
  }
}

function getAll()
{
  try {
    $condb = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, 'MVC_Pattern_Basics');
    $query = "SELECT * FROM products;";
    $executeQuery = mysqli_query($condb, $query);
    return mysqli_fetch_all($executeQuery);
  } catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    return false;
  }
}

function getAllEmployees()
{
  try {
    $condb = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, 'MVC_Pattern_Basics');
    $query = "SELECT emp_no, CONCAT (first_name, ' ', last_name) name FROM employees;";
    $executeQuery = mysqli_query($condb, $query);
    return mysqli_fetch_all($executeQuery);
  } catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    return false;
  }
}

function createNew($request)
{
  try {
    $condb = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, 'MVC_Pattern_Basics');
    mysqli_query($condb, "INSERT INTO sales (emp_no, prod_no, quantity) VALUES ('$request[employee]', '$request[product]', '$request[quantity]')");
    return "New sale created correctly";
  } catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    return false;
  }
}
