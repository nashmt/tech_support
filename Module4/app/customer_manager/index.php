
<?php
include '../view/header.php';
require('../model/database.php');
require('../model/customer_db.php');
require('../model/country_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'wait_for_search';
    } 
}

switch ($action) {
	case 'wait_for_search':
		include('view/customer_search_byLastName.php');
                break;
	case 'display_search_results':
                include('view/customer_search_byLastName.php');
		$lastName = filter_input(INPUT_GET, 'lastName');
		$customers = searchCustomers_byLastName($lastName);
		if ($customers == NULL || $customers == FALSE) {
			include('../errors/no_results.php');
		} else {
			include('view/customer_results.php');
			}
                break;
	case 'select_customer':
		$customerID = filter_input(INPUT_POST, 'customerID', FILTER_VALIDATE_INT);
		$customer = customerSelect_byID($customerID);
		if ($customerID == NULL || $customerID == FALSE) {
			$error = 'Missing customer identification number.';
			include('../errors/error.php');
		} else {
                        $countries = getCountries();
                        include('view/customer_update_form.php');
			}
                break;
	case 'update_customer':
		$customerID = filter_input(INPUT_POST, 'UcustomerID', FILTER_VALIDATE_INT);
                $firstName = filter_input(INPUT_POST, 'UfirstName');
                $lastName = filter_input(INPUT_POST, 'UlastName');
                $address = filter_input(INPUT_POST, 'Uaddress');
                $city = filter_input(INPUT_POST, 'Ucity');
                $state = filter_input(INPUT_POST, 'Ustate');
                $postalCode = filter_input(INPUT_POST, 'UpostalCode');
                $countryCode = filter_input(INPUT_POST, 'UcountryCode');
                $phone = filter_input(INPUT_POST, 'Uphone');
                $email = filter_input(INPUT_POST, 'Uemail');
                $password = filter_input(INPUT_POST, 'Upassword');
                if ($customerID == NULL || $customerID == FALSE || $firstName == NULL || $firstName == FALSE || $lastName == NULL || $lastName == FALSE ||
                        $address == NULL || $address == FALSE || $city == NULL || $city == FALSE || $state == NULL || $state == FALSE || $postalCode == NULL ||
                        $postalCode == FALSE || $countryCode == NULL || $countryCode == FALSE || $phone == NULL || $phone == FALSE || $email == NULL || $email == 
                        FALSE || $password == NULL || $password == FALSE) {
                    $error = 'Updated information incomplete or incorrect.';
                    include('../errors/error.php');
                } else {
                    customerUpdate($customerID, $firstName, $lastName, $address, $city, $state, $postalCode, $countryCode, $phone, $email, $password);
                    header("Location: . ");
                }
                break;
}
include '../view/footer.php';
?>