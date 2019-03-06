<?php
include '../view/header.php';
//require('../model/database.php');
require('../model/product_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
}

switch ($action) {
    case 'list_products':
        
        $code = filter_input(INPUT_GET, 'code');
        if ($code == NULL || $code == FALSE) {
            $code = 1;
        }
        $products = get_products_cloud();
        include('view/product_list.php');
        break;
    case 'delete_product':
        $code = filter_input(INPUT_POST, 'code');

        if ($code == NULL || $code == FALSE) {
            $error = "Missing or incorrect product code.";
            include('../errors/error.php');
        } else { 
            delete_product($code);
            header("Location: .");
        }
        break;
    case 'show_add_form':
        include('view/product_add.php');
        break;
    case 'add_product':
        $code = filter_input(INPUT_POST, 'code');
        $name = filter_input(INPUT_POST, 'name');
        $version = filter_input(INPUT_POST, 'version', FILTER_VALIDATE_FLOAT);
        $input_time = filter_input(INPUT_POST, 'release_date');
    
        $release_date = new DateTime($input_time);
        $formatted_time = $release_date->format('Y-m-d');

        if ($code == NULL || $name == NULL || $version == NULL || $version == FALSE || $release_date == NULL || $release_date == FALSE) {
            $error = "Invalid product data. Check all fields and try again.";
            include('../errors/error.php');
        } else { 
            add_product($code, $name, $version, $formatted_time);
            header("Location: .");
        }
        break;
    }      
include '../view/footer.php'; 
?>