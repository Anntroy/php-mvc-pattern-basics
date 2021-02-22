<?php
function get()
{
  global $condb;
  try {
    $query = "SELECT * FROM employees";
    if ($executeQuery = mysqli_query($condb, $query)) {
      return mysqli_fetch_all($executeQuery);
    } else {
      return false;
    }
  } catch (\Throwable $th) {
    return false;
  }
}

function getById($id)
{
  global $condb;
  try {
    echo $id;

    $query = "SELECT * FROM employees WHERE emp_no=$id";
    if ($executeQuery = mysqli_query($condb, $query)) {
      return mysqli_fetch_all($executeQuery);
    } else {
      return false;
    }
  } catch (\Throwable $th) {
    return false;
  }
}
