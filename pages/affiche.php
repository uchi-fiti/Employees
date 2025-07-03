<?php
    $dept_no = $_GET['num'];
    $employee_stock = EmployeesOFDepartment($bdd , $dept_no);
    $department = selectdepartementsForEmployees($bdd , $dept_no)
?>
<div class="container">
    <div class="row title text-light text-center mt-3">
        <h1>LIST OF EMPLOYEES FOR <i><?php echo $department['Title']?></i></h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            <ul class="list-group shadow">
                <?php while($data = mysqli_fetch_assoc($employee_stock)){?>
                    <a href="modal.php?page=fiche&num=<?php echo $data['emp_no']?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <span class="fw-bold text-primary"><?php echo $data['first_name']?></span>
                        <span class="badge bg-secondary"><?php echo $data['emp_no']?></span>
                    </a>
                <?php }?>
            </ul>
        </div>
    </div>
</div>
