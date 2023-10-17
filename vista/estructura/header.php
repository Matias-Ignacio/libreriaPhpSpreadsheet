<?php
  include_once("../../configuracion.php");

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  
  <title><?php echo $Titulo;?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles.css">
  <style>
    #sidebar {
      width: 20%;
      height: 100vh;
      background: #343a40;
    }
  </style>
  <script src="../libs/node_modules/jquery/dist/jquery.min.js"></script>
</head>


<body>
  <div class="d-flex">
    <div id="sidebar">
      <div class="p-2">
        <a href="../../index.php" class="navbar-brand text-center text-light w-100 p-4 border-bottom">
          Libreria PhpSpreadsheet
        </a>
      </div>
      <div id="sidebar-accordion" class="accordion">
        <div class="list-group">
          <a href="#dashboard-items" data-toggle="collapse" aria-expanded="false"
            class="list-group-item list-group-item-action bg-dark text-light">
            <i class="fa fa-tachometer mr-3" aria-hidden="true"></i>Relojes
          </a>
          <div id="dashboard-items" class="collapse" data-parent="#sidebar-accordion">
            <a href="../reloj/indexReloj.php" class="list-group-item list-group-item-action bg-dark text-light pl-5">
              Reloj
            </a>
            <a href="../marca/indexMarca.php" class="list-group-item list-group-item-action bg-dark text-light pl-5">
              Marca
            </a>
            <a href="../tipo/indexTipo.php" class="list-group-item list-group-item-action bg-dark text-light pl-5">
              Tipo
            </a>
            <a href="../venta/indexVenta.php" class="list-group-item list-group-item-action bg-dark text-light pl-5">
              Ventas
            </a>
          </div>
          <a href="#profile-items" data-toggle="collapse" aria-expanded="false"
            class="list-group-item list-group-item-action bg-dark text-light">
            <i class="fa fa-user mr-3" aria-hidden="true"></i>Profile
          </a>
          <div id="profile-items" class="collapse" data-parent="#sidebar-accordion">
            <a href="#" class="list-group-item list-group-item-action bg-dark text-light pl-5">
              Item 1
            </a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-light pl-5">
              Item 2
            </a>
          </div>
          <a href="#" class="list-group-item list-group-item-action bg-dark text-light">
            <i class="fa fa-shopping-cart mr-3" aria-hidden="true"></i>Buy Now!
          </a>
          <a href="#setting-items" data-toggle="collapse" aria-expanded="false"
            class="list-group-item list-group-item-action bg-dark text-light">
            <i class="fa fa-cog mr-3" aria-hidden="true"></i>Settings
          </a>
          <div id="setting-items" class="collapse" data-parent="#sidebar-accordion">
            <div class="d-flex flex-row text-center">
              <a href="#" class="list-group-item list-group-item-action bg-dark text-light">
                Item 1
              </a>
              <a href="#" class="list-group-item list-group-item-action bg-dark text-light">
                Item 2
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content w-100">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-xl">
          <a class="navbar-brand" href="#">Container XL</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07XL" aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <div class="collapse navbar-collapse" id="navbarsExample07XL">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown07XL" data-toggle="dropdown" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown07XL">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <section class="p-3">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              
  