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
    <a class="navbar-brand" href="#">Login</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
      </form>
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
            <a href="../pengunjung/register.php" class="nav-link px-2">
              <i class="material-icons icon">person_pin</i>
              <span class="text">Pengunjung</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="../penulis/login.php" class="nav-link px-2">
              <i class="material-icons icon">person_outline</i>
              <span class="text">Penulis</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="login.php" class="nav-link px-2">
              <i class="material-icons icon">person</i>
              <span class="text">Admin</span>
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
