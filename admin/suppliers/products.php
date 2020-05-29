<?php
include_once("functions/db.php");
include_once("functions/functions.php");
include('functions/classes/products.class.php');
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">My Products</h4>
                <p class="card-category"> List of all Products</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary text-center">
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                   Product Name
                                </th>
                                <th>
                                    Category
                                </th>
                                <th>
                                    Active
                                </th>
                                <th>
                                    View
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            while ($rs = $statement->fetch()) {
                                $product_id = $rs['product_id'];
        $shop_id = $rs['m_id'];
        $cat_name = $rs['cat_name'];
        $sub_cat_name = $rs['sub_cat_name'];
        $product_name = $rs['product_name'];
        $product_description = $rs['product_description'];
        $product_price = $rs['product_price'];
        $image = $rs['image'];
        $activated = $rs['activated'];
        $shop_date_joined = strftime("%b %d, %Y", strtotime($rs['reg_date']));
                            ?>

                                <tr>
                                    <td>
                                    <?php if (isset($product_id)) echo $product_id; ?>
                                    </td>
                                    <td>
                                    <?php if (isset($product_name)) echo $product_name; ?>
                                    </td>
                                    <td>
                                    <?php if (isset( $cat_name)) echo  $cat_name; ?>
                                    </td>
                                    <td>
                                    <?php if ($activated == '1') :?>
                                        <i class='text-success material-icons'>public</i></div>
                                        <?php else : ?>
                                            <i class='text-danger material-icons'>public_off</i></div>
                                    <?php endif ?>
                                    </td>
                                    <td class="td-actions">
                                        <a class="btn btn-success btn-round btn-block" href="supplier.php?single=<?php if (isset($product_id)) echo $product_id; ?>">
                                             View
                                        </a>
                                        </td>
                                    <td class="td-actions">
                                    <form id="regiration_form" novalidate action="" method="post">
                            <input type="hidden" name="hidden_id" value="<?php if (isset($product_id)) echo $product_id; ?>"/>
                                    <button type="submit" name="delete" class="btn btn-danger btn-round btn-block"><i class="material-icons">close</i> Remove</button>
                            </form>
                                        </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <a class="btn btn-danger pull-left" href="supplier.php?view=<?php if (isset($_GET['v_products'])) echo $_GET['v_products'];?>">
              <i class="material-icons">arrow_back</i> Back
            </a>
    </div>
</div>
