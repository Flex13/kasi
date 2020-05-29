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
            <?php echo errorMessage(); ?>
                <?php echo successMessage(); ?>
        </div>

        <div class="card login-card mx-auto" style="max-width:550px;">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Add Product</h4>
                <p class="card-category">Add Supplier Products</p>
            </div>
            <div class="card-body">
                <div class="col-md-12">

                <form id="regiration_form" novalidate action="" method="post"  enctype="multipart/form-data">

<div class="row">
  <div class="col-md-12">
    <div class="form-group bmd-form-group">
    <label>Product Name</label>
    <input type="text" name="Name" size="32" maxlength="60" value="<?php if (isset($name)) echo $name; ?>" class="form-control"/>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="form-group bmd-form-group">
    <label>Category</label>
    <select name="Category" class="form-control">
            <option value="">Please Select Category</option>
            <?php 
                //fetching all the categories from Database
                global $db;
                $sqlQuery1 = "SELECT * FROM category";
                $stmt = $db->prepare($sqlQuery1);
                $stmt->execute();
                 while ($rs = $stmt->fetch()) { 
                
                $shop_category_id = $rs['cat_id'];
                $product_category_name  = $rs['category_name'];
                $product_sub_category  = $rs['sub_category'];
                ?>

                <option value="<?php if(isset($product_category_name)) echo $product_category_name; ?>"><?php if(isset($product_category_name)) echo $product_category_name; ?></option>
                 <?php } ?>
        </select>
        <small>Please add categories before adding products</small>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="form-group bmd-form-group">
    <label>Sub Category</label>
    <select name="Sub" class="form-control">
            <option value="">Please Select Sub Category</option>
            <?php 
                //fetching all the categories from Database
                global $db;
                $sqlQuery1 = "SELECT * FROM category";
                $stmt = $db->prepare($sqlQuery1);
                $stmt->execute();
                 while ($rs = $stmt->fetch()) { 
                
                $shop_category_id = $rs['cat_id'];
                $product_category_name  = $rs['category_name'];
                $product_sub_category  = $rs['sub_category'];
                ?>

                <option value="<?php if(isset($product_sub_category)) echo $product_sub_category; ?>"><?php if(isset($product_sub_category)) echo $product_sub_category; ?></option>
                 <?php } ?>
        </select>
        <small>Please add categories before adding products</small>
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group bmd-form-group">
    <label>Product Description</label>
    <textarea class="form-control" name="Description" cols="5" rows="8"><?php if (isset($description)) echo $description; ?></textarea>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="form-group bmd-form-group">
    <label>Price</label>
    <input type="text" name="Price" size="5" placeholder="R" maxlength="10" value="<?php if (isset($price)) echo $price; ?>" class="form-control" />
    </div>
  </div>
</div>



<div class="row">
  <div class="col-md-12">
  <div class="form-group bmd-form-group">
  <label class="btn btn-info btn-round">Product Picture:
  <input class="file" type="file" name="image" id="imageSelect";>
  </label><br>
            
  </div>
</div>
</div>

<button type="submit" name="addproduct" class="btn btn-primary pull-right">Add Product</button>
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