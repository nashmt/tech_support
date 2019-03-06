<?php
include '../view/header.php';
require('../model/database.php');
require('../model/technician_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_technicians';
    }
}

if ($action == 'list_technicians') {
    $techID = filter_input(INPUT_GET, 'techID');
    if ($techID == NULL || $techID == FALSE) {
        $techID = 1;
    }
    $technicians = get_technicians();
    include('../technician_manager/technician_list.php');
} else if ($action == 'delete_technician') {
    $techID = filter_input(INPUT_POST, 'techID');

    if ($techID == NULL || $techID == FALSE) {
        $error = "Missing or incorrect technician ID.";
        include('../errors/error.php');
    } else { 
        delete_technician($techID);
        header("Location: .");
    }
} else if ($action == 'show_add_form') {
    include('../technician_manager/technician_add.php');    
} else if ($action == 'add_technician') {
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $email = filter_input(INPUT_POST, 'email');
    $phone = filter_input(INPUT_POST, 'phone');
    $password = filter_input(INPUT_POST, 'password');
    if ($firstName == NULL || $lastName == NULL || $email == NULL || $phone == FALSE || $email == NULL || $password == FALSE || $password == NULL) {
        $error = "Invalid technician data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        add_technician($firstName, $lastName, $email, $phone, $password);
        header("Location: .");
    }
}   
include '../view/footer.php'; 
?>

