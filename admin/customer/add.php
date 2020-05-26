<?php
include_once("functions/db.php");
include_once("functions/functions.php");
include('functions/classes/registerCustomer.class.php');
?>

<div class="row">
  <div class="col-md-12">
    <div class="mb-4 login-card mx-auto" style="max-width:550px;">
      <?php if (isset($result)) echo $result; ?>
      <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
    </div>
    <div class="card login-card mx-auto" style="max-width:650px;">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Add Customer</h4>
        <p class="card-category">Customer Details</p>
      </div>
      <div class="card-body">
        <div class="col-md-12">

          <form id="regiration_form" novalidate action="" method="post">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <h4><b>Create Account</b></h4>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group bmd-form-group">
                  <input type="text" class="form-control" id="username" value="<?php if (isset($c_username)) echo $c_username; ?>" name="Username" placeholder="Username">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group bmd-form-group">
                  <input type="email" name="Email" size="32" value="<?php if (isset($c_email)) echo $c_email; ?>" maxlength="60" class="form-control" placeholder="Email address" />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group bmd-form-group">
                  <input type="password" placeholder="Password" name="Password" size="20" maxlength="20" id="psswd" class="input-psswd form-control" autocomplete="on" psswd-shown="false" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number." />

                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group bmd-form-group">
                  <input type="password" placeholder="Confirm Password" name="Password2" size="20" maxlength="20" id="psswd" class="input-psswd form-control" autocomplete="on" psswd-shown="false" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number." />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <h4><b>Customer Details</b></h4>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group bmd-form-group">
                  <input type="text" name="Name" size="32" maxlength="60" value="<?php if (isset($c_name)) echo $c_name; ?>" class="form-control" placeholder="First Name" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group bmd-form-group">
                  <input type="text" name="Surname" size="32" maxlength="60" value="<?php if (isset($c_surname)) echo $c_surname; ?>" class="form-control" placeholder="Surname" />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group bmd-form-group">
                  <label class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" checked="" type="radio" name="Gender" value="Male">
                    <span class="custom-control-label"> Male </span>
                  </label>
                  <label class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" name="Gender" value="Female">
                    <span class="custom-control-label"> Female </span>
                  </label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group bmd-form-group">
                  <input type="tel" name="Cell" size="10" value="<?php if (isset($c_cell)) echo $c_cell; ?>" maxlength="12" class="form-control" placeholder="Cellphone number">
                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group bmd-form-group">
                  <input type="text" name="Address" size="32" value="<?php if (isset($c_street_address)) echo $c_street_address; ?>" maxlength="60" class="form-control" placeholder="Street Address">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group bmd-form-group">
                  <input type="text" name="City" size="32" value="<?php if (isset($c_city)) echo $c_city; ?>" maxlength="60" class="form-control" placeholder="City">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group bmd-form-group">
                  <select id="inputCity" name="Kasi" class="form-control">
                    <option> Choose Kasi</option>
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
                  <select id="inputProvince" name="Province" class="form-control">
                    <option> Choose Province</option>
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
                <input type="text" name="Zip" size="10" value="<?php if (isset($c_zip)) echo $c_zip; ?>" maxlength="10" class="form-control" placeholder="Zip code">
                </div>
              </div>
            </div>





            <button type="submit" name="registercustomer" class="btn btn-primary pull-right">Create Account</button>
            <a class="btn btn-danger pull-left" href="customer.php?customer">
              <i class="material-icons">arrow_back</i> Back
            </a>
            <div class="clearfix"></div>
          </form>

          

        </div>
      </div>
    </div>
  </div>
</div>