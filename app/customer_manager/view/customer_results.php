<main>
    <!--use htmlspechialchars() for php echo statements -->
    <h1>Results</h1>

    <section>

        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
		<th>City</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?php echo $customer['firstName'] . ' ' . $customer['lastName']; ?></td>
                <td class="right"><?php echo $customer['email']; ?></td>
		<td class="right"><?php echo $customer['city']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="select_customer">
                    <input type="hidden" name="customerID"
                           value="<?php echo $customer['customerID']; ?>">
                    <input type="submit" value="Select">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
               
    </section>
</main>

