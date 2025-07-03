<?php
    include('../inc/connexion.php');
    include('../inc/function.php');
    session_start();
    $department = $_GET['department'] ;
    $Employees_name = $_GET['Employees_name'] ;
    $age_min = $_GET['age_min'];
    $age_max = $_GET['age_max'];
    $page = $_GET['numero'];
    $_SESSION['department'] = $department;
    $_SESSION['age_min'] = $age_min;
    $_SESSION['age_max'] = $age_max;
    $_SESSION['name'] = $Employees_name;
    $_SESSION['numero'] = $page;
    header('Location: modal.php?page=recherche&numero=1');
?>