
            <header class="mb-4">
                <?php if (isset($result)) echo $result; ?>
                <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
                <h4 class="card-title text-center">Edit Category</h4>
            </header>
            <form class="" action="" method="post">

                <div class="form-group">
                    <label class="form-label">Category Name</label>
                    <input type="text" name="Name" size="32" maxlength="60" value="<?php if (isset($shop_category_name)) echo $shop_category_name; ?>" class="form-control" />
                    <small class="form-text text-muted">Example. Clothing</small>
                    </div> <!-- form-group end.// -->

                        <div class="form-group">
                            <label class="form-label">Sub Category</label>
                            <input type="text" name="Sub" size="32" maxlength="60" value="<?php if (isset($shop_sub_category)) echo $shop_sub_category; ?>" class="form-control" />
                            <small class="form-text text-muted">Example. Mans Clothing</small>
                        </div> <!-- form-group end.// -->
                        

                        <input type="hidden" name="hidden_cat_id" value="<?php if (isset($cat_id)) echo $cat_id; ?>">
                        <input type="hidden" name="token" value="<?php if (function_exists('_token')) echo _token(); ?>">
                        <div class="form-group mt-3">
                            <input type="submit" name="editCategory" class="btn btn-primary-login btn-block" value="Submit">
                        </div> <!-- form-group// -->
                        
                        <div class="form-group mt-3">
                        <a class="btn btn-primary-logout btn-block" href="category.php?categories=<?php if (isset($encode_id)) echo $encode_id; ?>"> <i class="fa fa-arrow-left"></i> <span class="text">Back</span> </a>
                        </div> <!-- form-group// -->

            </form>
