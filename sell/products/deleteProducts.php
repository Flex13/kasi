<header class="mb-4">
    <h4 class="card-title text-center">Delete Product?</h4>
</header>
<?php if (isset($result)) echo $result; ?>
<?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
<form class="" action="" method="post">


    <input type="hidden" name="hidden_id" value="<?php if (isset($shop_id)) echo $shop_id; ?>">
    <input type="hidden" name="token" value="<?php if (function_exists('_token')) echo _token(); ?>">
    <div class="form-group mt-3">
        <input type="submit" name="deleteProducts" class="btn btn-primary-login btn-block" value="Delete">
    </div> <!-- form-group// -->

    <div class="form-group mt-3">
        <a class="btn btn-primary-logout btn-block" href="products.php?products=<?php if (isset($encode_id)) echo $encode_id; ?>"> <i class="fa fa-arrow-left"></i> <span class="text">Back</span> </a>
    </div> <!-- form-group// -->

</form>