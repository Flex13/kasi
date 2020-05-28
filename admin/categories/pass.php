<?php
include_once("functions/db.php");
include_once("functions/functions.php");
include('functions/classes/pass.class.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="mb-4 login-card mx-auto" style="max-width:550px;">
            <?php if (isset($result)) echo $result; ?>
            <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
        </div>

        <div class="card login-card mx-auto" style="max-width:450px;">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Customer Password</h4>
                <p class="card-category">Change Password</p>
            </div>
            <div class="card-body">
                <div class="col-md-12">

                    <form id="regiration_form" novalidate action="" method="post">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <input type="password" placeholder="Password" name="Password" size="20" maxlength="20" id="psswd" class="input-psswd form-control" autocomplete="on" psswd-shown="false" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number." />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <input type="password" placeholder="Confirm Password" name="Password2" size="20" maxlength="20" id="psswd" class="input-psswd form-control" autocomplete="on" psswd-shown="false" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number." />
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="updatePassword" class="btn btn-primary pull-right">Update Password</button>
                        <a class="btn btn-danger pull-left" href="customer.php?view=<?php if (isset($_GET['pass'])) echo $_GET['pass']; ?>">
                            <i class="material-icons">arrow_back</i> Back
                        </a>
                        <div class="clearfix"></div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>