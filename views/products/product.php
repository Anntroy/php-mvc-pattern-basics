<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New sale</title>
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body class="flex">
  <form class="employee_form" action="index.php" method="GET">
    <div class="employee_form-div">
      <input type="hidden" name="controller" value="products">
      <input type="hidden" name="action" value="createNewSale">

      <label for="employee">Employee: </label>
      <select name="employee">
        <?php
        if (isset($employees)){
          foreach ($employees as $employee) {
            echo "<option value='$employee[0]'>$employee[1]</option>";
          }
        }
        ?>
      </select>
        <label for="product">Product name: </label>
      <select name="product">
      <?php
        if (isset($products)){
          foreach ($products as $product) {
            echo "<option value='$product[0]'>$product[1]</option>";
          }
        }
        ?>
      </select>
      <label for="quantity">Quantity: </label>
      <input type="number" min="1" name="quantity">
      <input type="submit" name="submit" value="Submit">
    </div>
  </form>
</body>
</html>
