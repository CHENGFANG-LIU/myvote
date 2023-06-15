<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  if(isset($_GET['sign_err'])){
    echo $_GET['sign_err'];
  }
  ?>
  <form action="../api/sign.php" method="post">
    <label>e-mail</label>
    <input name="email">
    <label>password</label>
    <input name="pw" type="password">
    <button type="submit">送出</button>


  </form>
</body>
</html>