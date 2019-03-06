<?php
include '../view/header.php';
require('../model/database.php');
require('../model/customer_db.php');
require('../model/product_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'wait_for_login';
    }
}

switch ($action) {
    case 'wait_for_login':
        include('view/customer_login_by_email.php');
        break;
    case 'customer_login':
        $email=filter_input(INPUT_POST, 'email');
        $customer=searchCustomers_byEmail($email);
        $products = get_products();
        include('view/register_product.php');
        break;
    case 'register_product':
        $customerID=filter_input(INPUT_POST, 'customerID');
        $customer=customerSelect_byID($customerID);
        $getTime = new DateTime();
        $now = $getTime->format("Y-m-d H:i:s");
        $productCode=filter_input(INPUT_POST, 'product');
        if ($customer == FALSE || $customer == NULL || $productCode == FALSE || $productCode == NULL) {
            $error = 'Customer or product information is not valid. Product not registered.';
            include('../errors/error.php');
        } else {
            register_product($customerID, $productCode, $now);
            include('view/registration_success.php');
        }
        break;
}

include '../view/footer.php';
