<?php
include_once("functions/db.php");
include_once("functions/functions.php");
include('functions/classes/add_product.class.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="mb-4 login-card mx-auto" style="max-width:550px;">
            <?php if (isset($result)) echo $result; ?>
            <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
        </div>

        <div class="card login-card mx-auto" style="max-width:450px;">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Add Product</h4>
                <p class="card-category">Add Supplier Products</p>
            </div>
            <div class="card-body">
                <div class="col-md-12">

                    <form id="regiration_form" novalidate action="" method="post">

                        

                        
                        <input type="hidden" name="hidden_id" value="<?php if (isset($shop_id)) echo $shop_id; ?>"/>
                        <button type="submit" name="addproducts" class="btn btn-primary pull-right">Add Product</button>
                        <a class="btn btn-danger pull-left" href="supplier.php?view=<?php if (isset($_GET['add_products'])) echo $_GET['add_products']; ?>">
                            <i class="material-icons">arrow_back</i> Back
                        </a>
                        <div class="clearfix"></div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>