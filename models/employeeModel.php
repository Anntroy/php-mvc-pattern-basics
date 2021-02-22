<?php

// if (!$condb) {
//   die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";

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


function updateById($id, $first_name, $last_name, $gender)
{
  $condb = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, 'MVC_Pattern_Basics');
  try {
    $query = "UPDATE employees SET first_name = '$first_name', last_name = '$last_name', gender = '$gender' WHERE emp_no=$id";
    $executeQuery = mysqli_query($condb, $query);
    return "Employee has been updated successfully";
  } catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    return false;
  }
}

function createNew($first_name, $last_name, $gender)
{
  $condb = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, 'MVC_Pattern_Basics');
  try {
    $newUser = mysqli_query($condb, "SELECT * FROM employees WHERE first_name = '$first_name' AND last_name = '$last_name' AND gender = '$gender'");
    if (mysqli_num_rows($newUser) > 0) {
      return "This employee already exists";
    } else {
      mysqli_query($condb, "INSERT INTO employees (first_name, last_name, gender) VALUES ('$first_name', '$last_name', '$gender')");
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
