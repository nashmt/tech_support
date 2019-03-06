
<main>
    <h1>Product List</h1>

    <section>
        <!-- display a table of products -->
        <h2></h2>
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th class="right">Version</th>
		<th class="right">Release Date</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['productCode']; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td class="right"><?php echo $product['version']; ?></td>
		<td class="right"><?php $relDate = new DateTime($product['releaseDate']); echo $relDate->format('n-j-Y');?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_product">
                    <input type="hidden" name="code"
                           value="<?php echo $product['productCode']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Product</a></p>
               
    </section>
</main>


