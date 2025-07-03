<?php
  if(!isset($_GET['numero'])) {
    $_SESSION['numero'] = 1;
  }else {
    $_SESSION['numero'] = $_GET['numero'];
  }
  $page = $_SESSION['numero'];
  if($page < 1) {
    $page = 1;
    $_SESSION['numero'] = 1;
  }
  $age_max = $_SESSION['age_max'];
  $age_min = $_SESSION['age_min'];
  $department = $_SESSION['department'];
  $Employees_name = $_SESSION['name'];
  if($age_min == null) {
    $age_min = 0;
  }
  if($age_max == null) {
    $age_max = 100;
  }
  $donnees = Recherche($bdd , $department , $Employees_name , $age_min , $age_max , $page) ;
?>

<div class="container">
  <div class="row mt-3 title text-light">
      <h1 class = "text-center">RECHERCHE</h1>
  </div>
  <div class="row mt-1">
    <div class="col-lg-6">
      <a class = "text-decoration-none text-danger" href="modal.php?page=recherche&numero=<?php echo $page - 1?>">
        <div class=" text-center previous w-50 ms-auto">
          <p >PREVIOUS</p>
        </div>
      </a>
    </div>
    <div class="col-lg-6 ms-auto">
      <a class = "text-decoration-none" href= "modal.php?page=recherche&numero=<?php echo $page + 1?>">
        <div class=" text-center  next w-50">
          <p>NEXT</p>
        </div>
      </a>
    </div>
  </div>
  <div class="row">
      <table class = "table table-blue table-striped text-center ">
      <thead>
      <tr>
          <th>Department</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Birth Date</th>
          <th>Age</th>
      </tr>
      </thead>
      <tbody class = "table-group-divider">
      <?php while ($data = mysqli_fetch_assoc($donnees)) {?>
          <tr>
              <td><?php echo $data['dept_name']?></td>
              <td><?php echo $data['first_name']?></td>
              <td><?php echo $data['last_name']?></td>
              <td><?php echo $data['birth_date']?></td>
              <td><?php echo $data['age']?></td>
          </tr>
      <?php }?>
      </tbody>
      </table>
  </div>

