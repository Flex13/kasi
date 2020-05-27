<?php
include_once("functions/db.php");
include_once("functions/functions.php");
include('functions/classes/registerkasi.class.php');
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
        <h4 class="card-title">Add Kasi</h4>
        <p class="card-category">Kasi Details</p>
      </div>
      <div class="card-body">
        <div class="col-md-12">

          <form id="regiration_form" novalidate action="" method="post"  enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <h4><b>Create Account</b></h4>
                </div>
              </div>
            </div>
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
                  <input type="text" class="form-control" id="alt_name" value="<?php if (isset($alt_name)) echo $alt_name; ?>" name="Alternative" placeholder="Alternative name">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group bmd-form-group">
                  <input type="text" name="City" size="32" value="<?php if (isset($city)) echo $city; ?>" maxlength="60" class="form-control" placeholder="City">
                </div>
              </div>
            </div>







            <div class="row">
              <div class="col-md-12">
                <div class="form-group bmd-form-group">
                <select id="inputProvince" name="Province" class="form-control">
                    <option value=""> Choose Province</option>
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
              <label class="btn btn-primary btn-round">Profile Picture:
              <input class="file" type="file" name="image" id="imageSelect" value="<?php echo $image; ?>";>
              </label><br>
                        
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