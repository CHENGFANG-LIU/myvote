<?php
include_once "common.php";
$User->validate();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/style.css">
  <script src="./js/jquery-3.7.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


</head>

<body class="container-fluid">


  <nav class="navbar navbar-expand-lg bg-light box">
    <div class="container">
      <a class="navbar-brand" href="#">MYVOTE</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " href="index.php?go=hot">會員資料</a>
          </li>
          <?php
          
          switch ($_SESSION['pr']) {
            case 2:
              echo "<li class='nav-item'><a class='nav-link' href='back.php?go=super'>身分管理</a></li>";
              
              break;

            case 1:
              echo "<li class='nav-item'>
              <a class='nav-link' href='back.php?go=vote_list'>管理投票</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='back.php?go=post_vote'>新增投票</a>
            </li>"
              
              ;
              break;
            case 0:
              echo"
              <li class='nav-item'>
              <a class='nav-link' href='back.php?go=vote_list'>我的投票</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='back.php?go=post_vote'>收藏投票</a>
            </li>
              ";
              break;

          }
          ?>
          

          <li class="nav-item">
            <a class="nav-link" href="index.php?go=sign_in">登出</a>
          </li>

        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <div class="box container">
    <br>
    <?php
    $go = $_GET['go'] ?? "vote_list";

    $file = "back/" . $go . ".php";
    if (file_exists($file)) {
      include $file;
    } else {
      include "./back/vote_list.php";
    }


    ?>


  </div>










</body>

</html>