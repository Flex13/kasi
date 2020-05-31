<?php
include_once("functions/db.php");
include_once("functions/functions.php");
include('functions/classes/add_shops.class.php');
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
        <h4 class="card-title">Kasi Slide Shop Images</h4>
        <p class="card-category">First 4 images are required</p>
      </div>
      <div class="card-body">
        <div class="col-md-12">

          <form id="regiration_form" novalidate action="" method="post"  enctype="multipart/form-data">
            


            <div class="row">
              <div class="col-md-12">
              <div class="form-group bmd-form-group">
              <label class="form-label">Shop 1</label>
        <select name="Shop1" class="form-control">
            <option value="">Please Select Shop</option>
            <?php 

            while ($rs = $statement1->fetch()) {
                $shop_name = $rs['m_shop_name'];
                $shop_id = $rs['m_id'];
            ?>
                <option value="<?php if (isset($shop_id)) echo $shop_id; ?>"> <p><?php if (isset($shop_name)) echo $shop_name; ?></p></option>
            <?php } ?>
        </select>
              </div>
            </div>
            </div>

            <div class="row">
              <div class="col-md-12">
              <div class="form-group bmd-form-group">
              <label class="form-label">Shop 2</label>
        <select name="Shop2" class="form-control">
            <option value="">Please Select Shop</option>
            <?php 

            while ($rs = $statement1->fetch()) {
                $shop_name = $rs['m_shop_name'];
                $shop_id = $rs['m_id'];
            ?>
                <option value="<?php if (isset($shop_id)) echo $shop_id; ?>"> <p><?php if (isset($shop_name)) echo $shop_name; ?></p></option>
            <?php } ?>
        </select>
              </div>
            </div>
            </div>

            <div class="row">
              <div class="col-md-12">
              <div class="form-group bmd-form-group">
              <label class="form-label">Shop 3</label>
        <select name="Shop3" class="form-control">
            <option value="">Please Select Shop</option>
            <?php 

            while ($rs = $statement1->fetch()) {
                $shop_name = $rs['m_shop_name'];
                $shop_id = $rs['m_id'];
            ?>
                <option value="<?php if (isset($shop_id)) echo $shop_id; ?>"> <p><?php if (isset($shop_name)) echo $shop_name; ?></p></option>
            <?php } ?>
        </select>
              </div>
            </div>
            </div>

            <div class="row">
              <div class="col-md-12">
              <div class="form-group bmd-form-group">
              <label class="form-label">Shop 4</label>
        <select name="Shop4" class="form-control">
            <option value="">Please Select Shop</option>
            <?php 

            while ($rs = $statement1->fetch()) {
                $shop_name = $rs['m_shop_name'];
                $shop_id = $rs['m_id'];
            ?>
                <option value="<?php if (isset($shop_id)) echo $shop_id; ?>"> <p><?php if (isset($shop_name)) echo $shop_name; ?></p></option>
            <?php } ?>
        </select>
              </div>
            </div>
            </div>

            <div class="row">
              <div class="col-md-12">
              <div class="form-group bmd-form-group">
              <label class="form-label">Shop 5</label>
        <select name="Shop5" class="form-control">
            <option value="">Please Select Shop</option>
            <?php 

            while ($rs = $statement1->fetch()) {
                $shop_name = $rs['m_shop_name'];
                $shop_id = $rs['m_id'];
            ?>
                <option value="<?php if (isset($shop_id)) echo $shop_id; ?>"> <p><?php if (isset($shop_name)) echo $shop_name; ?></p></option>
            <?php } ?>
        </select>
              </div>
            </div>
            </div>




            <button type="submit" name="registerkasi" class="btn btn-primary pull-right">Create kasi</button>
            <a class="btn btn-danger pull-left" href="amakasi.php?amakasi">
              <i class="material-icons">arrow_back</i> Back
            </a>
            <div class="clearfix"></div>
          </form>

          

        </div>
      </div>
    </div>
  </div>
</div>