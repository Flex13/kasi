<p class="text-muted">You currently have <?php echo $count; ?> Products</p>
<div class="card">

    <div class="table-responsive">

        <table class="table table-borderless table-shopping-cart">
            <thead class="text-muted thead-dark text-center">
                <tr class="small text-uppercase">
                    <th>Product</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                while ($rs = $statement->fetch()) {
                    $product_id = $rs['product_id'];
                    $shop_id = $rs['m_id'];
                    $shop_category_name = $rs['cat_name'];
                    $shop_user_id  = $rs['m_user_id'];
                    $product_name  = $rs['product_name'];
                    $product_description  = $rs['product_description'];
                    $product_price  = $rs['product_price'];
                    $product1  = $rs['product1'];
                ?>
                    <tr>

                        <td><img class="img-fluid" src="<?php if (isset($product1)) echo $product1; ?>" alt="Product1" style="width: auto; height: 35px;"></td>
                        <td><?php if (isset($product_name)) echo $product_name; ?></td>
                        <td><?php if (isset($shop_category_name)) echo $shop_category_name; ?></td>
                        <td>R <?php if (isset($product_price)) echo $product_price; ?></td>
                        <td><a href="products.php?view_product=<?php if (isset($product_id)) echo $product_id; ?>" class="btn table-link-success btn-block">View</a></td>
                        <td><a href="products.php?editProducts=<?php if (isset($product_id)) echo $product_id; ?>" class="btn table-link-info btn-block">Edit</a></td>
                        <td><a href="products.php?deleteProducts=<?php if (isset($product_id)) echo $product_id; ?>" class="btn table-link-danger btn-block">Delete</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div> <!-- table-responsive.// -->

</div> <!-- card.// -->