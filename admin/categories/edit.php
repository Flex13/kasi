<?php
include_once("functions/db.php");
include_once("functions/functions.php");
include('functions/classes/edit.class.php');
?>

<div class="row">
  <div class="col-md-12">
    <div class="mb-4 login-card mx-auto" style="max-width:550px;">
      <?php if (isset($result)) echo $result; ?>
      <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
      <?php echo errorMessage(); ?>
                <?php echo successMessage(); ?>
    </div>
    <div class="card login-card mx-auto" style="max-width:650px;">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Edit Category</h4>
        <p class="card-category">Category Details</p>
      </div>
      <div class="card-body">
        <div class="col-md-12">

          <form id="regiration_form" novalidate action="" method="post"  enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group bmd-form-group">
                  <input type="text" class="form-control" id="name" value="<?php if (isset($name)) echo $name; ?>" name="Name" placeholder="Name">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group bmd-form-group">
                  <input type="text" class="form-control" id="alt_name" value="<?php if (isset($sub)) echo $sub; ?>" name="Sub" placeholder="Sub Category Name">
                </div>
              </div>
            </div>





            <button type="submit" name="editcategory" class="btn btn-primary pull-right">edit Category</button>
            <a class="btn btn-danger pull-left" href="categories.php?view=<?php if(isset($_GET['edit'])) echo $_GET['edit']; ?>">
              <i class="material-icons">arrow_back</i> Back
            </a>
            <div class="clearfix"></div>
          </form>

          

        </div>
      </div>
    </div>
  </div>
</div>