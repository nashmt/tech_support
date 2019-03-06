<main>
    <h1>Register Product</h1>
    <form method='post' action='index.php' id='aligned'>
        <input type='hidden' name='customerID' value="<?php echo $customer['customerID'] ?>">
        <input type='hidden' name='action' value='register_product'>
        
        <label>Customer: </label>
        <p><?php echo $customer['firstName'] . ' ' . $customer['lastName'] ?></p>
        <br>
        
        <label>Product: </label>
        <select name='product'>
            <?php foreach ($products as $product) : ?>
            <option value="<?php echo $product['productCode'] ?>"><?php echo $product['name']?></option>
            <?php endforeach; ?>
        </select>
        <br>
        
        <label>&nbsp;</label>
        <input type='submit' value='Register Product'>
    </form>
    
</main>