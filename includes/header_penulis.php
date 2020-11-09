<?php
  require_once('../lib/db_login.php');
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap and CSS -->
  <link rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css" integrity="sha256-x8PYmLKD83R9T/sYmJn1j3is/chhJdySyhet/JuHnfY=" crossorigin="anonymous"/>
  <link rel="stylesheet" href="../src/css/style.css" />
  <link rel="icon" type="image/x-icon" href="../favicon.ico">

  <title>Website Sekumpulan Hewan</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-mattBlackLight fixed-top">
    <button class="navbar-toggler sideMenuToggler" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Penulis</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle p-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons icon">person</i>
            <?php
              if ($_SESSION['username']) {
                $user = $_SESSION['username'];
              }

              $query = "SELECT * FROM penulis WHERE email = '$user'";
              $result = $db->query($query);
              if (!$result) {
                die ("Could not query the database: <br>".$db->error);
              }

              while ($row = $result->fetch_object()) {
                echo '<span class="text">'.$row->nama.'</span>';
              }
            ?>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../penulis/edit_profil.php">Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../penulis/logout.php">Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <div class="wrapper d-flex">
    <div class="sideMenu bg-mattBlackLight">
      <div class="sidebar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="../index.php" class="nav-link px-2">
              <i class="material-icons icon">home</i>
              <span class="text">Home</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="index_penulis.php" class="nav-link px-2">
              <i class="material-icons icon">dashboard</i>
              <span class="text">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link px-2 sideMenuToggler">
              <i class="material-icons icon expandView">view_list</i>
              <span class="text">Resize</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
