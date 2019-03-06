<?php
function searchCustomers_byLastName($lastName) {
    global $db;
    $query = "SELECT customerID, firstName, lastName, email, city FROM customers WHERE lastName =:lastName ORDER BY firstName";
    $statement = $db->prepare($query);
    $statement->bindValue(':lastName',$lastName);
    $statement->execute();
    $customers = $statement->fetchall();
    $statement->closeCursor();
    return $customers;
    
}

function searchCustomers_byEmail($email) {
    global $db;
    $query = "SELECT * FROM customers WHERE email = :email";
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    return $customer;
}

function customerSelect_byID($customerID) {
    global $db;
    $query = 'SELECT * FROM customers WHERE customerID = :customerID';
    $statement = $db->prepare($query);
    $statement->bindValue(':customerID',$customerID);
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    return $customer;
}

function customerUpdate($customerID, $firstName, $lastName, $address, $city, $state, $postalCode, $countryCode, $phone, $email, $password) {
    global $db;
    $query = 'UPDATE customers 
                SET firstName = :firstName, lastName = :lastName, address = :address, city = :city,
                state = :state, postalCode = :postalCode, countryCode = :countryCode,
                phone = :phone, email = :email, password = :password
                WHERE customerID = :customerID';
    
    $statement = $db->prepare($query);
    $statement->bindValue(':customerID',$customerID);
    $statement->bindValue(':firstName',$firstName);
    $statement->bindValue(':lastName',$lastName);
    $statement->bindValue(':address',$address);
    $statement->bindValue(':city',$city);
    $statement->bindValue(':state',$state);
    $statement->bindValue(':postalCode',$postalCode);
    $statement->bindValue(':countryCode',$countryCode);
    $statement->bindValue(':phone',$phone);
    $statement->bindValue(':email',$email);
    $statement->bindValue(':password',$password);
    $statement->execute();
    $statement->closeCursor();
}

?>