<main>
    <h1>Technician List</h1>

    <section>
        <!-- display a table of technicians -->
        <h2></h2>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th class="right">Email</th>
		<th class="right">Phone</th>
                <th>Password</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($technicians as $technician) : ?>
            <tr>
                <td><?php echo $technician['firstName']; ?></td>
                <td><?php echo $technician['lastName']; ?></td>
                <td class="right"><?php echo $technician['email']; ?></td>
		<td class="right"><?php echo $technician['phone']; ?></td>
                <td><?php echo $technician['password']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_technician">
                    <input type="hidden" name="techID"
                           value="<?php echo $technician['techID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Technician</a></p>
               
    </section>
</main>


