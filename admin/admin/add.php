
<?php 
include_once("functions/db.php");
include_once("functions/functions.php"); 
include('functions/classes/registeradmin.class.php');
?>

<div class="row">
  <div class="col-md-12">
    <div class="mb-4 login-card mx-auto" style="max-width:550px;">
    <?php if (isset($result)) echo $result; ?>
    <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
    </div>
    
    <div class="card login-card mx-auto" style="max-width:550px;">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Add Admin</h4>
        <p class="card-category">Admin Details</p>
      </div>
      <div class="card-body">
        <div class="col-md-12">

          <form id="regiration_form" novalidate action="" method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group bmd-form-group">
                  <input type="text" name="Name" placeholder="First Name" class="form-control" id="name" value="<?php if (isset($name)) echo $name; ?>">

                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group bmd-form-group">
                  <input type="text" placeholder="Surname" name="Surname" size="32" value="<?php if (isset($surname)) echo $surname; ?>" maxlength="60" class="form-control" />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group bmd-form-group">
                  <input type="text" placeholder="Username" class="form-control" id="username" value="<?php if (isset($a_username)) echo $a_username; ?>" name="Username">

                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group bmd-form-group">
                  <input type="tel" placeholder="Contact Details" class="form-control" id="Cell" value="<?php if (isset($cell)) echo $cell; ?>" name="Cell">

                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group bmd-form-group">
                  <input type="email" placeholder="Email Address" name="Email" size="32" value="<?php if (isset($a_email)) echo $a_email; ?>" maxlength="60" class="form-control" />
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

            <button type="submit" name="registeradmin" class="btn btn-primary pull-right">Create Account</button>
            <a class="btn btn-danger pull-left" href="admin.php?admin">
                    <i class="material-icons">arrow_back</i> Back
                </a>
            <div class="clearfix"></div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>