<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employees</title>
  <link rel="stylesheet" href="./assets/css/style.css">
  <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</head>

<body class="flex">
  <table class="content-table">
    <thead>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Gender</th>
      <th>Edit</th>
      <th>Delete</th>
    </thead>
    <tbody>
      <?php
      if (isset($employees)) {
        foreach ($employees as $item) {
          echo "<tr>
                <td>" . $item[1] . "</td>
                <td>" . $item[2] . "</td>
                <td>" . ($item[3] == "M" ? "Male" : "Female") . "</td>
                <td><a href='index.php?controller=employee&action=getEmployee&id=" . $item[0] . "'><i class='fas fa-marker'></i></a></td>
                <td><a href='index.php?controller=employee&action=deleteEmployee&id=" . $item[0] . "'><i class='fas fa-trash'></i></a></td>
              </tr>";
        }
      }
      ?>
    </tbody>
  </table>
  <a class="addEmployee" href='index.php?controller=employee&action=newEmployee'><i class="fas fa-user-plus fa-lg"></i></a>
  <?= isset($_REQUEST['message'])? "<aside class='error_message'><p class='error'>" . $_REQUEST['message']. "</p></aside>": ""; ?>
</body>

</html>