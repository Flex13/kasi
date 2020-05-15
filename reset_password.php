<?php 
include("functions/main.php");
$page_title = 'Reset Password- Kasi Mall Online'; ?>
<?php include('includes/appheader.php'); ?>
<?php include_once('functions/classes/password_reset.class.php'); ?>


<?php 

if(isset($_GET['uid'])) {
    $encoded_id = $_GET['uid'];
    $decode_id = base64_decode($encoded_id);
    $id_array = explode("encodeuserid", $decode_id);
    $id = $id_array['1'];
}

?>
<section class="container login-section" style="margin-bottom: 100px;">

    <div class="container" align="center">
        <div class="col-12 logo-padding">
            <a href="index.php" class="brand-wrap"><img class="logo-login" src="images/kasilogo.jpg"></a>
        </div>
    </div>

    <div class="card login-card">
        <?php if (isset($result)) echo $result; ?>
        <?php if (!empty($form_errors)) echo show_errors($form_errors); ?>
        
        <div class="card-body">
            <h4 class="card-title text-center">Reset Password</h4>

            <form class="" action="" method="post">

            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Password</label>
                        <input type="password" placeholder="Enter Password" name="New-Password" size="20" maxlength="20" id="psswd" class="input-psswd form-control" autocomplete="on" psswd-shown="false" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number." />
                    </div> <!-- form-group end.// -->
                    <div class="form-group col-md-6">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" placeholder="Confirm Password" name="Confirm-Password" size="20" maxlength="20" id="psswd" class="input-psswd form-control" autocomplete="on" psswd-shown="false" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number." />
                    </div> <!-- form-group end.// -->
                </div>


                <input type="hidden" name="user_id"  value="<?php if (isset($id)) echo $id; ?> ">
                <input type="hidden" name="token" value="<?php if(function_exists('_token')) echo _token(); ?>">
                <div class="form-group mt-3">
                    <input type="submit" name="Reset-pass" class="btn btn-primary-login btn-block" value="Reset Password">
                </div> <!-- form-group// -->
            </form>
        </div> <!-- card-body.// -->
    </div>
</section>


<?php include('includes/appfooter.php'); ?>