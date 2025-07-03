<?php
  include('../inc/connexion.php');
  include('../inc/function.php');
  session_start();
  $donnes = selectalldepartements($bdd);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/CSS/style.css">
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <div class = "container mt-5">
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
          <div class="logo" href="#"><a class = "touche fs-1">TENJYXHARENA</a></div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="modal.php?page=accueil">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="modal.php?page=details">Details</a>
              </li>
            </ul>
        </nav>
        <header class = "text-end">
          <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><div class="logo">
          <p class = "touche fs-3">SEARCH</p>
        </div></button>  
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasRightLabel">SEARCH</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <div class="row text-center">
                <form action="traitement_recherche.php" method="get">
                  <input type="hidden" name="numero" value = "1">
                  <h2 class = "text-start">department</h2>
                  <select name="department" id="department" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option value="">None</option>
                    <?php while ($data = mysqli_fetch_assoc($donnes)) {?>
                      <option value="<?php echo $data['dept_no']?>"><?php echo $data['dept_name']?></option>
                    <?php }?>
                  </select>
                  <h2 class = "text-start">Employees</h2>
                  <input type="text" name="Employees_name" class = "form-control w-100"id="">
                  <div class="row mt-5">
                    <div class="col-lg-4 ">
                      <p>Age minimum</p>
                      <input type="number" name="age_min" class = "w-100 form-control" id="">
                    </div>
                    <div class="col-lg-4 ms-auto">
                      <p>Age maximum</p>
                      <input type="number" name="age_max" class = "w-100 form-control" id="">
                    </div>
                  </div>
                  <button type="submit" class = "btn btn-danger w-100 mt-3">Search</button>
                </form>
              </div>
            </div>
          </div>
        </header>
      <?php $page = $_GET['page'];
        include($page.".php");      
      ?>
    </div>
</body>
</html>