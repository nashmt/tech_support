<?php
include '../view/header.php';
require('../model/database.php');
require('../model/customer_db.php');
require('../model/product_db.php');
require('../model/incident_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'wait_for_login';
    }
}

switch ($action):
    case 'wait_for_login':
        include('view/customer_login_byEmail.php');
        break;
    case 'customer_search_by_email':
        $email=filter_input(INPUT_POST, 'email');
        $customer = searchCustomers_byEmail($email);
        $products = get_registered_products($customer['customerID']);
        include('view/create_incident.php');
        break;
    case 'create_incident':
        $customerID = filter_input(INPUT_POST,'customerID',FILTER_VALIDATE_INT);
        $productCode = filter_input(INPUT_POST,'productCode');
        $title = filter_input(INPUT_POST, 'title');
        $description = filter_input(INPUT_POST, 'description');
        if ($title == NULL || $title == FALSE) {
            $error = 'You must provide a title for the incident.';
            include('../errors/error.php');
        } elseif ($description == NULL || $description == FALSE) {
            $error = 'You must provide a brief description of the incident.';
            include('../errors/error.php');
        }
        else {
            create_incident($customerID, $productCode,$title,$description);
            include('view/incident_creation_success.php');
        }
        break;
endswitch;

include('../view/footer.php');
