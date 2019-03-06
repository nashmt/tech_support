<head>
<link rel="stylesheet" type="text/css"
          href="../../../main.css">
</head>

<body>
    <main>
        <h1>View/Update Customer</h1>
        <form action='index.php' method='post' id="aligned">
            <input type='hidden' name='action' value='update_customer' >
            <input type='hidden' name='UcustomerID' value="<?php echo $customer['customerID']; ?>" >
            <br>
        
            <label>First Name: </label>
            <input type="text" name="UfirstName" value="<?php echo $customer['firstName']; ?>"/> 
            <br>
        
            <label>Last Name: </label>  
            <input type="text" name="UlastName" value="<?php echo $customer['lastName']; ?>"/>
            <br>
        
            <label>Address: </label>
            <input type="text" name='Uaddress' value="<?php echo $customer['address']; ?>" />    
            <br>
        
            <label>City: </label> 
            <input type='text' name='Ucity' value="<?php echo $customer['city']; ?>"/>
            <br>
        
            <label>State: </label>
            <input type='text' name='Ustate' value="<?php echo $customer['state']; ?>"/>  
            <br>
        
            <label>Postal Code: </label>  
            <input type='text' name='UpostalCode' value='<?php echo $customer['postalCode']; ?>' />
            <br>
        
            <label>Country: </label>
            <select name="UcountryCode">
                <?php foreach ($countries as $country) : ?>
                <?php $selected = selectedCountry($country['countryCode'],$customer['countryCode']); ?>
                <option value="<?php echo htmlspecialchars($country['countryCode']); ?>" 
                    <?php echo selectedCountry($country['countryCode'],$customer['countryCode']); ?> >
                <?php echo htmlspecialchars($country['countryName']); ?></option> 
                <?php endforeach; ?>
            </select>
            <br>
        
            <label>Phone: </label>
            <input type='text' name='Uphone' value='<?php echo $customer['phone']; ?>'/> 
            <br>
        
            <label>Email: </label>
            <input type='text' name='Uemail' value='<?php echo $customer['email']; ?> '/>
            <br>
        
            <label>Password: </label>
            <input type='text' name='Upassword' value='<?php echo $customer['password']; ?>'/>
            <br>
        
            <label>&nbsp;</label>
            <input type ="submit" value="Update Customer" />
            <br>
        
        </form>
        <p class='last_paragraph'><a href="index.php?action=wait_for_search">Search Customers</p>
    </main>
</body>