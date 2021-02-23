<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee</title>
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body class="flex">
  <form class="employee_form" action="index.php" method="GET">
    <div class="employee_form-div">
      <input type="hidden" name="controller" value="employee">
      <input type="hidden" name="action" value="<?= (isset($employee) ? "updateEmployee" : "createEmployee"); ?>">
      <input type="hidden" name="id" value="<?= (isset($employee) ? $employee[0] : ""); ?>">

      <label for="first_name">First name: </label>
      <input type="text" name="first_name" value="<?= (isset($employee) ? $employee[1] : ""); ?>">
      <label for="last_name">Last name: </label>
      <input type="text" name="last_name" value="<?= (isset($employee) ? $employee[2] : ""); ?>">
      <label for="gender">Gender: </label>
      <select name="gender">
        <option value="M" <?= (isset($employee) ? ($employee[3] == 'M' ? 'selected' : '') : ""); ?>>Male</option>
        <option value="F" <?= (isset($employee) ? ($employee[3] == 'F' ? 'selected' : '') : ""); ?>>Female</option>
      </select>
      <input type="submit" name="submit" value="Submit">
    </div>
  </form>
  <a class="addEmployee" href="index.php?controller=employee&action=getAllEmployees">Employees</a>
</body>
</html>
