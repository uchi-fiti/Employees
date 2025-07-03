<?php
    $manager_result = ManagerOFDepartment($bdd);
?>
<div class="container">
    <div class="row mt-3 title text-light">
        <h1 class = "text-center">LIST OF DEPARTMENTS</h1>
    </div>
    <div class="row">
        <table class = "table table-blue table-striped text-center ">
        <thead>
        <tr>
            <th>Departement</th>
            <th>Number of Employees</th>
            <th>Manager</th>
        </tr>
        <thead>
        <tbody class = "table-group-divider">
        <?php while ($data = mysqli_fetch_assoc($manager_result)) {?>
            <tr>
                <th scope = "row"><a class = "text-decoration-none text-primary" href="modal.php?page=affiche&num=<?php echo $data['dept_no']?>"><?php echo $data['dept_name']?></a></th>
                <th scope class = "text-success"><?php echo $data['nb_employees']?></th>
                <th class = "text-danger b-2"><?php echo $data['first_name'] ." " .$data['last_name']?></th>
            </tr>
        <?php }?>
        </tbody>
        </table>
    </div>
</div>