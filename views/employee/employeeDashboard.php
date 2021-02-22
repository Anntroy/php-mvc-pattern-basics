<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employees</title>
</head>

<body>
  <table>
    <thead>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Gender</th>
      <th>Link</th>
    </thead>
    <tbody>
      <?php
      if (isset($employees)) {
        foreach ($employees as $item) {
          echo "<tr>
                <td>" . $item[1] . "</td>
                <td>" . $item[2] . "</td>
                <td>" . ($item[3] == "M" ? "Male" : "Female") . "</td>
                <td><a href='index.php?controller=employee&action=getEmployee&id=" . $item[0] . "'>Link</a></td>
                <td><a href='index.php?controller=employee&action=deleteEmployee&id=" . $item[0] . "'>Delete</a></td>
              </tr>";
        }
      }
      ?>
    </tbody>
  </table>
  <a href='index.php?controller=employee&action=newEmployee'>New</a>
  <?= isset($_REQUEST['message'])? "<p>" . $_REQUEST['message']. "</p>": ""; ?>
</body>

</html>