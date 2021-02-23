<!-- This is the error view that you should show when the request was wrong -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>error</title>
</head>

<body>
  <p>
    <?= isset($errorMsg) ? $errorMsg : "Fatal error" ?>
  </p>
  <a class="link" href="index.php">Menu</a>
</body>

</html>