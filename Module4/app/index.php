<?php include 'view/header.php'; ?>
<?php
$pdo = new PDO('mysql:host=mysql;dbname=tech_support;charset=utf8', 'root', 'root');
?>
<main>
    <nav>
        
    <h2>Administrators</h2>
    <ul>
        <li><a href="product_manager">Manage Products</a></li>
        <li><a href="technician_manager">Manage Technicians</a></li>
        <li><a href="customer_manager">Manage Customers</a></li>
        <li><a href="incident_creation">Create Incident</a></li>
        <li><a href="under_construction.php">Assign Incident</a></li>
        <li><a href="under_construction.php">Display Incidents</a></li>
    </ul>

    <h2>Technicians</h2>    
    <ul>
        <li><a href="under_construction.php">Update Incident</a></li>
    </ul>

    <h2>Customers</h2>
    <ul>
        <li><a href="product_registration/">Register Product</a></li>
    </ul>
    
    </nav>
</section>
<?php include 'view/footer.php'; ?>