<main>
    <h1>Add Technician</h1>
    <form action="index.php" method="post" id="aligned">
        <input type="hidden" name="action" value="add_technician">

        <br>

        <label>First Name:</label>
        <input type="text" name="firstName" />
        <br>

        <label>Last Name:</label>
        <input type="text" name="lastName" />
        <br>

        <label>Email:</label>
        <input type="text" name="email" />
        <br>

	<label>Phone:</label>
	<input type="text" name="phone" />&nbsp;Use '###-###-####' format.<br>
        
        <label>Password:</label>
        <input type="text" name="password" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Technician" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_technicians">View Technician List</a>
    </p>

</main>
