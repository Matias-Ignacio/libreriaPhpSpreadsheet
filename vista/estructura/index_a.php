<?php
$Titulo = "Grupo 5";
include_once("header.php");

?>

<body>
  <div class="d-flex">
    <div id="sidebar">
      <div class="p-2">
        <a href="#" class="navbar-brand text-center text-light w-100 p-4 border-bottom">
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
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
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
            <form class="form-inline my-2 my-md-0">
              <input class="form-control" type="text" placeholder="Search" aria-label="Search">
            </form>
          </div>
        </div>
      </nav>
      <section class="p-3">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2>Sidebar static example</h2>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
  </script>
</body>

</html>