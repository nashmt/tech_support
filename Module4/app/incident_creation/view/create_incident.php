<main>
    <h1>Create Incident</h1>
    <form method='post' action='.' id='aligned'>
        <input type='hidden' name='customerID' value='<?php echo $customer['customerID'] ?>'>
        <input type='hidden' name='action' value='create_incident'>
        
        <label>Customer: </label>
        <p><?php echo htmlspecialchars($customer['firstName'] . ' ' . $customer['lastName']) ?></p>
        <br>
        
        <label>Product: </label>
        <select name='productCode'>
            <?php foreach ($products as $product) : ?>
            <?php $prod= get_product($product['productCode']); $name = $prod['name']; ?>
            <option value='<?php echo htmlspecialchars($product['productCode']); ?>'><?php echo $name; ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        
        <label>Title: </label>
        <input type='text' name='title' maxlength='50'/>
        <br>
        
        <label>Description: </label>
        <textarea name='description' maxlength='2000' cols='40' rows='5' id='description'></textarea>
        <br>
        
        <label>&nbsp;</label>
        <input type='submit' value='Create Incident'/>
        <br>
        
    </form>
    
</main>
