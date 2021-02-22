<?php

function get()
{
  try {
    $condb = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, 'MVC_Pattern_Basics');
    $query = "SELECT * FROM employees";
    $executeQuery = mysqli_query($condb, $query);
    return mysqli_fetch_all($executeQuery);
  } catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    return false;
  }
}

function getById($id)
{
  try {
    $condb = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, 'MVC_Pattern_Basics');
    $query = "SELECT * FROM employees WHERE emp_no=$id";
    $executeQuery = mysqli_query($condb, $query);
    return mysqli_fetch_array($executeQuery);
  } catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    return false;
  }
}


function update($request)
{
  try {
    $condb = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, 'MVC_Pattern_Basics');
    mysqli_query($condb, "UPDATE employees SET first_name = '$request[first_name]', last_name = '$request[last_name]', gender = '$request[gender]' WHERE emp_no=$request[id]");
    return "Employee has been updated successfully";
  } catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    return false;
  }
}

function createNew($request)
{
  try {
    $condb = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, 'MVC_Pattern_Basics');
    $newUser = mysqli_query($condb, "SELECT * FROM employees WHERE first_name = '$request[first_name]' AND last_name = '$request[last_name]' AND gender = '$request[gender]'");
    if (mysqli_num_rows($newUser) > 0) {
      return "This employee already exists";
    } else {
      mysqli_query($condb, "INSERT INTO employees (first_name, last_name, gender) VALUES ('$request[first_name]', '$request[last_name]', '$request[gender]')");
      return "New employee created correctly";
    }
  } catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    return false;
  }
}

function deleteById($id)
{
  try {
    $condb = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, 'MVC_Pattern_Basics');
    $exists = mysqli_query($condb, "SELECT * FROM employees WHERE emp_no = $id");
    if (mysqli_num_rows($exists) == 0) {
      return "This employee does not exists";
    } else {
      mysqli_query($condb, "DELETE FROM employees WHERE emp_no = $id");
      return "Employee deleted correctly";
    }
  } catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    return false;
  }
}
