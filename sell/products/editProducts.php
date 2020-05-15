<header class="mb-4">
    <h4 class="card-title text-center">Edit Product</h4>
</header>
<?php if (isset($result)) echo $result; ?>
<?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
<form class="" action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label class="form-label">Product Name</label>
        <input type="text" name="Name" size="32" maxlength="60" value="<?php if (isset($product_name)) echo $product_name; ?>" class="form-control" />
    </div> <!-- form-group end.// -->

    <div class="form-group">
        <label class="form-label">Category</label>
        <select name="Category" class="form-control">
            <?php while ($rs = $stmt->fetch()) {
                $shop_category_id = $rs['cat_id'];
                $product_category_name  = $rs['category_name'];
            ?>
                <option value="<?php echo $product_category_name; ?>"> <?php echo $product_category_name; ?></option>
            <?php } ?>
        </select>
        <small>Please add categories before adding products</small>
    </div> <!-- form-group end.// -->
    

    <div class="form-group">
        <label class="form-label">Sub Category</label>
        <select name="Sub" class="form-control">
            <?php while ($rs = $stmt2->fetch()) {
                $shop_category_id = $rs['cat_id'];
                $product_sub_category  = $rs['sub_category'];
            ?>
                <option value="<?php echo $product_sub_category; ?>"> <?php echo $product_sub_category; ?></option>
            <?php } ?>
        </select>
        <small>Please add categories before adding products</small>
    </div> <!-- form-group end.// -->

    <div class="form-group">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="Description" cols="5" rows="15"><?php if (isset($product_description)) echo $product_description; ?></textarea>
    </div> <!-- form-group end.// -->

   

    <div class="form-group">
        <label class="form-label">Price</label>
        <input type="text" name="Price" size="5" maxlength="10" value="<?php if (isset($product_price)) echo $product_price; ?>" class="form-control" />
    </div> <!-- form-group end.// -->

    <div class="form-group">
        <label class="form-label"> Product Image</label>
        <input name="image" type="file">
    </div> <!-- form-group end.// -->



    <input type="hidden" name="hidden_id" value="<?php if (isset($shop_id)) echo $shop_id; ?>">
    <input type="hidden" name="token" value="<?php if (function_exists('_token')) echo _token(); ?>">
    <div class="form-group mt-3">
        <input type="submit" name="editProducts" class="btn btn-primary-login btn-block" value="Submit">
    </div> <!-- form-group// -->

    <div class="form-group mt-3">
        <a class="btn btn-primary-logout btn-block" href="products.php?products=<?php if (isset($encode_id)) echo $encode_id; ?>"> <i class="fa fa-arrow-left"></i> <span class="text">Back</span> </a>
    </div> <!-- form-group// -->

</form>