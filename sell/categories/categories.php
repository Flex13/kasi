<p class="text-muted">You currently have <?php echo $count; ?> Categories</p>
<div class="card">

    <div class="table-responsive">

        <table class="table table-borderless table-shopping-cart">
            <thead class="text-muted thead-dark text-center">
                <tr class="small text-uppercase">
                    <th >Category</th>
                    <th >Sub Category</th>
                    <th >Edit</th>
                    <th >Delete</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                while ($rs = $statement->fetch()) {
                    $cat_id = $rs['cat_id'];
                    $shop_id = $rs['m_id'];
                    $shop_user_id  = $rs['m_user_id'];
                    $category_name  = $rs['category_name'];
                    $sub_category  = $rs['sub_category'];
                ?>
                    <tr>
                        <td>
                            <p><?php echo $rs['category_name']; ?></p>
                        </td>
                        <td>
                            <p><?php echo $rs['sub_category']; ?></p>
                        </td>
                        <td>
                            <a href="category.php?editCategory=<?php if (isset($cat_id)) echo $cat_id; ?>" class="btn table-link-info btn-block">Edit</a>
                        </td>
                        <td>
                            <a href="category.php?deleteCategory=<?php if (isset($cat_id)) echo $cat_id; ?>" class="btn table-link-danger btn-block"> Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div> <!-- table-responsive.// -->

</div> <!-- card.// -->