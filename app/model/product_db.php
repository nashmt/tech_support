 <?php
 
function get_products_cloud() {
    $dbhost = 'localhost:3306';
    $dbuser = 'csci459';
    $dbpass = 'csci459';
    $dbname = 'tech_support';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
         
    if(! $conn ) {
        die('Could not connect: ' . mysqli_error($conn));
    }
    $sql = 'SELECT * FROM products';

    mysqli_select_db('tech_support');
    $retval = mysqli_query($sql, $conn);

    $products = mysqli_fetch_assoc($retval);
    return $products;    
}
function get_products() {
    global $db;
    $query = "SELECT * FROM products ORDER BY name";
    $statement= $db->prepare($query);
    $statement->execute();
    $products=$statement->fetchall();
    $statement->closeCursor();
    return $products;    
}

function register_product($customerID, $productCode, $now) {
    global $db;
    //$now = new DateTime();
    $query = "INSERT INTO registrations VALUES (:customerID, :productCode, :now)";
    $statement= $db->prepare($query);
    $statement->bindValue(':customerID', $customerID);
    $statement->bindValue(':productCode', $productCode);
    $statement->bindValue(':now', $now);
    $statement->execute();
    $statement->closeCursor();
}

function get_product($code) {
    global $db;
    $query = 'SELECT * FROM products
              WHERE productCode = :code';
    $statement = $db->prepare($query);
    $statement->bindValue('code', $code);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    return $product;
}

function delete_product($code) {
    global $db;
    $query = 'DELETE FROM products
              WHERE productCode = :code';
    $statement = $db->prepare($query);
    $statement->bindValue(':code', $code);
    $statement->execute();
    $statement->closeCursor();
}

function add_product($code, $name, $version, $release_date) {
    global $db;
    $query = 'INSERT INTO products
                 (productCode, name, version, releaseDate)
              VALUES
                 (:code, :name, :version, :release_date)';
    $statement = $db->prepare($query);
    $statement->bindValue(':release_date', $release_date);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':version', $version);
    $statement->execute();
    $statement->closeCursor();
}

function get_registered_products($customerID) {
    global $db;
    $query = "SELECT * FROM registrations WHERE customerID = :customerID";
    $statement=$db->prepare($query);
    $statement->bindValue(':customerID',$customerID);
    $statement->execute();
    $products=$statement->fetchall();
    $statement->closeCursor();
    return $products;
}

?>