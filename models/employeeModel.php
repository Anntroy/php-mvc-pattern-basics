<?php

// if (!$condb) {
//   die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";

function get()
{
  try {
    global $condb;
    $query = "SELECT * FROM employees";
    if ($executeQuery = mysqli_query($condb, $query)) {
      return mysqli_fetch_all($executeQuery);
    } else {
      return false;
    }
  } catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    return false;
  }
}

function getById($id)
{
  try {
    global $condb;
    $query = "SELECT * FROM employees WHERE emp_no=$id";
    $executeQuery = mysqli_query($condb, $query);
    return mysqli_fetch_array($executeQuery);
  } catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    return false;
  }
}


// function updateById($id, $first_name, $last_name, $gender){
//   global $condb;
//   try {
//     $query = "UPDATE employees SET first_name = $first_name , last_name = $last_name, gender = $gender WHERE emp_no=$id";
//     if ($executeQuery = mysqli_query($condb, $query)) {
//       return mysqli_fetch_array($executeQuery);
//     } else {
//       return false;
//     }
//   } catch (Throwable $th) {
//     return false;
//   }
// }
