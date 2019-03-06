<?php

function create_incident($customerID,$productCode,$title,$description) {
    global $db;
    $now = date('Y-m-d');
    $query = "INSERT INTO incidents (customerID, productCode, dateOpened, title, description) VALUES (:customerID, :productCode, :now, :title, :description)";
    $statement=$db->prepare($query);
    $statement->bindValue(':customerID',$customerID);
    $statement->bindValue(':productCode',$productCode);
    $statement->bindValue(':now', $now);
    $statement->bindValue(':title',$title);
    $statement->bindValue(':description',$description);
    $statement->execute();
    $statement->closeCursor();
    
}

?>
