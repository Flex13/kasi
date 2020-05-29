<?php
include_once("functions/db.php");
include_once("functions/functions.php");
include('functions/classes/single_product.class.php');
?>


<div class="col-md-12">
<div class="mb-4 login-card mx-auto" style="max-width:550px;">
            <?php if (isset($result)) echo $result; ?>
            <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
            <?php echo errorMessage(); ?>
                <?php echo successMessage(); ?>
        </div>
        <a class="btn btn-danger float-left" href="supplier.php?view=<?php if (isset($shop_id)) echo $shop_id;?>">
              <i class="material-icons">arrow_back</i> Back
            </a>

        
        

        <div class="card  mx-auto" style="max-width:450px;">
        
  <img class="card-img-top" src="uploads/products/<?php if(isset($image)) echo $image; ?>" alt="Card image cap">
  <div class="card-body">
  <h5 class="text-success mb-0 pb-0">
  <?php if ($activated == '1') :?>
                                        <i class='text-success material-icons'>public</i>
                                        <?php else : ?>
                                            <i class='text-danger material-icons'>public_off</i>
                                    <?php endif ?>
                                                            </h5>
  <h3 class="card-title text-primary mb-0 pb-0"><b><?php if(isset($product_name)) echo $product_name; ?></b></h3>
  <p class="card-category my-0"><?php if(isset($cat_name)) echo $cat_name; ?>, <?php if(isset($sub_cat_name)) echo $sub_cat_name; ?></p>

  <h5 class="text-primary mt-1 "><b>R <?php if(isset($product_price)) echo $product_price; ?></b></h5>
    <p class="card-text"><?php if(isset($product_description)) echo $product_description; ?></p>
    
  </div>

  <div class="card-footer" >
  <div class="container">
  
                <div class="login-card mx-auto" style="max-width:450px;">
                <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-warning btn-round btn-block" href="supplier.php?edit_product=<?php if (isset($product_id)) echo $product_id; ?>"> Edit Product</a>
                        </div>



                        <div class="col-md-12">
                        <form id="regiration_form" novalidate action="" method="post">
                            <input type="hidden" name="hidden_id" value="<?php if (isset($shop_id)) echo $shop_id; ?>"/>
                                <?php
                                if ($activated == '1') : ?>
                                    <button type="submit" name="deactivate" class="btn btn-danger btn-round btn-block"><i class='material-icons'>public_off</i> Deactivate Account</button>
                                <?php else : ?>
                                    <button type="submit" name="activate" class="btn btn-success btn-round btn-block"><i class='material-icons'>public</i> Activate Account</button>
                                <?php endif ?>
                            </form>
                            
                        </div>
                        
                        <div class="col-md-12">
                  
                        </div>
                    </div>
                    




                </div>
            </div>
  </div>
                </div>
                </div>
  
</div>
</div>