<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee</title>
  <link rel="stylesheet" href="<?= ASSETS . '/css/style.css'?>">
</head>
<body>

  <form class="employee_form" action="">
    <label for="first_name">First name</label>
      <input type="text" name="first_name" value="<?= (isset($employee)? $employee[1]: ""); ?>">
    <label for="last_name">Last name</label>
      <input type="text" name="last_name" value="<?= (isset($employee)? $employee[2]: ""); ?>">
    <label for="gender">Gender</label>
      <input type="text" name="gender" value="<?= (isset($employee)? $employee[3]: ""); ?>">
    <input type="submit" name="submit" value="Submit">
  </form>
</body>
</html>