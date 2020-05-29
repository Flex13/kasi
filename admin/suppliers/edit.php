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
        <h4 class="card-title">Edit Supplier</h4>
        <p class="card-category">Supplier Details</p>
      </div>
      <div class="card-body">
        <div class="col-md-12">

        <form id="regiration_form" novalidate action="" method="post"  enctype="multipart/form-data">


            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <h4><b>Shop Details</b></h4>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group bmd-form-group">
                <label>Shop Name</label>
                <input type="text" name="Shop_Name" size="32" maxlength="60" value="<?php if (isset($shop_name)) echo $shop_name; ?>" class="form-control" placeholder="Shop name"/>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group bmd-form-group">
                <label>About Shop</label>
                <textarea class="form-control" name="About" cols="5" rows="8" placeholder="What type of service or products do you offer?"><?php if (isset($shop_description)) echo $shop_description; ?></textarea>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group bmd-form-group">
                <label>Business Email</label>
                <input type="email" name="Shop_Email" size="30" value="<?php if (isset($shop_email)) echo $shop_email; ?>" maxlength="60" class="form-control" placeholder="Business email">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group bmd-form-group">
                <label>Business Contact Details</label>
                <input type="tel" name="Shop_Cell" size="10" value="<?php if (isset($shop_cell)) echo $shop_cell; ?>" maxlength="12" class="form-control" placeholder="Business cell">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group bmd-form-group">
                <label>Business Address</label>
                <input type="text" name="Shop_Address" size="32" value="<?php if (isset( $shop_address)) echo  $shop_address; ?>" maxlength="60" class="form-control" placeholder="Business address">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group bmd-form-group">
                <label>Business City</label>
                <input type="text" name="Shop_City" size="32" value="<?php if (isset($shop_city)) echo $shop_city; ?>" maxlength="60" class="form-control" placeholder="Business city">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group bmd-form-group">
                <label>Business Kasi</label>
                <select id="inputCity" name="Shop_Kasi" class="form-control">
                    <option value="<?php if (isset($shop_kasi)) echo $shop_kasi; ?>"><?php if (isset($shop_city)) echo $shop_city; ?></option>
                    <option value="Vaal">Vaal</option>
                    <option value="Soweto">Soweto</option>
                    <option value="Alex">Alex</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group bmd-form-group">
                <label>Business Province</label>
                <select id="inputProvince" name="Shop_Province" class="form-control">
                    <option value="<?php if (isset($shop_province)) echo $shop_province; ?>"><?php if (isset($shop_province)) echo $shop_province; ?></option>
                    <option value="Gauteng">Gauteng</option>
                    <option value="Free State">Free State</option>
                    <option value="Kwa Zulu-Natal">Kwa Zulu-Natal</option>
                    <option value="Eastern Cape">Eastern Cape</option>
                    <option value="Limpopo">Limpopo</option>
                    <option value="Western Cape">Western Cape</option>
                    <option value="Mpumalanga">Mpumalanaga</option>
                    <option value="Northan Cape">Northan Cape</option>
                    <option value="North West">North West</option>
                  </select>
                </div>
              </div>
            </div>

             <div class="row">
              <div class="col-md-12">
                <div class="form-group bmd-form-group">
                <label>Business Zip Code</label>
                <input type="text" name="Shop_Zip" size="10" value="<?php if (isset($shop_zip)) echo $shop_zip; ?>" maxlength="10" class="form-control" placeholder="Zip code">
                </div>
              </div>
            </div>


            <input type="hidden" name="hidden_id" value="<?php if (isset($shop_id)) echo $shop_id; ?>" >
            <button type="submit" name="editsupplier" class="btn btn-primary pull-right">Edit Account</button>
            <a class="btn btn-danger pull-left" href="supplier.php?view=<?php if (isset($_GET['edit'])) echo $_GET['edit']; ?>">
              <i class="material-icons">arrow_back</i> Back
            </a>
            <div class="clearfix"></div>
          </form>

          

        </div>
      </div>
    </div>
  </div>
</div>