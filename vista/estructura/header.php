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
            <i class="fa fa-user mr-3" aria-hidden="true"></i>Referencias
          </a>
          <div id="profile-items" class="collapse" data-parent="#sidebar-accordion">
            <a href="https://www.baulphp.com/generar-excel-con-phpspreadsheet-y-php-mysql/" class="list-group-item list-group-item-action bg-dark text-light pl-5">
              baulphp
            </a>
            <a href="https://phpspreadsheet.readthedocs.io/en/latest/" class="list-group-item list-group-item-action bg-dark text-light pl-5">
              Welcome PhpSpreadsheet
            </a>
            <a href="https://github.com/PHPOffice/PhpSpreadsheet" class="list-group-item list-group-item-action bg-dark text-light pl-5">
              Repositorio GitHub
            </a>
          </div>
          <a href="https://packagist.org/" class="list-group-item list-group-item-action bg-dark text-light">
            <i class="fa fa-shopping-cart mr-3" aria-hidden="true"></i>Packagist
          </a>

        </div>
      </div>
    </div>


              
  