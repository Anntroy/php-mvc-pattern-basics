<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>
  <link rel="stylesheet" href="./assets/css/style.css">
  <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</head>

<body class="flex">
  <table class="content-table">
    <thead>
      <th>Name</th>
      <th>Product</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Total</th>
    </thead>
    <tbody>
      <?php
      if (isset($products)) {
        foreach ($products as $item) {
          echo "<tr>
                <td><a href='index.php?controller=products&action=getSalesEmployee&id=$item[5]'> $item[0] </a></td>
                <td><a href='index.php?controller=products&action=getProduct&id=$item[6]'> $item[1] </a></td>
                <td> $item[2] </td>
                <td> $item[3] </td>
                <td> $item[4] </td>
              </tr>";
        }
      }
      ?>
    </tbody>
  </table>
  <a class="addSale" href='index.php?controller=products&action=newSale'><i class="fas fa-user-plus fa-lg"></i></a>
  <?= isset($_REQUEST['id']) ? "<a class='' href='index.php?controller=products&action=getAllProducts'>Dashboard view</a>" : "<a class='' href='index.php'>Menu</a>"; ?>
  <?= isset($_REQUEST['message']) ? "<aside id='message' class='error_message'><p class='error'>" . $_REQUEST['message'] . "</p></aside>" : ""; ?>
  <script src="./assets/js/utils.js"></script>
</body>

</html>