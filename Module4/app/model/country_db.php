<?php

function getCountries() {
    global $db;
    $query = "SELECT * FROM countries ORDER BY countryName";
    $statement = $db->prepare($query);
    $statement->execute();
    $countries=$statement->fetchall();
    $statement->closeCursor();
    return $countries;
}

function selectedCountry($a, $b) {
    if ($a == $b) {
        $selected = 'selected="selected"';
    }else {
        $selected = '';
    }
    return $selected;
}
?>